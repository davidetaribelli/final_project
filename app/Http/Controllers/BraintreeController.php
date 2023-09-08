<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Sponsor;
use App\Models\SponsorUser;
use Carbon\Carbon;

class BraintreeController extends Controller
{
    public function showForm()
    {
        $sponsors = Sponsor::all();
        // dd($sponsors);
        $users = User::all();
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        // Verifico se l'utente ha una sposnosorizzazione in corso
        $sponsoredUsers = SponsorUser::where('user_id', $user->id)->get();
        $message = session('message');
        // dd($message); // Stampa il messaggio nella console

        return view('admin.users.sponsor', compact('sponsors', 'sponsoredUsers'));
    }

    public function getToken(Request $request)
    {
        $selectedPackage = $request->input('selected_package');
        $selectedSponsor = Sponsor::where('id', $selectedPackage)->first();
        // dd($selectedSponsor);

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('braintree', ['token' => $clientToken,
        'selectedPackage' => $selectedSponsor]);
    }

    public function processPayment(Request $request)
    {
        // Recupera l'importo dall'input del modulo
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $sponsoredUsers = SponsorUser::where('user_id', $user->id)->get();
        $sponsors = Sponsor::all();
        $amount = $request->input('amount');
        $selectedPackage = $request->input('selected_package');
        $selectedSponsor = Sponsor::where('id', $selectedPackage)->first();

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        // Esegui il pagamento utilizzando il nonce e l'importo specificato
        
        $result = $gateway->transaction()->sale([
            'amount' => $amount, // Importo da adattare alle tue esigenze
            'paymentMethodNonce' => $request->input('payment_method_nonce'),
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            // Il pagamento è andato a buon fine
            $sponsors = Sponsor::all();
            $sponsorship = new SponsorUser();
            $sponsorship->user_id = $user->id;
            $sponsorship->sponsor_id = $selectedSponsor->id;

            $oldSponsor = SponsorUser::where('user_id', $user->id)->orderBy('end_time', 'desc')->first();

            if ($oldSponsor &&  $oldSponsor->end_time > Carbon::now() ) {
                $sponsorship->start_time = $oldSponsor->end_time;
                $sponsorship->end_time = $oldSponsor->end_time->addHours($selectedSponsor->duration);
            } else {
                $sponsorship->start_time = Carbon::now();
                $sponsorship->end_time = Carbon::now()->addHours($selectedSponsor->duration);
            }

            // $sponsorship->start_time = Carbon::now();
            // $sponsorship->end_time = Carbon::now()->addHours($selectedSponsor->duration);

            $sponsorship->save();
            $sponsoredUsers = SponsorUser::where('user_id', $user->id)->get();
            
            // $verification = $result->paymentMethod->verification;
            $message = "transazione eseguita con successo!";
            // return view('admin.users.sponsor', compact('sponsors', 'sponsoredUsers'))->with('message', $message);
            return redirect()->route('admin.show.form', ['sponsors' => $sponsors, 'sponsoredUsers' => $sponsoredUsers])->with('message', $message);
        } else {
            // Gestisci l'errore in base alla risposta di Braintree
            $error = "La transazione non è andata a buon fine :(";
            // return view('admin.users.sponsor', $user)->with('message', $message);
            return redirect()->route('admin.show.form', ['sponsors' => $sponsors, 'sponsoredUsers' => $sponsoredUsers])->with('error', $error);
        }
    
    }
}

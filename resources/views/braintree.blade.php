@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-2 text-white">Effettua il pagamento</h1>
    <div class="row">
        <div class="col-6">
            <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title">Hai selezionato il pacchetto: {{ $selectedPackage->duration }} ore </h5>
                    <p class="card-text">{{ $selectedPackage->price }} €</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- Form per il pagamento -->
            <form id="payment-form" action="{{ route('admin.process.payment') }}" method="POST" id="payment-form">
                @csrf
                <!-- Elemento per il modulo di pagamento di Braintree -->
                <div id="dropin-container"></div>
                <input type="hidden" name="amount" id="amount" value="{{ $selectedPackage->price }}" required>
                <input type="hidden" id="nonce" name="payment_method_nonce">
                <input type="hidden" name="selected_package" id="selected_package" value="{{ $selectedPackage->id }}">
                <button class="btn btnColor text-white" type="submit">Effettua il pagamento</button>
            </form>
        </div>

    </div>
</div>




{{-- <div class="container">
    <form action="{{ route('admin.process.payment') }}" method="post" id="payment-form">
        @csrf
        <div id="dropin-container"></div>
        <!-- Campo nascosto per il nonce -->
        <input type="hidden" id="nonce" name="payment_method_nonce">
        <!-- Campo per l'importo -->
        <div class="form-group">
            <label for="amount">Importo:</label>
            <input type="number" name="amount" id="amount" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Effettua il pagamento</button>
    </form>
</div> --}}

{{-- CARTA FUNZIONANTE VISA : 4111111111111111    DATA DI SCADENZA: A CASO --}}

<script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var clientToken = "{{ $token }}";

    braintree.dropin.create({
        authorization: clientToken,
        container: '#dropin-container'
    }, function (createErr, instance) {
        if (createErr) {
            console.error(createErr);
            return;
        }

        // Aggiungi un ascoltatore di eventi per il submit del modulo
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.error(err);
                    return;
                }

                // Dopo aver ottenuto con successo il nonce da Braintree
                var nonce = payload.nonce; // Sostituisci con il valore reale del nonce

                // Imposta il valore del campo nascosto
                document.querySelector('#nonce').value = nonce;

                // Invia il modulo al tuo server
                form.submit(); // Invia il modulo
            });
        });
    });
</script>
@endsection

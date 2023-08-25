<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           "name" =>"required|min:3|max:100",
           "surname" =>"required|min:3|max:100",
           "email" =>"required|min:3|max:100",
           "img" =>"nullable|max:20480",
           "region" =>"required|min:3|max:100",
            "phone" =>"required|min:10|max:10",
            "cachet" =>"required",
           "experience" =>"required",
        ];
    }

    public function messages()
    {
        return[
            "name.required"=> "Il nome è obbligatorio",
            "name.min"=> "Il nome deve avere almeno :min caratteri",

            "surname.required"=> "Il cognome è obbligatorio",
            "surname.min"=> "Il cognome deve avere almeno :min caratteri",

            "email.required"=> "L'inserimento dalla mail è obbligatoria",

            "img.max"=>"Il percorso img supera i :max mb",

            "region.required"=> "L'inserimento dalla regione è obbligatoria",

            "phone.required"=> "Il numero di telefono è obbligatorio",
            "phone.min"=> "Il numero di telefono deve avere almeno :min caratteri",
            "cachet.required"=> "Il cachet è obbligatorio",

            "experience.required"=> "Descrizione  è obbligatoria",
            
        ];
    }
}
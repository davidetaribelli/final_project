<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "name.required"=> "il nome è obbligatorio",
            "name.min"=> "il nome deve avere almeno :min caratteri",

            "img.max"=>"il percorso img max: caratteri",

            "experience.required"=> "Descrizione  è obbligatoria",
            
        ];
    }
}
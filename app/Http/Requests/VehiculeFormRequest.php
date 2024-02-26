<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // TODO: completer les regles de validation
        return [
            'matricule' => ['string', 'required', 'min:4', 'max:10', 'unique:vehicules'],
            'date_achat' => ['date', 'required'],
            'km_defaut' => ['integer', 'required'],
            'statut' => ['required', 'string'],
            'categorie' => ['required', 'string']
        ];
    }
}

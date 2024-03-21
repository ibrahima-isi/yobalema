<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'matricule' => ['string', 'required', Rule::unique('vehicules')->ignore($this->vehicule)],
            'date_achat' => ['string', 'required'],
            'km_defaut' => ['integer', 'required'],
            'statut' => ['required', 'string'],
            'image_vehicule' => ['image'],
            'categorie' => ['required', 'string']
        ];
    }
}

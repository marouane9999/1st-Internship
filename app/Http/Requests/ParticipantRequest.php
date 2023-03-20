<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class ParticipantRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nom_par'=>['required','string'],
            'prenom_par'=>['required','string'],
            'discipline'=>['required','string'] ,
            'num_pass'=>['required','numeric',Rule::unique('participants')->ignore($this->route('id'))],
            'num_acc'=>['required', 'numeric'],
            'nom_chef'=>['required','string'],
            'prenom_chef'=>['required','string' ],
            'num_passport'=>['required','numeric',Rule::unique('chef_missions')->ignore($this->route('id'))],
            'tel'=>['required','numeric']
        ];
    }

    public function messages()
    {
        return [

            'nom_par.required'=> 'Nom Participant est obligatoire ',
            'prenom_par.required'=>'Prenom Participant est obligatoire ',
            'nom_par.string'=> 'Nom Participant est un champs text',
            'prenom_par.string'=>'Prenom Participant est un champs text',
            'num_pass.required'=>'Numero Passport est un champs obligatoire',
            'num_pass.numeric'=>'Numero Passport est un champs Numerique',
            'num_pass.size'=>'Numero Passport est trop long',
            'num_acc.required'=>'Numero Accreditation est un champs obligatoire',
            'num_acc.numeric'=>'Numero Accreditation est un champs Numerique',
            'num_acc.size'=>'Numero Accreditation est trop long',
            'prenom_chef.required'=>'Prenom Chef est un champs obligatoire ',
            'nom_chef.required'=> 'Nom Chef est un champs obligatoire',
            'prenom_chef.string'=>'Prenom Chef est un champs text ',
            'nom_chef.string'=> 'Nom Chef est un champs text',
            'num_passport.required'=>'Numero Passport est un champs Obligatoire',
            'num_passport.numeric'=>'Numero Passport est un champs Numerique',
            'num_passport.size'=>'Numero Passport est trop long',
            'tel.required'=>'Telephone est un champs obligatoire',
            'tel.numeric'=>'Telephone est un champs Numerique',

        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {


        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}

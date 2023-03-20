<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class VolRequest extends FormRequest
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
     * Get the validation rules thatLapply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'numero_vol' => ['required', 'numeric'],
            'date_vol' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'numero_vol.numeric' => 'Numéro de vol doit être numeric',
            'numero_vol.required' => 'Numéro de vol est obligatoire',
            'date_vol.required' => 'La date est obligatoire ',

        ];
    }

    protected function faildValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}

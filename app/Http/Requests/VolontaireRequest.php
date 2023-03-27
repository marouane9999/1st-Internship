<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sabberworm\CSS\Rule\Rule;

class VolontaireRequest extends FormRequest
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
            'ref_cojar' => ['required','numeric',\Illuminate\Validation\Rule::unique('volontaires')->ignore($this->route('id'))],
            'tel'=>['required','numeric'],
            'role' => ['required'],
            'site_aff' => ['required'],
            'debut_contrat' => ['required'],
            'fin_contrat' => ['required'],
        ];

    }
}


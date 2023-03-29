<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestaurationRequest extends FormRequest
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
            'numero_rest' => ['required'],
            'site_restau' => ['required'],
            'ville' => ['required', 'string'],
            'prestataire' => ['required', 'string'],
            'rep_id' => ['required'],
            'participant_id' => ['required', Rule::unique('restaurations')->ignore($this->route('id'))],
        ];
    }
}

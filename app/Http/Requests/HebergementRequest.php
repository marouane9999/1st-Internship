<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HebergementRequest extends FormRequest
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
        {
            return [
                'participant_id'=>['required'],
                'site_heberg'=>['required'],
                'type_cham'=>['required'],
                'date_checkin'=>['required'],
                'date_checkout'=>['required'],
            ];
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class CompagniesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {
        $rules[[
            'nom_compagnie' =>'required|alpha_dash:ascii',
            'pays' =>'required|alpha_dash:ascii'
        ]];
        
        return $rules;
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
}
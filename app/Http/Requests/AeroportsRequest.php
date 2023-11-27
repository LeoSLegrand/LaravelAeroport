<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class AeroportsRequest extends Request
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
            'nom_aeroport' =>'required',
            'ville_aeroport' =>'required',
            'code' =>'required|integer|without_spaces',
            'nombre_piste' =>'required|integer|without_spaces'
        ]];
        
        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
}
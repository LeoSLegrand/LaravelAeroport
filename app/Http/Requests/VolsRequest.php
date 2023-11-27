<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class VolsRequest extends Request
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
            'numero' =>'required|integer|without_spaces',
            'date_depart' =>'required|date|',
            'date_arivee' =>'required|date|after:date_depart',
            'heure_depart' =>'required|date_format:H:i:s',
            'heure_arivee' =>'required|date_format:H:i:s|after:heure_depart',
            'nombre_place' =>'required|integer|without_spaces'
        ]];
        
        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
}
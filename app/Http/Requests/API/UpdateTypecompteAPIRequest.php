<?php

namespace App\Http\Requests\API;

use App\Models\Typecompte;
use InfyOm\Generator\Request\APIRequest;

class UpdateTypecompteAPIRequest extends APIRequest
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
        $rules = Typecompte::$rules;
        
        return $rules;
    }
}

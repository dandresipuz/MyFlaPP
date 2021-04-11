<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidentialRequest extends FormRequest
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
        if ($this->method() == 'PUT'){
            // Edit Form
            return  [
                'name'          => 'required',
                'description'   => 'required',
                'photo'         => 'max:1000',
                'phone'         => 'required|numeric',
                'address'       => 'required',
                'city'          => 'required',
                'active'        => 'accepted',
                'slider'        => 'required',
            ];
        } else {
            //Create form
            return [
                'name'          => 'required',
                'description'   => 'required',
                'photo'         => 'max:1000',
                'phone'         => 'required|numeric',
                'address'       => 'required',
                'city'          => 'required',

            ];
        }
    }

    public function messages() {
        return [
            'name.required'         => 'El campo ":attribute" es obligatorio.',
            'description.required'  => 'El campo ":attribute" es obligatorio.',
            'phone.required'        => 'El campo ":attribute" es obligatorio.',
            'address.required'      => 'El campo ":attribute" es obligatorio.',
            'photo.required'        => 'El campo ":attribute" es obligatorio.',
            'city.required'         => 'El campo ":attribute" es obligatorio.',
        ];
    }

    public function attributes() {
        return [
            'name'          => 'nombre',
            'description'   => 'descripción',
            'phone'         => 'teléfono',
            'address'       => 'dirección',
            'photo'         => 'foto',
            'phone'         => 'teléfono',
            'city'          => 'ciudad',
        ];
    }
}

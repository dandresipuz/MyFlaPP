<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartamentRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            // Edit Form
            return  [
                'number'        => 'required|numeric|min:1001|max:9999',
                'description'   => 'required',
                'slider'        => 'required',
                'price'         => 'required|numeric|min:1|max:999999',
                'active'        => 'accepted',
                'photo'         => 'max:1000',
                'user_id'       => 'required',
                'residential_id' => 'required',
            ];
        } else {
            //Create form
            return [
                'number'        => 'required|numeric|min:1001|max:9999',
                'description'   => 'required',
                'price'         => 'required|numeric|min:1|max:999999',
                'photo'         => 'max:1000',
                'residential_id' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'number.required'           => 'El campo ":attribute" es obligatorio.',
            'description.required'      => 'El campo ":attribute" es obligatorio.',
            'slider.required'           => 'El campo ":attribute" es obligatorio.',
            'price.required'            => 'El campo ":attribute" es obligatorio.',
            'active.required'           => 'El campo ":attribute" es obligatorio.',
            'user_id.required'          => 'El campo ":attribute" es obligatorio.',
            'residential_id.required'   => 'El campo ":attribute" es obligatorio.',
            'photo.required'            => 'El campo ":attribute" es obligatorio.',

        ];
    }

    public function attributes()
    {
        return [
            'number'            => 'número de apartamento',
            'description'       => 'descripción',
            'slider'            => 'slider',
            'price'             => 'precio',
            'photo'             => 'foto',
            'active'            => 'estado',
            'user_id'           => 'creador',
            'residential_id'    => 'conjunto',
        ];
    }
}

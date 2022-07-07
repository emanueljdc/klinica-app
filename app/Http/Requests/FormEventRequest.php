<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormEventRequest extends FormRequest
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
        return [
            'title'         => "required|min:3",

        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'O campo evento é de preenchimento obrigatório.',
            'title.min'              => 'O campo evento deve ter no mínimo 3 caracteres.',
            //'nome.max'              => 'O campo nome do paciente deve ter no máximo 150 caracteres.',
            //'nome.unique'           => 'Paciente já registado.',
            /*'nif.min'               => 'O campo NIF do cliente deve ter 9 caracteres.',
            'nif.max'               => 'O campo NIF do cliente deve ter 9 caracteres.',
            'nif.unique'            => 'NIF já registado.',
            'endereco.min'          => 'O campo endereço deve ter no mínimo 200 caracteres.',
            'bairro.max'            => 'O campo bairro deve ter no máximo 100 caracteres.',
            'telemovel.unique'      => 'Telmóvel já registado.',
            'email.unique'          => 'Email já registado.',
            'ilha_id.required'      => 'O campo ilha é de preenchimento obrigaório.',*/
            ];
    }



}

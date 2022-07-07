<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            'nome'          => "required|min:2|max:150|unique:pacientes,nome,{$id},id",
            /*'nif'           => "min:9|max:9|unique:clientes,nif,{$id},id_cliente",
            'endereco'      => "max:200",
            'bairro'        => "max:100",
            'telemovel'     => "unique:clientes,telemovel,{$id},id_cliente",
            'email'         => "email|unique:clientes,email,{$id},id_cliente",
            'ilha_id'       => "required|exists:ilhas,id_ilha",*/
        ];
    }

    public function messages()
    {
        return [
            'nome.required'         => 'O campo nome do paciente é de preenchimento obrigatório.',
            'nome.min'              => 'O campo nome do paciente deve ter no mínimo 2 caracteres.',
            'nome.max'              => 'O campo nome do paciente deve ter no máximo 150 caracteres.',
            'nome.unique'           => 'Paciente já registado.',
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

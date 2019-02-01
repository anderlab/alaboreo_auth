<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewMessageRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => ['required', 
                      'string',
                      'max:10',
                      'min:4', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.\s]+$/'],
            'subject' => ['required', 
                      'string',
                      'max:15',
                      'min:1', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.\s]+$/'],
            'message' => ['required', 
                      'string',
                      'max:140',
                      'min:1', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.\s]+$/'],
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Es necesairo introducir el email',
            'email.email' => 'El email no es valido',
            'name.required' => 'Es necesairo introducir un nombre',
            'name.min' => 'El nombre debe de tener minimo 4 caracteres',
            'name.max' => 'El nombre no puede ser tan largo', 
            'name.regex' => 'No se aceptan caracteres especiales',
            'subject.required' => 'Es necesairo introducir un asunto',
            'subject.min' => 'El asunto debe de tener minimo 4 caracteres',
            'subject.max' => 'El asunto no puede ser tan largo', 
            'subject.regex' => 'No se aceptan caracteres especiales',
            'message.required' => 'Es necesairo introducir un mensaje',
            'message.min' => 'El mensaje debe de tener minimo 4 caracteres',
            'message.max' => 'El asunto no puede superar los 140 caracteres', 
            'message.regex' => 'No se aceptan caracteres especiales',
            
        ];
    }
}

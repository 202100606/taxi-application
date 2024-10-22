<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passengerrequest extends FormRequest

{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        
        // For PUT and DELETE, the ID comes from the request body
        if (in_array($method, ['PUT', 'DELETE'])){
            return [
                'id' => 'required|integer|exists:passengers,id',
            ];
        }
        if ($method === 'GET') {
            return [
               
                'id' => 'required|integer|exists:passengers,id',
            ];
        }
    
      
        
    
        // For store or update methods (with data in the body)
        $id = $this->input('id');
         // Getting ID from request body
         
    
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:passengers,email,' . $id,
            'phone' => 'sometimes|required|string|regex:/^[0-9]{8,10}$/|unique:passengers,phone,' . $id,
        ];
    }
    public function validationData()
    {
        // Include route parameters (e.g., ID from the URL) in the validation data
        return array_merge($this->request->all(), $this->route()->parameters());
    }

    
      
}

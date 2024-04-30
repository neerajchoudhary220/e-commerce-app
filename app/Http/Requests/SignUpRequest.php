<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SignUpRequest extends FormRequest
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
        return [
            'name'=>'required|string|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:3',
        ];
    }
    protected function  failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'=>'error',
            'error'=>$validator->errors()->first(),
        ],422));
    }
}

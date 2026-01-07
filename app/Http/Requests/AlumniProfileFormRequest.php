<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumniProfileFormRequest extends FormRequest
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
        $rules = [
            'matricno' => 'required|max:20',
            'surname'=>'required',
            'other_names'=>'required',
            'phone'=>'required|digits:11',
            'position'=>'required',
            'employer'=>'required',
            'address'=>'required',
            'profile_picture'=>'mimes:png,jpg,jpeg|max:300',
            'department'=>'required',
            'graduation_month'=>'required|digits:2',
            'graduation_year'=>'required|digits:4'
        ];

        if(in_array($this->method(), ['POST'])){
            $rules['profile_picture'] = 'required|mimes:png,jpg,jpeg|max:300';
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|confirmed|min:8';
        }

        return $rules;
    }
}

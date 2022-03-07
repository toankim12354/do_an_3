<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TeacherStore extends FormRequest
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
            'name'=>'required',
            'dob'=>'required',
            'email'=> [
                'required', 
                'email',
                Rule::unique('teachers')
            ],
            'phone'=> [
                'required', 
                'regex:/^[0-9]{10}$/',
                Rule::unique('teachers')
            ],
            'address'=>'required',
            'gender'=>'required',
            'password'=>'required|min:6|max:20',
          
            'statu'=>'1',
        ];
    }
}

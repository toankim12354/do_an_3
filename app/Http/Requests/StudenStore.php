<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StudenStore extends FormRequest
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
            //
            'code'=>'required',
            'name'=>'required',
            'dob'=>'required',
            'email'=> [
                'required', 
                'email',
                Rule::unique('students')->ignore($this->student_manager)
            ],
            'phone'=> [
                'required', 
                'regex:/^[0-9]{10}$/',
                Rule::unique('students')->ignore($this->student_manager)
            ],
            'address'=>'required',
            'id_lop'=>'required',
            'password'=>'required|min:6|max:20',
            'gender'=>'required',
          
        ];
    }
}

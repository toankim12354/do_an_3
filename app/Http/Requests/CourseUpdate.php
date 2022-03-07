<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdate extends FormRequest
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
            'Ten_Khoa_Hoc'=>'required',
            'Tg_Bd'=>'required',
            // 'date_format:"Y/m/d"|after:now',
            'Tg_Kt'=>'required',
            'ID_majors'=>'required'
        ];
    }
}

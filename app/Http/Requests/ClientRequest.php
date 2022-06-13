<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'date' => 'required',
            'attendance' => 'required',
            'leave' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '名前を入力してください',
            'attendance.required' => '出勤時間を入力してください',
            'leave.required' => '退勤時間を入力してください',
        ];
    }
}

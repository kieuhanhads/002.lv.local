<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\AuthorizationException;

class RegisterRequest extends FormRequest
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
            'name'  =>  ['required', 'max:100'],
            'email' =>  ['required', 'email:filter', 'unique:users'],
            'password'  =>  ['required', 'min:8', 'confirmed'],
            'password_confirmation'  =>  ['required', 'min:8', 'same:password'],
            'terms' =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'required' =>  ':attribute là bắt buộc',
            'min'  =>  ':attribute phải dài hơn :min ký tự',
            'max'  =>  ':attribute phải ngắn hơn :max ký tự',
            'unique'    =>  ':attribute đã tồn tại trên hệ thống!',
            'email' =>  ':attribute không đúng định dạng Email',
        ];
    }

    public function attributes()
    {
        return [
            'name'  =>  'Tên người dùng',
            'email'   =>  'Email đăng ký',
            'password'  =>  'Mật khẩu đăng nhập',
            'password_confirmation' =>  'Retype Password'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator){
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu!');
            }
            $this->merge([
                'password' => Hash::make($this->password)
            ]);
        });

    }

    protected function prepareForValidation(){

    }

    protected function failedAuthorization(){
        throw new AuthorizationException;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Auth\AdminController;

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
            //
            'name' => ['required'],
            'email' =>['required','email'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return[
        'name.required' => '名前を入力してください',
        'name.string' => '名前を文字列で入力してください',
        'name.max:255' => '名前を255文字以内で入力してください',

        'email.required' => 'メールアドレスを入力してください',
        'email.string' => 'メールアドレスを文字列で入力してください',
        'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
        'email.max:255' => 'メールアドレスを255文字以内で入力してください',

        'password.required' => 'パスワードを入力してください',
        'password.max:255' => 'パスワードを255文字以内で入力してください',
        ];
    }
}

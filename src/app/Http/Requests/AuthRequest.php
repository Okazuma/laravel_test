<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'email' =>['required','string','email'],
            'password' => ['required','max:10'],
        ];
    }

    public function messages()
    {
        return[
        'name.required' => '名前を入力してください',
        'name.string' => '名前を文字列で入力してください',
        'name.max:255' => '名前を255文字以内で入力してください',

        'email.required' => 'メールアドレスを入力してください',
        'name.string' => 'メールアドレスを文字列で入力してください',
        'name.email' => '有効なメールアドレス形式で入力してください',
        'name.max:255' => 'メールアドレスを255文字以内で入力してください',

        'password.required' => 'パスワードを入力してください',
        'password.max:255' => 'パスワードを255文字以内で入力してください',
        ];
    }
}

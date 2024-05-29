<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class ContactRequest extends FormRequest
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
// dd($this->all());

        return [
            //
            'last_name' => ['required'],
            'first_name'=>['required'],
            'gender' => ['required'],
            'email' => ['required','email'],

            'address' => ['required'],
            'category_id' => ['required'],
            'detail' => ['required','max:120'],

            'tel_left' => ['bail','required','string'],
            'tel_middle' => ['bail','required','string'],
            'tel_right' => ['bail','required','string'],







        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名前を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',

            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max:120' => 'お問い合わせ内容は120文字以内で入力してください',

            // 'tel.required' => '電話番号を入力してください',
            // 'tel.integer' => '半角数字で入力してください',
            // 'tel.max:5' => '電話番号は5桁までの数字で入力してください',



            'tel_left.required' => '電話番号の左側の欄を入力してください',
            // 'tel_left.integer' => '半角数字で入力してください',
            // 'tel_left.max:5' => '電話番号は5桁までの数字で入力してください',

            'tel_middle.required' => '電話番号の中央欄入力してください',
            // 'tel_middle.integer' => '半角数字で入力してください',
            // 'tel_middle.max:5' => '電話番号は5桁までの数字で入力してください',

            'tel_right.required' => '電話番号の欄を入力してください',
            // 'tel_right.integer' => '半角数字で入力してください',
            // 'tel_right.max:5' => '電話番号は5桁までの数字で入力してください',




        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tel' => $this->input('tel_left').$this->input('tel_middle').$this->input('tel_right'),
        ]);
    }

}

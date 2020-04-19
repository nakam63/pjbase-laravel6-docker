<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMessage extends FormRequest
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
            'user_id'  => 'required|exists:users,id',
            'title'    => 'required|max:255',
            'content'  => 'required|max:50000',
        ];
    }

    /**
     *  Customized error message.
     */
    public function messages()
    {
        return [
            'user_id.required' => '宛先を選択して下さい。',
        ];
    }

    /**
     * Set item name ja.
     */
    public function attributes()
    {
        return [
            'user_id'  =>  '宛先',
            'title'    =>  'タイトル',
            'content'  =>  '本文',
        ];
    }
}

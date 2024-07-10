<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editUserRequests extends FormRequest
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
        return [
            'userNameDetail' => 'required|string|min:5|max:12',
            'maildetail' => 'required|email',
            'sdtdetail' => ['required', 'regex:/^0[0-9]{9}$/'],
            'moneyDetail' => 'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'userNameDetail.required' => 'Tên người dùng là bắt buộc.',
            'userNameDetail.min' => 'Tên người dùng phải có ít nhất 5 ký tự.',
            'userNameDetail.max' => 'Tên người dùng không được quá 12 ký tự.',
            'maildetail.required' => 'Email là bắt buộc.',
            'maildetail.email' => 'Email không đúng định dạng.',
            'sdtdetail.required' => 'Số điện thoại là bắt buộc.',
            'sdtdetail.regex' => 'Số điện thoại phải có 10 chữ số và bắt đầu bằng số 0.',
            'moneyDetail.required' => 'Số dư là bắt buộc.',
            'moneyDetail.numeric' => 'Số dư phải là một số.',
        ];
    }
}

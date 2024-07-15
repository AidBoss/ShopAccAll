<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'passOld' => 'required',
            'passNew' => 'required|string|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'passOld.required' => 'Vui lòng nhập mật khẩu cũ.',
            'passNew.required' => 'Vui lòng nhập mật khẩu mới.',
            'passNew.string' => 'Mật khẩu mới phải là chuỗi.',
            'passNew.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'passNew.confirmed' => 'Mật khẩu mới không khớp với mật khẩu xác nhận.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RechargeHistoryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'transaction_code' => [
                'required',
                'numeric',
                Rule::unique('account_recharge_history')->ignore($this->route('id')),
                'digits_between:1,10',
            ],
            'bank_name' => 'required|string|max:50',
            'content_bill' => 'required|string|max:50',
            'amount' => 'required|numeric|between:0,9999999999.99',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'transaction_code.required' => 'Mã giao dịch là bắt buộc.',
            'transaction_code.numeric' => 'Mã giao dịch phải là số.',
            'transaction_code.digits_between' => 'Mã giao dịch phải có độ dài từ 1 đến 10 chữ số.',
            'transaction_code.unique' => 'Mã giao dịch đã tồn tại.',
            'bank_name.required' => 'Tên ngân hàng là bắt buộc.',
            'bank_name.string' => 'Tên ngân hàng phải là chuỗi ký tự.',
            'bank_name.max' => 'Tên ngân hàng không được vượt quá 50 ký tự.',
            'content_bill.required' => 'Tên ngân hàng là bắt buộc.',
            'content_bill.string' => 'Tên ngân hàng phải là chuỗi ký tự.',
            'content_bill.max' => 'Tên ngân hàng không được vượt quá 50 ký tự.',
            'amount.required' => 'Số tiền là bắt buộc.',
            'amount.numeric' => 'Số tiền phải là số.',
            'amount.between' => 'Số tiền phải nằm trong khoảng từ 0 đến 9999999999.99.',
            'user_id.required' => 'ID người dùng là bắt buộc.',
            'user_id.exists' => 'ID người dùng không tồn tại.',
        ];
    }
}
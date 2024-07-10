<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
         'userName' => 'required|string|max:100',
         'nameAccount' => 'required|string|min:5|max:12|unique:users,account_name',
         'password' => 'required|string|min:6',
         'email' => 'required|string|email|max:255|unique:users,email',
         'phone' => 'required|string|size:10|unique:users,phone',
      ];
   }
   public function messages(): array
   {
      return [
         'userName.required' => 'Tên người dùng là bắt buộc.',
         'nameAccount.required' => 'Tên tài khoản là bắt buộc.',
         'nameAccount.min' => 'Tên tài khoản phải có ít nhất 5 ký tự.',
         'nameAccount.max' => 'Tên tài khoản không được vượt quá 12 ký tự.',
         'nameAccount.unique' => 'Tên tài khoản đã tồn tại.',
         'password.required' => 'Mật khẩu là bắt buộc.',
         'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
         'email.required' => 'Email là bắt buộc.',
         'email.unique' => 'Email đã tồn tại.',
         'phone.required' => 'Số điện thoại là bắt buộc.',
         'phone.unique' => 'Số điện thoại đã tồn tại.',
         'phone.size' => 'Số điện thoại phải có đúng 10 chữ số.',
      ];
   }
}

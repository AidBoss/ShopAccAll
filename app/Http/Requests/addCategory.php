<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Categories;

class addCategory extends FormRequest
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
            'name' => 'required|unique:categories,game_type|max:255',
            'avatar' => 'required|max:3072',
            'quantity' => 'required|integer|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên game là bắt buộc.',
            'name.unique' => 'Tên game đã tồn tại.',
            'name.max' => 'Tên game không được vượt quá :max ký tự.',
            'avatar.required' => 'Ảnh đại diện là bắt buộc.',
            // 'avatar.image' => 'Ảnh đại diện phải là định dạng hình ảnh.',
            // 'avatar.mimes' => 'Ảnh đại diện phải là định dạng: jpeg, png, jpg, gif.',
            'avatar.max' => 'Kích thước ảnh đại diện không được vượt quá :max KB.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng :min.',
        ];
    }
}

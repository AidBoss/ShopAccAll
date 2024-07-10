<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeaponRequest extends FormRequest
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
            'name' => 'required|unique:categories,game_type|max:50',
            'avatar' => 'required|max:3072',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên game là bắt buộc.',
            'name.unique' => 'Tên game đã tồn tại.',
            'name.max' => 'Tên game không được vượt quá :max ký tự.',
            'avatar.required' => 'Ảnh đại diện là bắt buộc.',
            'avatar.max' => 'Kích thước ảnh đại diện không được vượt quá :max KB.',
            'category_id.required' => 'Loại game là bắt buộc.',
        ];
    }
}
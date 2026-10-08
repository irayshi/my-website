<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'project_type' => ['required', Rule::in(['external', 'internal'])],
            'client_name' => ['nullable', 'required_if:project_type,external', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tech_stack' => ['required', 'string', 'max:255'],
            'link_demo' => ['nullable', 'url:http,https', 'max:255'],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'cover_image' => ['nullable', 'integer', 'min:0'],
        ];
    }
}

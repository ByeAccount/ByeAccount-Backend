<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:60'],
            'logo_url' => ['nullable', 'string', 'url', 'max:255'],
            'website_url' => ['required', 'string', 'url', 'max:255'],
            'deletion_url' => ['required', 'string', 'url', 'max:255'],

            'steps' => ['nullable', 'array'],
            'steps.*.order' => ['required', 'integer'],
            'steps.*.text' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }
}

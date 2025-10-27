<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): true
    {
        return Auth::guard('sanctum')->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'duration' => 'required|integer|min:1',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'trailer_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}

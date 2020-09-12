<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDanger extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // we currently place no restrictions on creation of dangers
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
            'name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'nullable|string|max:600',
            'creator' => 'nullable|string|max:50',
            'spectrum.*.name' => 'required|string|max:50',
            'spectrum.*.threshold' => 'integer|min:0|max:6',
            'move.*.name' => 'nullable|string|max:100',
            'move.*.description' => 'required|string|max:600'
        ];
    }

    /**
     * Rename the input fields to have human-readable error messages.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'danger name',
            'rating' => 'danger rating',
            'description' => 'danger description',
            'spectrum.*.name' => 'spectrum name',
            'spectrum.*.threshold' => 'spectrum threshold',
            'move.*.name' => 'move name',
            'move.*.description' => 'move description'
        ];
    }
}

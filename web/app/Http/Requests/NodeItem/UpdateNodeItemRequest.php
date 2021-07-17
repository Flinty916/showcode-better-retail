<?php

namespace App\Http\Requests\NodeItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNodeItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'nullable|string|max:255',
            'node_id' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string'
        ];
    }
}

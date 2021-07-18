<?php

namespace App\Http\Requests\NodeItemCollection;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNodeItemCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'shop_id' => 'nullable|integer'
        ];
    }
}

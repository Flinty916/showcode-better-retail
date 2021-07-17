<?php

namespace App\Http\Requests\Node;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNodeRequest extends FormRequest
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
            'type_id' => 'nullable|integer',
            'coordX' => 'nullable|integer',
            'coordY' => 'nullable|integer',
            'sizeX' => 'nullable|integer',
            'sizeY' => 'nullable|integer',
            'shop_id' => 'nullable|integer'
        ];
    }
}

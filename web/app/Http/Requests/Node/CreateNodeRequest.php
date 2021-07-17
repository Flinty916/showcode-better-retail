<?php

namespace App\Http\Requests\Node;

use Illuminate\Foundation\Http\FormRequest;

class CreateNodeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'type_id' => 'required|integer',
            'coordX' => 'required|integer',
            'coordY' => 'required|integer',
            'sizeX' => 'required|integer',
            'sizeY' => 'required|integer',
            'shop_id' => 'required|integer'
        ];
    }
}

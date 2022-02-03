<?php

namespace App\Http\Requests;

use App\Enums\MainCategory;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //
            'main_category_id' => ['required',new EnumValue(MainCategory::class,false)],      // i.e. main_category_id can't be null and can't be such a value which is not in the MainCategory enum type
            'name' => 'required'
        ];
    }
}

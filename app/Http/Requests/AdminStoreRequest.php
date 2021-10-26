<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->id <=5;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image_for_ipad' => 'required_if:slider,big|dimensions:width=1248,height=400|max:2048',
            'name' => 'required',
            'tech_name' => 'required',
            'platform' => 'required',
            'version' => 'required',
            'slider' => 'required',
            'published' => 'required',
            'link' => 'required',
            'label'=>'required_if:slider,small',
            "rate_big" => 'exclude_if:slider,small',
            'rate_small' => 'exclude_if:slider,big',
            'slot_big' => 'exclude_if:slider,small',
            'slot_small' => 'exclude_if:slider,big',
//            'image'=>'required_if:slider,big|dimensions:min_width=1920,min_height=400|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'image.dimensions' => 'The image does not match the aspect ratio for the selected slider',
            'image.max' => 'The image must be no more than 2 megabytes in size',
            'image_for_ipad.dimensions' => 'The image for ipad does not match the aspect ratio 1248x400.',
            'image_for_ipad.max' => 'The image must be no more than 2 megabytes in size',
        ];
    }

    public function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('image', 'required|dimensions:width=1920,height=400|max:2048', function ($input) {
            return $input->slider == 'big';
        });
        $validator->sometimes('image', 'required|dimensions:width=470,height=300|max:2048', function ($input) {
            return $input->slider == 'small';
        });

        return $validator;
    }
}

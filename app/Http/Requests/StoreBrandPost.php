<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
                'brand_name' => 'required|unique:posts|max:255',
                'brand_url' => 'required',
                ];
               
    
    }
    public function messages(){
        return [
        'brand_name.required' => '商品品牌不能为空',
        'brand_url.required' => '商品名称不能为空',
        ];
       }
}

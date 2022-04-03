<?php

namespace App\Http\Requests\CompanyProfile;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'header1' => 'required|max:20|string',
            'header2' => 'required|max:20|string',
            'image' => 'required|image',
            'caption' => 'required|max:50|string',
            'link' => 'required|string',
            // 'status' => 'required|integer'
        ];
    }
}

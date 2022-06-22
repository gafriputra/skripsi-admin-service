<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // aktifkan
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'transaction_total' => 'required',
            // 'shipping' => 'required|integer',
            'transaction_status' => 'nullable|string|in:PENDING,SUCCESS,FAILED',
            'transaction_details' => 'required|array', //harus array
            // 'transaction_details.*' => 'integer|exists:products,id', //barang harus ada didatabase

        ];
    }
}

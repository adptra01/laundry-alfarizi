<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'service_id' => 'required|integer',
            'costumer' => 'required|min:3',
            'telp' => '',
            'address' => '',
            'weight' => 'required',
            'totalTransaction' => 'required',
            'status' => 'required|boolean',
            'payment' => 'required',
            'invoice' => '',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'kode_produk' => 'required|string|max:50',
            'nama_produk' => 'required|string|max:150',
            'sku' => 'required|string|max:150',
            'sub_kategori_id' => 'required|exists:App\Models\SubCategory,id',
            'produk_unit_id' => 'required|exists:App\Models\ProductUnit,id',
            'harga_umum' => 'required|numeric',
            'harga_reseller' => 'required|numeric',
            'harga_subdis' => 'required|numeric',
            'harga_distributor' => 'required|numeric',
            'deksripsi_produk' => 'required|string',
        ];
    }
}

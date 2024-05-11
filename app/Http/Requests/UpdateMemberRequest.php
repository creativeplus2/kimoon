<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'kode_member' => 'required|string|max:255',
			'nama_member' => 'required|string|max:255',
			'email' => 'required|email|unique:members,email,' . $this->member->id,
			'no_telpon' => 'required|string|max:15',
			'type_user' => 'required|in:Seller,Subdis,Distributor',
			'provinsi_id' => 'required|exists:App\Models\Province,id',
			'kabkot_id' => 'required|exists:App\Models\Kabkot,id',
			'kecamatan_id' => 'required|exists:App\Models\Kecamatan,id',
			'kelurahan_id' => 'required|exists:App\Models\Kelurahan,id',
			'zip_code' => 'required|string|max:6',
			'alamat_member' => 'required|string',
			'no_ktp' => 'required|string|max:100',
			'photo_ktp' => 'required|image|max:2048',
			'password' => 'nullable|confirmed',
			'status_member' => 'required|in:Pending,Approved,Rejected',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telepon' => ['required', 'string', 'max:20'],
            'provinsi_id' => ['required', 'string'],
            'kota_id' => ['required', 'string'],
            'kecamatan_id' => ['required', 'string'],
            'kelurahan_id' => ['required', 'string'],
            'kode_pos' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'provinsi_id.required' => 'Provinsi harus dipilih.',
            'kota_id.required' => 'Kota/Kabupaten harus dipilih.',
            'kecamatan_id.required' => 'Kecamatan harus dipilih.',
            'kelurahan_id.required' => 'Kelurahan/Desa harus dipilih.',
        ];
    }
}

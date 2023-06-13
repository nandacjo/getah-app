<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateGetah extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules =  [
            'tanggal' => 'required|date',
            'uraian' => 'required|string',
            'nama_penyadap' => 'required|string',
            'petak' => 'required',
            'luas' => 'required|integer',
            'jml_pohon' => 'required|integer',
            'target' => 'required|integer',
            'realisasi' => 'required|integer',
            'foto_keterangan' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lokasi' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules['foto_keterangan'] .= '|required';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Tanggal harus berupa tanggal',
            'uraian.required' => 'Uraian harus diisi',
            'uraian.string' => 'Uraian harus berupa string',
            'nama_penyadap.required' => 'Nama penyadap harus diisi',
            'nama_penyadap.string' => 'Nama penyadap harus berupa string',
            'petak.required' => 'Petak harus diisi',
            'petak.string' => 'Petak harus berupa string',
            'luas.required' => 'Luas harus diisi',
            'luas.integer' => 'Luas harus berupa integer',
            'jml_pohon.required' => 'Jumlah pohon harus diisi',
            'jml_pohon.integer' => 'Jumlah pohon harus berupa integer',
            'target.required' => 'Target harus diisi',
            'target.integer' => 'Target harus berupa integer',
            'realisasi.required' => 'Realisasi harus diisi',
            'realisasi.integer' => 'Realisasi harus berupa integer',
            'foto_keterangan.required' => 'Foto keterangan harus diisi',
            'foto_keterangan.image' => 'Foto keterangan harus berupa gambar',
            'foto_keterangan.mimes' => 'Foto keterangan harus berupa jpeg, png, jpg, gif, svg',
            'foto_keterangan.max' => 'Foto keterangan maksimal 2048',
        ];
    }
}

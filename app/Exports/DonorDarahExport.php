<?php

namespace App\Exports;

use App\Models\DonorDarah;
use Maatwebsite\Excel\Concerns\FromCollection;

class DonorDarahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // create header title
        $header = [
            'No',
            'Nama',
            'NPM',
            'Email',
            'No. HP',
            'Umur',
            'Berat Badan',
            'Golongan Darah',
            'Hal yang harus diperhatikan',
            'Hari',
            'Register At'
        ];
        $data = DonorDarah::all();
        $export = [];
        array_push($export, $header);
        foreach ($data as $key => $value) {
            $row = [
                $key + 1,
                $value->nama,
                $value->npm,
                $value->email,
                $value->no_hp,
                $value->umur,
                $value->berat_badan,
                $value->golongan_darah,
                $value->hal,
                $value->hari,
                $value->created_at
            ];

            array_push($export, $row);
        }
        return collect($export);
    }
}

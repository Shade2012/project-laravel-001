<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
    private static $students = [
       
        [
            "id_siswa" => "1",
            "nis_siswa" => "001",
            "nama_siswa" => "Adam Aji Langit",
            "kelas_siswa" => "11 PPLG 2",
            "alamat_siswa" => "Tuban Jln.Pnadwa",
        ],
        [
            "id_siswa" => "2",
            "nis_siswa" => "002",
            "nama_siswa" => "Adip Pradipta",
            "kelas_siswa" => "11 PPLG 2",
            "alamat_siswa" => "Lamongan Jln.Pone",
            ],
            [
        "id_siswa" => "3",
        "nis_siswa" => "003",
        "nama_siswa" => "Alethea Maulana",
        "kelas_siswa" => "11 PPLG 2",
        "alamat_siswa" => "Kudus Jln.Murua",
        ],
        [
        "id_siswa" => "4",
        "nis_siswa" => "004",
        "nama_siswa" => "Alya Rana",
        "kelas_siswa" => "11 PPLG 2",
        "alamat_siswa" => "Kudus Jln.Colo",
        ],
        [
        "id_siswa" => "5",
        "nis_siswa" => "005",
        "nama_siswa" => "Arviah Faustina Ardhan",
        "kelas_siswa" => "11 PPLG 2",
        "alamat_siswa" => "Kudus Jln.Museum Kretek",
        ],
    ];
    public static function all(){
        return self::$students;
    }
}

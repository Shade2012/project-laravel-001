<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis_siswa',
        'nama_siswa',
        'tanggal_lahir',
        'kelas_siswa',
        'alamat_siswa',
        // Add other attributes as needed
    ];
}

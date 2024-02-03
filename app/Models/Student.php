<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'nis_siswa', 'nama_siswa', 'tanggal_lahir', 'kelas_id', 'alamat_siswa',
    // ];   
    protected $guarded = ['id'];
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    
}

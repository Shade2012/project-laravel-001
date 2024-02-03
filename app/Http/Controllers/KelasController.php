<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(){
        return view('kelas.all',[
            "title" => "Kelas",
           "kelass" => Kelas::all()
        ]);
    }
    public function show($kelasId){
        $kelas = Kelas::find($kelasId);
        $title = "Details " . $kelas->nama_siswa;
    
        return view("kelas.detail", [
            "title" => $title,
            "kelas" => $kelas
        ]);
    }
  
    public function destroy(Kelas $kelas){
        $result = $kelas->delete();
        if($result){
        return redirect('/kelas/all')->with('success','Data Siswa berhasil dihapus');
        }
    }
    public function create(){
        $title = "Add Data";
        return view("kelas.create", [
            "title" => $title,
        ]);
        
    }
    public function edit(Kelas $kelas){
        $title = "Edit " . $kelas->kelas_siswa;
    return view('kelas.edit',[
    "title"=>"$title",
    "kelas"=> $kelas
        ]);
    }
    //Kalau mau pakai disable di input nis di edit.blade.php maka pake kodingan ini dan pasang disable di input nis
    public function update(Request $request, $kelasId){
        $kelas = Kelas::find($kelasId);
        $result = $kelas->update($request->all());
        if ($result) {
            return redirect('/kelas/all')->with('success','Data Siswa berhasil dirubah');
        }
    }
    //sedangkan kalau mau hanya memakai readonly alias yang sekarang bisa pakai yang ini
    // public function update(Request $request, Student $student){
    //     $validateData = $request->validate([
    //         "nis_siswa" => "required|max:255",
    //         "nama_siswa" => "required|max:255",
    //         "tanggal_lahir" => "required",
    //         "kelas_siswa" => "required",
    //         "alamat_siswa" => "required"
    //     ]);
    //     $result = Student::where('id',$student->id)->update($validateData);
    //     if ($result) {
    //         return redirect('/student/all')->with('success','Data Siswa berhasil dirubah');
    //     }
    // }
    public function add(Request $request){
        $validateData = $request->validate([
            "kelas_siswa" => "required"
        ]);
        $result = Kelas::create($validateData);
        if ($result) {
            return redirect('/kelas/all')->with('success','Data Siswa berhasil ditambah');
        }
        
        }
    // public function show($student){
    //     return view("student.detail",[
    //         "title" => "Details $student",
    //         "student" => Student::find($student)
    //     ]);
    // }
}

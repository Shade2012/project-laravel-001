<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('student.all',[
            "title" => "Students",
           "students" => Student::all()
        ]);
    }
    public function show($studentId){
        $student = Student::find($studentId);
        $title = "Details " . $student->nama_siswa;
    
        return view("student.detail", [
            "title" => $title,
            "student" => $student
        ]);
    }
  
    public function destroy(Student $student){
        $result = $student->delete();;
        if($result){
        return redirect('/student/all')->with('success','Data Siswa berhasil dihapus');
        }
    }
    public function create(){
        $title = "Add Data";
        return view("student.create", [
            "title" => $title,
        ]);
        
    }
    public function edit(Student $student){
        $title = "Edit " . $student->nama_siswa;
    return view('student.edit',[
    "title"=>"$title",
    "student"=> $student
        ]);
    }
    //Kalau mau pakai disable di input nis di edit.blade.php maka pake kodingan ini dan pasang disable di input nis
    public function update(Request $request, $studentId){
        $student = Student::find($studentId);
        $result = $student->update($request->all());
        if ($result) {
            return redirect('/student/all')->with('success','Data Siswa berhasil dirubah');
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
            "nis_siswa" => "required|max:255",
            "nama_siswa" => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas_siswa" => "required",
            "alamat_siswa" => "required"
        ]);
        $result = Student::create($validateData);
        if ($result) {
            return redirect('/student/all')->with('success','Data Siswa berhasil ditambah');
        }
        
        }
    // public function show($student){
    //     return view("student.detail",[
    //         "title" => "Details $student",
    //         "student" => Student::find($student)
    //     ]);
    // }

}
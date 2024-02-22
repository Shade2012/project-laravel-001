<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('dashboard.student.all', [
            "title" => "Students",
            "students" => $students,
            "isAuthenticated" => Auth::check(),
        ]);
    }
    public function show($studentId)
    {
        $student = Student::findOrFail($studentId);
        $title = "Details " . $student->nama_siswa;
        return view("dashboard.student.detail", [
            "title" => $title,
            "student" => $student,
            "isAuthenticated" => Auth::check(),
        ]);
    }
  
    public function destroy(Student $student)
    {
        if (Auth::check()) {
            $student->delete();
            return redirect('/dashboard/student/all')->with('success', 'Data Siswa berhasil dihapus');
        }
        return redirect('/dashboard/student/all')->with('error', 'Unauthorized action');
    }

    public function create(){
        
        $title = "Add Data";
        return view("dashboard.student.create", [
            "title" => $title,
            "kelas" => Kelas::all(),
            
        ]);
        
    }
    public function edit(Student $student){
        
        $title = "Edit " . $student->nama_siswa;
    return view('dashboard.student.edit',[
    "title"=>"$title",
    "student"=> $student,
    "kelas" => Kelas::all(),
    
        ]);
    }
    //Kalau mau pakai disable di input nis di edit.blade.php maka pake kodingan ini dan pasang disable di input nis
    public function update(Request $request, $studentId){
        $validateData = $request->validate([
            "nis_siswa" => "required|max:255",
            "nama_siswa" => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas_id" => "required", 
            "alamat_siswa" => "required"
        ]);
    
        $student = Student::find($studentId);
        $result = $student->update($validateData);
    
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', 'Data Siswa berhasil dirubah');
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
            "kelas_id" => "required",
            "alamat_siswa" => "required"
        ]);
        $existingNis = Student::where('nis_siswa',$validateData['nis_siswa'])->first();
        if ($existingNis) {
            return back()->withInput()->with('errorNis', 'NIS Siswa sudah terdaftar');
        }
        $result = Student::create($validateData);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success','Data Siswa berhasil ditambah');
        } else {
            return back()->withInput()->with('error', 'Gagal Menambahkan data');
        }
        
        }
    // public function show($student){
    //     return view("student.detail",[
    //         "title" => "Details $student",
    //         "student" => Student::find($student)
    //     ]);
    // }
//     public function user() {
        
//         $user = User::first(); // Assuming you want the first user
//         if ($user) {
//             return $user->name;
//         } else {
//             return 'User';
//         }
    
// }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    public function home() {
        // Assuming you have a specific user_id you want to pass
         
         // Call the user function and pass the $user_id
         $userData = $this->user();
         
         return view('home', [
             "title" => "Home",
             "user" => $userData, // Access the username from the returned data
         ]);
     }

     public function about() {
        // Assuming you have a specific user_id you want to pass
         
         // Call the user function and pass the $user_id
         $userData = $this->user();
         
         return view('about',[
            "title" => "About",
            "name" => "Damar Fikri Haikal",
            "email" =>"damarfikrihaikal2@gmail.com",
            "kelas" => "11 PPLG 2",
            "image" => "image/damar02.jpg",
            "github" => "https://github.com/Shade2012",
            "linkedin" => "https://www.linkedin.com/in/damar-fikri-haikal-539b65294/",
            "user" => $userData
        ]);
     }
    public function user() {
        
        $user = User::first(); // Assuming you want the first user
        if ($user) {
            return $user->name;
        } else {
            return 'User';
        }
    
}
}

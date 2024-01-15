@extends('layout.main')

@section('container')
<div class="container-about" >
  <h1>Tentang Saya</h1>
  <h4 style="margin-top: 20px; margin-bottom: 10px;">Nama</h4>
  <p>{{$name}}</p>
  <h4 style="margin-top: 20px; margin-bottom: 10px;">Email</h4>
  <p>{{$email}}</p>

  <h4 style="margin-top: 20px; margin-bottom: 10px;">Kelas</h4>
  <p>{{$kelas}}</p>
  <h4 style="margin-top: 20px; margin-bottom: 10px;">Linkedin</h4>
  <a style="font-family:'Josh', Courier, monospace; color:black" href="{{$linkedin}}">{{$linkedin}}</a>
  <h4 style="margin-top: 20px; margin-bottom: 10px;">Github</h4>
  <a style="font-family:'Josh', Courier, monospace; color:black" href="{{$github}}">{{$github}}</a>
  <h4 style="margin-top: 20px; margin-bottom: 10px;">Keahlian</h4>

  <div class="skills">
  <div class="skill">
    <div class="skill-name">PHP</div>
    <div class="skill-bar"> 
    <div class="skill-per" style="max-width:50%"></div>
  </div>
  </div>
  <div class="skill">
    <div class="skill-name">Flutter</div>
    <div class="skill-bar"> 
    <div class="skill-per" style="max-width:70%"></div>
  </div>
  </div>
  <div class="skill">
    <div class="skill-name">HTML</div>
    <div class="skill-bar"> 
    <div class="skill-per" style="max-width:70%"></div>
  </div>
  </div>
  </div>
</div>
<div class="container-skill2">
  <div class="container-image">
<img class="gambar" src="{{$image}}"   alt="">
</div>

  <div class="skills">
  <div class="skill">
    <div class="skill-name">CSS</div>
    <div class="skill-bar"> 
    <div class="skill-per" style="max-width:60%"></div>
  </div>
  </div>
  <div class="skill">
    <div class="skill-name">JavaScript</div>
    <div class="skill-bar"> 
    <div class="skill-per" style="max-width:60%"></div>
  </div>
  </div>
  <div class="skill">
    <div class="skill-name">React</div>
    <div class="skill-bar"> 
    <div class="skill-per" style="max-width:65%"></div>
  </div>
  </div>
  </div>
</div>




@endsection

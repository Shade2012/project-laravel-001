<style>
    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        display: block;
    }

    .sidebar a:hover {
        background-color: #555;
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
    }
</style>

@auth
<div class="sidebar">
    <a href="/home">Home</a>
    <a href="/dashboard/student/all">Student Dashboard</a>
    <a href="/dashboard/kelas/all">Kelas Dashboard</a>
    
    <div>
        @auth
    <a class="nav-link me-md-4" ><i class="fa-solid fa-user"></i> {{ Auth::user()->name }}</a>
    <form action="/login/logout" method="post">
        @csrf
        <button style="color: #fff; margin-left: 16px;" type="submit" class="btn btn-link nav-link me-md-4"><i class="fa-solid fa-sign-out"></i> Logout</button>

    </form>
@endauth

    
    </div>
</div>
@endauth

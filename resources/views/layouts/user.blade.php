<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSRM @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top mb-3">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('img/logo-rsia-ph.png')}}" height="30"
                    class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="
                    {{-- {{route('logupload')}} --}}
                    ">Log Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="
                    {{route('user.index')}}
                    ">Manage Users</a>
                </li>
            </ul>

            <div class="dropdown float-right">
                @if(\Auth::user())
                <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown"
                    data-toggle="dropdown">
                    @if (Auth::user())
                        {{Auth::user()->name}}
                    @endif
                </button>
                @endif
                <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
                    <a href="#" class="dropdown-item">Profile</a>
                    {{-- <a href="#" class="dropdown-item">Setting</a> --}}
                    <div class="dropdown-divider"></div>
                    <li>
                        <form action="{{route("logout")}}" method="POST">
                            @csrf
                            <button class="dropdown-item" style="cursor:pointer">Log Out</button>
                        </form>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <div class="container">
        @yield("content")
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bscfi.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
</body>

</html>
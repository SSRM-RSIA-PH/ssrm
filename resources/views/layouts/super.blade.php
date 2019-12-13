<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSRM @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        .active {
            background: #18a4e0;
            border-radius: 3px
        }

        .nav-link {
            margin-right: 5px
        }

        .nav-link:hover {
            background: #eb7900;
            opacity: 80%;
            border-radius: 3px
        }

        .error-message {
            color: red;
            padding-top: 3px;
            font-size: 80%;
            font-weight: 400
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('img/logo-rsia-ph.png')}}" height="30"
                    class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav h5">
                    @yield("menu")
                </ul>

            </div>
            <div class="float-right mr-1">
                @yield('pasien')
            </div>
            <div class="dropdown float-right">
                <span>|</span>
                @if(Auth::user())
                <button class="btn btn-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
                    {{-- {{Auth::user()->name}} --}}
                    <img src="{{asset('img/account_circle-24px.svg')}}" alt="">
                </button>
                @endif
                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a class="dropdown-item" href="#">Profile</a> --}}
                    {{-- <div class="dropdown-divider"></div> --}}
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

    <div class="container-fluid">
        @yield("content")
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bscfi.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        });
    </script>

</body>

</html>
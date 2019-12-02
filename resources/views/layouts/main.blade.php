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
            background: #eb7900;
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
                    <a class="dropdown-item" href="#">Profile</a>
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

    <div class="container-fluid">

        {{-- <div class="row"> --}}
            @yield("content")
            @if (isset($rekmed))
            <div class="modal fade" id="pasienProfile" tabindex="-1" role="dialog" aria-labelledby="pasienProfileTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pasienProfileTitle">Nama Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success w-100">
                            <table class="w-100">
                                <tr>
                                    <th>No Rekam Medis</th>
                                    <td>{{$rekmed->rek_id}}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <td>{{$rekmed->rek_name}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
        {{-- </div> --}}
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
        //catatan perkembangan
        $('#customCheck1').click(function() {
            $('#perkembangan').toggle();
            $('#perkembangan').attr('hidden', false);
            $('#cfl1').html('Choose file');
            $('#cp').val(null);
        });

        //catatan perkembangan terintegrasi
        $('#customCheck1t').click(function() {
            $('#perkembangant').toggle();
            $('#perkembangant').attr('hidden', false);
            $('#cflct').html('Choose file');
            $('#ct').val(null);
        });
        
        //resume
        $('#customCheck2').click(function() {
            $('#resume').toggle();
            $('#resume').attr('hidden', false);
            $('#cfl2').html('Choose file');
            $('#rsm').val(null);
        });
        
        //grafik perkembangan
        $('#customCheckgp').click(function() {
            $('#gp').toggle();
            $('#gp').attr('hidden', false);
            $('#cflgp').html('Choose file');
            $('#cfgp').val(null);
        });
        
        //pengkajian awal
        $('#customCheckpa').click(function() {
            $('#pa').toggle();
            $('#pa').attr('hidden', false);
            $('#cflpa').html('Choose file');
            $('#cfpa').val(null);
        });
        
        //penunjang
        $('#customCheck3').click(function() {
            $('#penunjang').toggle();
            $('#penunjang').attr('hidden', false);
            $('#cusg').attr('checked', false);
            $('#cflp1').html('Choose file');
            $('#usg').val(null);
            $('#cflp2').html('Choose file');
            $('#ctg').val(null);
            $('#cflp3').html('Choose file');
            $('#xray').val(null);
            $('#cflp4').html('Choose file');
            $('#ekg').val(null);
            $('#cflp5').html('Choose file');
            $('#lab').val(null);
        });
        
        //penunjang detail
        $('#cusg').click(function() {
            $('#fusg').toggle();
            $('#fusg').attr('hidden', false);
            $('#cflp1').html('Choose file');
            $('#usg').val(null);
        });
        $('#cctg').click(function() {
            $('#fctg').toggle();
            $('#fctg').attr('hidden', false);
            $('#cflp2').html('Choose file');
            $('#ctg').val(null);
        });
        $('#cxray').click(function() {
            $('#fxray').toggle();
            $('#fxray').attr('hidden', false);
            $('#cflp3').html('Choose file');
            $('#xray').val(null);
        });
        $('#cekg').click(function() {
            $('#fekg').toggle();
            $('#fekg').attr('hidden', false);
            $('#cflp4').html('Choose file');
            $('#ekg').val(null);
        });
        $('#clab').click(function() {
            $('#flab').toggle();
            $('#flab').attr('hidden', false);
            $('#cflp5').html('Choose file');
            $('#lab').val(null);
        });
        
        // Navbar
        
    </script>
</body>

</html>
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

        {{-- <div class="row"> --}}
        @yield("content")
        @if (isset($rekmed))
        <div class="modal fade" id="pasienProfile" tabindex="-1" role="dialog" aria-labelledby="pasienProfileTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document" style="min-width=1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pasienProfileTitle">Nama Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <table class="table table-hover">
                                <div class="card text-white bg-info mb-3 shadow">
                                    <div class="card-header">Pasien</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                No Rekam Medis
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_id}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Nama Pasien
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_name}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                NIK
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_nik}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Tempat Tanggal Lahir
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_tempat_lahir}},
                                                    {{$rekmed->rek_tanggal_lahir}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Golongan Darah
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_darah}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Agama
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_agama}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Pekerjaan
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_job}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                No Telepon
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_hp}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Alamat
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->rek_alamat}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @switch($rekmed->rek_status)
                                @case('ibu')
                                {{-- suami --}}
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-header">Suami</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Nama Suami
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->s_name}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Pekerjaan
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->s_job}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Golongan Darah
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->s_darah}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                No Telepon
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->s_hp}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Alamat
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->s_alamat}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- anak --}}
                                @foreach ($rekmed->anak() as $anak)
                                <div class="card text-white bg-info mb-3 shadow">
                                    <div class="card-header">Anak</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Nama Anak
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$anak->ra_name}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Anak Ke
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$anak->ra_anak_ke}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Tempat Danggal Lahir
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$anak->ra_tempat_lahir}},
                                                    {{$anak->ra_tanggal_lahir}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Golongan Darah
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$anak->ra_darah}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @break

                                @case('anak')
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-header">Orang Tua</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Nama Ibu
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->p_ibu}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                No Hp Ibu
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->p_ibu_hp}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Nama Ayah
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->p_bpk}}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                No Hp Ayah
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="card-title">{{$rekmed->p_bpk_hp}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break

                                @default

                                @endswitch
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

// filelengkap
        $('#customCheck4').click(function() {
            $('#filelengkap').toggle();
            $('#filelengkap').attr('hidden', false);
            $('#cfl2').html('Choose file');
            $('#fl').val(null);
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
        
        // create pasien
        $('#ortu').hide();
        $('#suami').hide();
        $('#ribu').click(function() {
            $('#suami').show();
            $('#ortu').hide();
        });
        $('#ranak').click(function() {
            $('#suami').hide();
            $('#ortu').show();
        });

        // anak pasien
        $('#ca1').click(function() {
            $('#ba1').toggle();
            $('#ba1').attr('hidden', false);
        });

        $('#ca2').click(function() {
            $('#ba2').toggle();
            $('#ba2').attr('hidden', false);
        });

        $('#ca3').click(function() {
            $('#ba3').toggle();
            $('#ba3').attr('hidden', false);
        });

        $('#ca4').click(function() {
            $('#ba4').toggle();
            $('#ba4').attr('hidden', false);
        });

        $('#ca5').click(function() {
            $('#ba5').toggle();
            $('#ba5').attr('hidden', false);
        });

        // Numeric only control handler
        jQuery.fn.ForceNumericOnly =
        function()
        {
            return this.each(function()
            {
                $(this).keydown(function(e)
                {
                    var key = e.charCode || e.keyCode || 0;
                    // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                    // home, end, period, and numpad decimal
                    return (
                        key == 8 || 
                        key == 9 ||
                        key == 13 ||
                        key == 46 ||
                        key == 110 ||
                        key == 190 ||
                        (key >= 35 && key <= 40) ||
                        (key >= 48 && key <= 57) ||
                        (key >= 96 && key <= 105));
                });
            });
        };
        $("#search").ForceNumericOnly();
        $("#rek_id").ForceNumericOnly();
        $('#rek_nik').ForceNumericOnly();
    </script>
</body>

</html>
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @yield("menu")
                </ul>

            </div>
            <div class="dropdown float-right">
                @if(Auth::user())
                <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown"
                    data-toggle="dropdown">
                    {{Auth::user()->name}}
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

    <div class="container">
        <div class="row">
            @yield("content")

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
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
        

    </script>
</body>

</html>
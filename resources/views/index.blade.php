<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/BuatPesanan">Booking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/Login">Login</a>
                </li>
              </ul>
              {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form> --}}
            </div>
        </nav>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12 mt-5">
                <h1>Selamat Datang</h1>
            </div>
            <div class="col-md-12 mt-5">
              <form action="/CekResi" method="post">
                @csrf
                <label>Lacak Pesanan :</label>
                <div class="input-group">
                    <input type="text" name="id" class="form-control">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">cari</button>
                    </div>
                </div>
              </form>
              @isset($pesanan)
                <div class="card mt-5">
                  <div class="card-body">
                    <div class="row ">
                      <div class="col-md-4">
                        <h4>Detail Pengiriman</h4>
                        <table>
                          <tr>
                            <td>Nama Penerima &nbsp;</td><td>: &nbsp;</td>
                            <td>{{ $penerima->Nama }}</td>
                          </tr>
                          <tr>
                            <td>Alamat &nbsp;</td><td>: &nbsp;</td>
                            <td>{{ $penerima->Alamat }}</td>
                          </tr>
                          <tr>
                            <td>No Telepon &nbsp;</td><td>: &nbsp;</td>
                            <td>{{ $penerima->NoTelepon }}</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-8">
                        <table center style="border: 0px; align-self: center;" cellspacing="0" cellpadding="0">
                          @foreach ($statuList as $data)
                            <tr>
                              <td><img src="{{ URL::asset('img/LinePesanan.png') }}" style="width: 50px;" alt="Avatar"></td>
                              <td>{{ $data->created_at }} &nbsp;</td>
                              <td>{{ $data->Status }}</td>
                              {{-- <td>{{ $data->Keterangan }}</td>                           --}}
                            </tr>
                          @endforeach
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              @endisset
            </div>
        </div>
        <script src="js/script.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

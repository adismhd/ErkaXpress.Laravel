@extends('layout.admin')

@section('container')
    <div class="mt-5">
        <h1>Beranda</h1>
    </div>

    <div class="row py-5 ">
        <div class="col-md-3 col-sm-12 mb-3">
            <div class="card m3" style="border-radius: 25px">
                <div class="card-body m-3 text-center">
                    <h3>Total Pesanan</h3>
                    <hr>
                    <h1>
                        @isset($totalPesanan)
                            {{ $totalPesanan }}
                        @endisset
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 mb-3">
            <div class="card m3" style="border-radius: 25px">
                <div class="card-body m-3 text-center">
                    <h3>Dibuat</h3>
                    <hr>
                    <h1>
                        @isset($totalDibuat)
                            {{ $totalDibuat }}
                        @endisset
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 mb-3">
            <div class="card m3" style="border-radius: 25px">
                <div class="card-body m-3 text-center">
                    <h3>Diproses</h3>
                    <hr>
                    <h1>
                        @isset($totalDiproses)
                            {{ $totalDiproses }}
                        @endisset
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 mb-3">
            <div class="card m3" style="border-radius: 25px">
                <div class="card-body m-3 text-center">
                    <h3>Selesai</h3>
                    <hr>
                    <h1>
                        @isset($totalSelesai)
                            {{ $totalSelesai }}
                        @endisset
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection

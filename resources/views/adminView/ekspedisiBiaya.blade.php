@extends('layout.admin')

@section('container')

<style>
    p {
        color: black
    }
</style>
<hr >
<div class="row mt-3">
    <div class="container-fluid">
        <a href="/DetailPesanan/{{ $NoPesanan }}" class="btn btn-primary">Detail</a> &nbsp;
        <a href="/EkspedisiBiaya/{{ $NoPesanan }}" class="btn btn-primary disabled">Ekspedisi & Biaya</a> &nbsp;
        <a href="/MemoPesanan/{{ $NoPesanan }}" class="btn btn-primary">Memo</a> &nbsp;
    </div>
</div>
<hr >
<h1 class="mt-2">{{ $title }}</h1>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;">
    <form action="InsertEkspedisi" method="post">
        @csrf
        <div class="card-header">
            <h5>Ekspedisi</h5>
        </div>
        <div class="card-body">
            <input type="text" value="{{ $ekspedisi->id }}" name="Id" hidden />
            <input type="text" value="{{ $NoPesanan }}" name="NoPesanan" hidden />
            <div class="col-md-12">
                <label>Ekspedisi Dipakai <i style="color: crimson">*</i></label>
                <input type="text" class="form-control mt-1" value="{{ $ekspedisi->Ekspedisi }}" name="Ekspedisi" placeholder="JNE" required>
            </div>
            <div class="col-md-12 mt-3">
                <label>Link Ekspedisi</label>
                <input type="text" class="form-control mt-1" value="{{ $ekspedisi->LinkEkspedisi }}" name="LinkEkspedisi" placeholder="https://domain.com" >
            </div>
            <div class="col-md-12 mt-3">
                <label>Nomor Resi</label>
                <input type="text" class="form-control mt-1" value="{{ $ekspedisi->NoResi }}" name="NoResi" placeholder="BTA13910002" >
            </div>
            <div class="col-md-12 mt-3">
                <label>Nomor Telepon Ekspedisi </label>
                <input type="number" class="form-control mt-1" value="{{ $ekspedisi->NoTelepon }}" name="NoTelepon" placeholder="085xxxxxx" >
            </div>
            <div class="col-md-12 mt-3">
                <label>Keterangan</label>
                <textarea name="Keterangan" class="form-control mt-1" required>{{ $ekspedisi->Keterangan }}</textarea>
            </div>
            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>     
</div>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;">
    <form action="InsertBiaya" method="post">
        @csrf
        <div class="card-header" style="background-color: #008374">
            <h5>Biaya</h5>
        </div>
        <div class="card-body">
            <input type="text" value="{{ $biaya->id }}" name="Id" hidden />
            <input type="text" value="{{ $NoPesanan }}" name="NoPesanan" hidden />
            <div class="col-md-12">
                <label>Biaya Ekspedisi <i style="color: crimson">*</i></label>
                <input type="text" class="form-control mt-1" value="{{ $biaya->BiayaPengiriman }}" name="BiayaPengiriman" id="BiayaPengiriman" oninput="InputPengiriman()" required>
            </div>
            <div class="col-md-12 mt-3">
                <label>Biaya Admin <i style="color: crimson">*</i></label>
                <input type="text" class="form-control mt-1" value="{{ $biaya->BiayaAdmin }}" name="BiayaAdmin" id="BiayaAdmin" oninput="InputAdmin()" required>
            </div>
            <div class="col-md-12 mt-3">
                <label>Total Biaya (Ongkos Kirim)<i style="color: crimson">*</i></label>
                <input type="text" class="form-control mt-1" value="{{ $biaya->TotalBiaya }}" name="TotalBiaya" id="TotalBiaya" min="1" required readonly>
            </div>
            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>     
</div>

<script>
    $(document).ready(function() {
        $("#BiayaAdmin").val(MoneyFormat($("#BiayaAdmin").val()));
        $("#BiayaPengiriman").val(MoneyFormat($("#BiayaPengiriman").val()));
        $("#TotalBiaya").val(MoneyFormat($("#TotalBiaya").val()));
    });

    function InputPengiriman(){
        InputMoneyFormat('BiayaPengiriman', $('#BiayaPengiriman').val());
        HitungTotal();
    }

    function InputAdmin(){
        InputMoneyFormat('BiayaAdmin', $('#BiayaAdmin').val());
        HitungTotal();
    }

    function HitungTotal(){
        var bAdmin = OriginalFormat($("#BiayaAdmin").val()) ;
        var bKirim = OriginalFormat($("#BiayaPengiriman").val());
        var total = bAdmin + bKirim;
        $("#TotalBiaya").val(MoneyFormat(total));
    }
</script>

@endsection
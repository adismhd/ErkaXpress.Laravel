@extends('layout.main')

@section('container')

@if(Session::has('status'))
    <div class="alert alert-primary" role="start">
        {{ Session::get('message') }}
    </div>
@endif

<form action="BuatPesanan" method="post">  
    @csrf
    <div class="mt-3">
        <label>Nama Barang</label>
        <input id="inNamaBarang" name="NamaBarang" class="form-control mt-1" type="text" value="@isset($data){{ $data->NamaBarang }}@endisset" />
    </div>
    <div class="mt-3">
        <label>Berat Barang</label>
        <div class="input-group mt-1">
            <input id="inNamaBarang" name="BeratBarang" class="form-control" type="number" min="0"  value="@isset($data){{ $data->BeratBarang }}@endisset" />  
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Kg</span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Pesan</button>
</form>

@endsection
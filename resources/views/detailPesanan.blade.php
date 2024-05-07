@extends('layout.main')

@section('container')

<h1>Daftar Pesanan</h1>

<div class="table-responsive" >
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Pesanan</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Berat Barang</th>
                <th scope="col">Tanggal Order</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td>1</td>
                <td>{{ $data->NoPesanan }}</td>
                <td>{{ $data->NamaBarang }}</td>
                <td>{{ $data->BeratBarang }} kg</td>
                <td>{{ $data->CreateAt }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
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
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesananList as $data)
                <tr class="">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->NoPesanan }}</td>
                    <td>{{ $data->NamaBarang }}</td>
                    <td>{{ $data->BeratBarang }} kg</td>
                    <td>{{ $data->CreateAt }}</td>
                    <td><a href="DetailPesanan/{{ $data->NoPesanan }}" class="btn btn-primary">Show</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
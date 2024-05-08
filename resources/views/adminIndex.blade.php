@extends('layout.admin')

@section('container')

<div class="mt-5">
    <h1>Daftar Pesanan</h1>
</div>

<div class="table-responsive mt-5" >
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Pesanan</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Berat Barang</th>
                <th scope="col">Status Saat Ini</th>
                <th scope="col">Tanggal Order</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesananList as $data)
                <tr class="" >
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->NoPesanan }}</td>
                    <td>{{ $data->Pengirim->Nama }}</td>
                    <td>{{ $data->Barang->Jenis }}</td>
                    <td>{{ $data->Barang->Berat }} kg</td>
                    {{-- <td @if($data->Status->Status == 'Pesanan Dibuat')
                        style="background-color: rgb(255, 203, 193)"
                        @endif>{{ $data->Status->Status }}</td> --}}
                    <td>
                        @if($data->Status->last()->Status == 'Pesanan Dibuat')
                            <i class="fa-solid fa-circle-exclamation"style="color: red"></i>
                        @endif 
                        {{ $data->Status->last()->Status }}
                    </td>
                    <td>{{ $data->created_at }}</td>
                    <td><a href="DetailPesanan/{{ $data->NoPesanan }}" class="btn btn-sm btn-primary">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@extends('layout.admin')

@section('container')
<div class="mt-4">
    <h1>Daftar Pesanan</h1>
</div>

<div class="card mt-3" style="border-radius: 25px">    
    <div class="card-body" >
        <div class="table-responsive" style="border-radius: 15px;">
            <table class="table table-striped" style="">
                <thead class="table-dark">
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
                                    <i class="fa-solid fa-circle-exclamation" style="color: red"></i>
                                @endif 
                                @if($data->Status->last()->Status == 'Pesanan Selesai Dikirim')
                                    <i class="fa-solid fa-circle-check" style="color: rgb(62, 127, 62)"></i>
                                @endif 
    
                                {{ $data->Status->last()->Status }}
                            </td>
                            <td>{{ $data->created_at }}</td>
                            <td><a href="DetailPesananVendor/{{ $data->NoPesanan }}" class="btn btn-sm btn-primary">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
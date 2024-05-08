@extends('layout.admin')

@section('container')

<style>
    p {
        color: black
    }
</style>

<h1 class="mt-3">Detail Pesanan</h1>

<div class="card">
    <div class="card-body">
        <table>
            <tbody>
                <tr><td>Pesanan Dibuat Tanggal </td><td>&nbsp;:&nbsp;</td><td>{{ $pesanan->created_at }}</td></tr>
                <tr><td>Pengirim </td><td>&nbsp;:&nbsp;</td></td><td>{{ $pengirim->Nama }}</td></tr>
                <tr><td>Status Sekarang </td><td>&nbsp;:&nbsp;</td></td><td>{{ $status->Status  }}</td></tr>
                <tr><td>Nomor Resi </td><td>&nbsp;:&nbsp;</td></td><td>{{ $pesanan->NoPesanan }}</td></tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        <h5>Pengiriman</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 ">
                <table class="table table-sm table-danger">
                    <thead style="background-color: rgb(161, 161, 161)"><tr><th colspan="3">Pengirim</th></tr></thead>
                    <tbody>
                        <tr><td>Nama </td><td>&nbsp;:&nbsp;</td><td>{{ $pengirim->Nama }}</td></tr>
                        <tr><td>No. Telepon </td><td>&nbsp;:&nbsp;</td></td><td>{{ $pengirim->NoTelepon  }}</td></tr>
                        <tr><td>Alamat </td><td>&nbsp;:&nbsp;</td></td><td>{{ $pengirim->Alamat }}</td></tr>
                    </tbody>
                </table></div>
            <div class="col-md-6 ">
                <table class="table table-sm table-primary">
                    <thead style="background-color: rgb(161, 161, 161)"><tr><th colspan="3">Penerima</th></tr></thead>
                    <tbody>
                        <tr><td>Nama </td><td>&nbsp;:&nbsp;</td><td>{{ $penerima->Nama }}</td></tr>
                        <tr><td>No. Telepon </td><td>&nbsp;:&nbsp;</td></td><td>{{ $penerima->NoTelepon  }}</td></tr>
                        <tr><td>Alamat </td><td>&nbsp;:&nbsp;</td></td><td>{{ $penerima->Alamat }}</td></tr>
                    </tbody>
                </table></div>
            {{-- <div class="col-md-2 "  style="height: 100%;"> <p class="align-middle" >-></p> </div> --}}
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        <h5>Status</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 ">
                <table class="table table-sm">
                    <thead style="background-color: rgb(161, 161, 161)">
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th style="text-align: center;"><a href="#" class="btn btn-primary" onclick="showModalTambah()">Tambah</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statuList as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->Status }}</td>
                                <td>{{ $data->Keterangan  }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td  style="text-align: center;">
                                    <a href="" class="btn btn-sm btn-success">Edit</a> &nbsp;
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="InsertStatus" method="post">
                @csrf
                <input type="text" value="{{ $pesanan->NoPesanan }}" name="NoPesanan" hidden />
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Status <i style="color: crimson">*</i></label>
                        <select id="inLayanan" class="form-control mt-1" name="Status">
                            <option value="Sedang Diproses">Sedang Diproses</option>
                            <option value="Pesanan Akan Diambil">Pesanan Akan Diambil</option>
                            <option value="Pesanan Sedang Dikirim">Pesanan Sedang Dikirim</option>
                            <option value="Pesanan Selesai Dikirim">Pesanan Selesai Dikirim</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label>Keterangan <i style="color: crimson">*</i></label> 
                        <textarea id="inKeterangan" name="Keterangan" class="form-control mt-1"required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>            
        </div>
    </div>
</div>

<script type="text/javascript">
    // $(window).on('load', function() {
    //     $('#myModal').modal({
    //         show: true,
    //         keyboard: false,
    //         backdrop: 'static'
    //     });
    // });
    function showModalTambah(){
        $('#myModal').modal({
            show: true,
            backdrop: 'static'
        });
    }
</script>

@endsection
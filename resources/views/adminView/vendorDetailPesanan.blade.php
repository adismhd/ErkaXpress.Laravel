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
        <a href="/DetailPesanan/{{ $pesanan->NoPesanan }}" class="btn btn-primary disabled">Detail</a> &nbsp;
        {{-- <a href="/EkspedisiBiaya/{{ $pesanan->NoPesanan }}" class="btn btn-primary">Ekspedisi & Biaya</a> &nbsp; --}}
        <a href="/MemoPesanan/{{ $pesanan->NoPesanan }}" class="btn btn-primary">Memo</a> &nbsp;
    </div>
</div>
<hr >
<h1 class="mt-2">Detail Pesanan</h1>

<div class="card mt-3" style="border-radius: 25px">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table>
                    <tbody>
                        <tr><td>Pesanan Dibuat Tanggal </td><td>&nbsp;:&nbsp;</td><td>{{ $pesanan->created_at }}</td></tr>
                        <tr><td>Nomor Resi </td><td>&nbsp;:&nbsp;</td><td>{{ $pesanan->NoPesanan }}</td></tr>
                        <tr><td>Pengirim </td><td>&nbsp;:&nbsp;</td><td>{{ $pengirim->Nama }}</td></tr>
                        <tr><td>Status Sekarang </td><td>&nbsp;:&nbsp;</td><td>{{ $status->Status  }}</td></tr>
                        <tr><td>Email </td><td>&nbsp;:&nbsp;</td><td>{{ $pengirim->Email }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table>
                    <tbody>
                        <tr><td style="font-size: large">Total Harga </td><td>&nbsp;:&nbsp;</td><td  style="font-weight: bold; font-size: large">Rp. {{ formatRupiah($biaya->TotalBiaya) }}</td></tr>
                        <tr><td>Asuransi </td><td>&nbsp;:&nbsp;</td>
                            <td>
                                <input type="checkbox" onclick="return false;" class="form-check"  @if ($pesanan->Asuransi === '1') checked @endif />
                            </td>
                        </tr>
                        <tr><td>Packing </td><td>&nbsp;:&nbsp;</td>
                            <td>
                                <input type="checkbox" onclick="return false;" class="form-check"  @if ($pesanan->Packing === '1') checked @endif />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3" style="border-radius: 25px">
    <div class="card-body">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 15%">Status Pembayaran </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td style="vertical-align: middle">
                        @if($biaya->Status == 'Menunggu Pembayaran')
                            {{-- <div class="alert alert-danger" role="alert">
                            </div> --}}
                            <i class="fa-solid fa-circle-exclamation" style="color: red"></i>
                            {{ $biaya->Status }}
                        @else
                            {{ $biaya->Status }}
                        @endif 
                        {{-- @if($biaya->Status == 'Pesanan Selesai Dikirim')
                            <i class="fa-solid fa-circle-check" style="color: rgb(62, 127, 62)"></i>
                        @endif  --}}
                    </td>
                    <td style="text-align: right">
                        <a class="btn btn-primary" href="#" onclick="showModalStatus()">Ganti</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;">
    <div class="card-header" style="overflow: hidden;">
        <h5>Pengiriman</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 ">
                <div style="border-radius: 15px; ">
                    <table class="table table-sm table-info">
                        <thead  class="table-dark"><tr><th colspan="3">Pengirim</th></tr></thead>
                        <tbody>
                            <tr><td class="col-md-3">Nama </td><td>&nbsp;:&nbsp;</td><td>{{ $pengirim->Nama }}</td></tr>
                            <tr><td>No. Telepon </td><td>&nbsp;:&nbsp;</td></td><td>{{ $pengirim->NoTelepon  }}</td></tr>
                            <tr><td>Propinsi </td><td>&nbsp;:&nbsp;</td></td><td>{{ $propinsiPengirim->Nama }}</td></tr>
                            <tr><td>Alamat </td><td>&nbsp;:&nbsp;</td></td><td>{{ $pengirim->Alamat }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 ">
                <div style="border-radius: 15px;">
                    <table class="table table-sm table-success">
                        <thead class="table-dark"><tr><th colspan="3">Penerima</th></tr></thead>
                        <tbody>
                            <tr><td class="col-md-3">Nama </td><td>&nbsp;:&nbsp;</td><td>{{ $penerima->Nama }}</td></tr>
                            <tr><td>No. Telepon </td><td>&nbsp;:&nbsp;</td></td><td>{{ $penerima->NoTelepon  }}</td></tr>
                            <tr><td>Propinsi </td><td>&nbsp;:&nbsp;</td></td><td>{{ $propinsiPenerima->Nama }}</td></tr>
                            <tr><td>Alamat </td><td>&nbsp;:&nbsp;</td></td><td>{{ $penerima->Alamat }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="col-md-2 "  style="height: 100%;"> <p class="align-middle" >-></p> </div> --}}
        </div>
    </div>
</div>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;">
    <div class="card-header" style="overflow: hidden;">
        <h5>Detail Barang</h5>
    </div>
    <div class="card-body">
        @foreach($barang as $item)
            <div class="row">
                <div class="col-md-6 ">
                    <table class="">
                        <tbody>
                            <tr><td>Jenis Barang </td><td>&nbsp;:&nbsp;</td><td>{{ $item->Jenis }}</td></tr>
                            <tr><td>Keterangan </td><td>&nbsp;:&nbsp;</td></td><td>{{ $item->Keterangan }}</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 ">
                    <table >
                        <tbody>
                            <tr><td>Jumlah Barang </td><td>&nbsp;:&nbsp;</td></td><td>{{ $item->Jumlah }}</td></tr>
                            <tr><td>Harga Per Item </td><td>&nbsp;:&nbsp;</td></td><td>Rp. {{ formatRupiah($item->Harga)  }}</td></tr>
                            <tr><td>Total Harga  </td><td>&nbsp;:&nbsp;</td></td><td>Rp. {{ formatRupiah($item->Harga * $item->Jumlah)  }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</div>

{{-- <div class="card mt-3" style="border-radius: 25px; overflow: hidden;">
    <div class="card-header">
        <h5>Status</h5>
    </div>
    <div class="card-body">
        
    </div>
</div> --}}

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
                        <select id="inLayanan" class="form-control mt-1" name="Status" required>
                            <option value=""  disabled selected hidden>-- Pilih --</option>    
                            @foreach ($paramStatus as $item)
                                <option value="{{ $item->Code }}">{{ $item->Nama }}</option>                                
                            @endforeach
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="EditStatus" method="post">
                @csrf
                <input id="idStatus" type="text" name="Id" hidden />
                <input type="text" value="{{ $pesanan->NoPesanan }}" name="NoPesanan" hidden />
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Status <i style="color: crimson">*</i></label>
                        <select id="inEditStatus" class="form-control mt-1" name="Status" required>
                            <option value=""  disabled selected hidden>-- Pilih --</option>    
                            @foreach ($paramStatus as $item)
                                <option value="{{ $item->Code }}">{{ $item->Nama }}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label>Keterangan <i style="color: crimson">*</i></label> 
                        <textarea id="inEditKeterangan" name="Keterangan" class="form-control mt-1"required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>            
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="DeleteStatus" method="post">
                @csrf
                <input id="idStatusDelete" type="text" name="Id" hidden />
                <input type="text" value="{{ $pesanan->NoPesanan }}" name="NoPesanan" hidden />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title">Apakah anda yakin akan menghapus data?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                </div>
            </form>            
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModalStatusPembayaran">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="EditStatusPembayaran" method="post">
                @csrf
                <input type="text" value="{{ $pesanan->NoPesanan }}" name="NoPesanan" hidden />
                <div class="modal-header">
                    <h5 class="modal-title">Status Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Status <i style="color: crimson">*</i></label>
                        <select id="inLayanan" class="form-control mt-1" name="Status" required>
                            <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>    
                            <option value="Lunas" >Lunas</option>    
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>            
        </div>
    </div>
</div>

<script type="text/javascript">
    function showModalTambah(){
        $('#myModal').modal({
            show: true,
            backdrop: 'static'
        });
    }

    function showModalEdit(id,status,keterangan){
        $('#idStatus').val(id);
        $('#inEditStatus').val(status);
        $('#inEditKeterangan').val(keterangan);
        $('#modalEdit').modal({
            show: true,
            backdrop: 'static'
        });
    }
    
    function showModalDelete(id){
        $('#idStatusDelete').val(id);
        $('#modalDelete').modal({
            show: true,
            backdrop: 'static'
        });
    }
    
    function showModalStatus(){
        $('#myModalStatusPembayaran').modal({
            show: true,
            backdrop: 'static'
        });
    }
    
</script>

@endsection
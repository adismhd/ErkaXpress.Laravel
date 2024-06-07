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
        <a href="/EkspedisiBiaya/{{ $NoPesanan }}" class="btn btn-primary">Ekspedisi & Biaya</a> &nbsp;
        <a href="/MemoPesanan/{{ $NoPesanan }}" class="btn btn-primary disabled">Memo</a> &nbsp;
    </div>
</div>
<hr >
<h1 class="mt-2">Memo</h1>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;">
    <div class="card-header">
        <h5>List Memo</h5>
    </div>
    <div class="card-body table-responsive ">
        <div style="border-radius: 15px; overflow: hidden;">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th style="text-align: center">No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th style="text-align: center;"><a href="#" class="btn btn-primary btn-sm" onclick="showModalTambah()">Tambah</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memoList as $data)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>{{ $data->JudulMemo }}</td>
                            <td>{{ $data->IsiMemo  }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td  style="text-align: center;">
                                <a href="#" onclick="showModalEdit({{ $data->id }},'{{ $data->JudulMemo }}','{{ $data->IsiMemo }}')" class="btn btn-sm btn-success">Edit</a> &nbsp;
                                <a href="#" onclick="showModalDelete({{ $data->id }})" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myTambah">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="InsertMemo" method="post">
                @csrf
                <input type="text" value="{{ $NoPesanan }}" name="NoPesanan" hidden />
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Judul <i style="color: crimson">*</i></label>
                        <input type="text" class="form-control mt-1" placeholder="Judul" name="Judul" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label>Isi Memo <i style="color: crimson">*</i></label> 
                        <textarea name="Isi" class="form-control mt-1" required></textarea>
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
            <form action="EditMemo" method="post">
                @csrf
                <input id="idEditMemo" type="text" name="Id" hidden />
                <input type="text" value="{{ $NoPesanan }}" name="NoPesanan" hidden />
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Judul <i style="color: crimson">*</i></label>
                        <input type="text" class="form-control mt-1" placeholder="Judul" id="inJudul" name="Judul" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label>Isi Memo <i style="color: crimson">*</i></label> 
                        <textarea name="Isi" class="form-control mt-1" required id="inIsi"></textarea>
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
            <form action="DeleteMemo" method="post">
                @csrf
                <input id="idDeleteMemo" type="text" name="Id" hidden />
                <input type="text" value="{{ $NoPesanan }}" name="NoPesanan" hidden />
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

<script type="text/javascript">
    function showModalTambah(){
        $('#myTambah').modal({
            show: true,
            backdrop: 'static'
        });
    }

    function showModalEdit(id,status,keterangan){
        $('#idEditMemo').val(id);
        $('#inJudul').val(status);
        $('#inIsi').val(keterangan);
        $('#modalEdit').modal({
            show: true,
            backdrop: 'static'
        });
    }
    
    function showModalDelete(id){
        $('#idDeleteMemo').val(id);
        $('#modalDelete').modal({
            show: true,
            backdrop: 'static'
        });
    }
</script>

@endsection
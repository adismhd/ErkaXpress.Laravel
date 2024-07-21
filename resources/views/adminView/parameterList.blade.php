@extends('layout.admin')

@section('container')

<div class="mt-4">
    <h1>Parameter</h1>
</div>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;"> 
    <div class="card-header" style="overflow: hidden;">
        <h5>Produk</h5>
    </div>
    <div class="card-body" >
        <div class="table-responsive " style="border-radius: 15px;">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Created At</th>
                        <th style="text-align: center;"><a href="#" class="btn btn-primary btn-sm" onclick="showModalTambahProduk()">Tambah</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paramProduk as $data)
                        <tr class="" >
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->Code }}</td>
                            <td>{{ $data->Nama }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td  style="text-align: center;">
                                <a href="#" onclick="showModalEditProduk({{ $data->id }},'{{ $data->Code }}','{{ $data->Nama }}')" class="btn btn-sm btn-success">Edit</a> &nbsp;
                                <a href="#" onclick="showModalDeleteProduk({{ $data->id }})" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambahProduk">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="TambahParamProduk" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <label>Code <i style="color: crimson">*</i></label>
                            <input type="text" name="codeProduk" class="form-control" required>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" name="namaProduk" class="form-control" required>                    
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
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditProduk">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="EditParamProduk" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="idEditProduk" name="Id" class="form-control" hidden>  
                        <div class="col-md-12 mt-3">
                            <label>Code <i style="color: crimson">*</i></label>
                            <input type="text" id="codeEditProduk" name="codeEditProduk" class="form-control" disabled>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" id="namaEditProduk" name="namaEditProduk" class="form-control" required>                    
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
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalDeleteProduk">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="DeleteParamProduk" method="post">
                    @csrf
                    <input id="idDeleteProduk" type="text" name="Id" hidden />
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
</div>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;"> 
    <div class="card-header" style="overflow: hidden;">
        <h5>Status</h5>
    </div>
    <div class="card-body" >
        <div class="table-responsive " style="border-radius: 15px;">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        {{-- <th scope="col">Code</th> --}}
                        <th scope="col">Nama</th>
                        <th scope="col">Created At</th>
                        <th style="text-align: center;"><a href="#" class="btn btn-primary btn-sm" onclick="showModalTambahStatus()">Tambah</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paramStatus as $data)
                        <tr class="" >
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $data->Code }}</td> --}}
                            <td>{{ $data->Nama }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td  style="text-align: center;">
                                <a href="#" onclick="showModalEditStatus({{ $data->id }},'{{ $data->Code }}','{{ $data->Nama }}')" class="btn btn-sm btn-success">Edit</a> &nbsp;
                                <a href="#" onclick="showModalDeleteStatus({{ $data->id }})" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambahStatus">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="TambahParamStatus" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" name="namaStatus" class="form-control" required>                    
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
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditStatus">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="EditParamStatus" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="idEditStatus" name="Id" class="form-control" hidden>
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" id="namaEditStatus" name="namaEditStatus" class="form-control" required>                    
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
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalDeleteStatus">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="DeleteParamStatus" method="post">
                    @csrf
                    <input id="idDeleteStatus" type="text" name="Id" hidden />
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
</div>

<div class="card mt-3" style="border-radius: 25px; overflow: hidden;"> 
    <div class="card-header" style="overflow: hidden;">
        <h5>Propinsi</h5>
    </div>
    <div class="card-body" >
        <div class="table-responsive " style="border-radius: 15px;">
            <table class="table table-striped w-100">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Created At</th>
                        <th style="text-align: center;"><a href="#" class="btn btn-primary btn-sm" onclick="showModalTambahPropinsi()">Tambah</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paramPropinsi as $data)
                        <tr class="" >
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->Code }}</td>
                            <td>{{ $data->Nama }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td  style="text-align: center;">
                                <a href="#" onclick="showModalEditPropinsi({{ $data->id }},'{{ $data->Code }}','{{ $data->Nama }}')" class="btn btn-sm btn-success">Edit</a> &nbsp;
                                <a href="#" onclick="showModalDeletePropinsi({{ $data->id }})" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambahPropinsi">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="TambahParamPropinsi" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Propinsi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <label>Code <i style="color: crimson">*</i></label>
                            <input type="text" name="codePropinsi" class="form-control" required>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" name="namaPropinsi" class="form-control" required>                    
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
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditPropinsi">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="EditParamPropinsi" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Propinsi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="idEditPropinsi" name="IdPropinsi" class="form-control" hidden>  
                        <div class="col-md-12 mt-3">
                            <label>Code <i style="color: crimson">*</i></label>
                            <input type="text" id="codeEditPropinsi" name="codeEditPropinsi" class="form-control" disabled>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" id="namaEditPropinsi" name="namaEditPropinsi" class="form-control" required>                    
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
    
    <div class="modal fade" tabindex="-1" role="dialog" id="modalDeletePropinsi">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="DeleteParamPropinsi" method="post">
                    @csrf
                    <input id="idDeletePropinsi" type="text" name="Id" hidden />
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
</div>

<script>   
    function showModalTambahProduk(){
        $('#modalTambahProduk').modal({
            show: true,
            backdrop: 'static'
        });
    }

    function showModalEditProduk(id, code, nama){
        $('#idEditProduk').val(id);
        $('#codeEditProduk').val(code);
        $('#namaEditProduk').val(nama);
        $('#modalEditProduk').modal({
            show: true,
            backdrop: 'static'
        });
    }
    
    function showModalDeleteProduk(id){
        $('#idDeleteProduk').val(id);
        $('#modalDeleteProduk').modal({
            show: true,
            backdrop: 'static'
        });
    }

    function showModalTambahStatus(){
        $('#modalTambahStatus').modal({
            show: true,
            backdrop: 'static'
        });
    }

    function showModalEditStatus(id, code, nama){
        $('#idEditStatus').val(id);
        $('#namaEditStatus').val(nama);
        $('#modalEditStatus').modal({
            show: true,
            backdrop: 'static'
        });
    }
    
    function showModalDeleteStatus(id){
        $('#idDeleteStatus').val(id);
        $('#modalDeleteStatus').modal({
            show: true,
            backdrop: 'static'
        });
    }

    function showModalTambahPropinsi(){
        $('#modalTambahPropinsi').modal({
            show: true,
            backdrop: 'static'
        });
    }

    function showModalEditPropinsi(id, code, nama){
        $('#idEditPropinsi').val(id);
        $('#codeEditPropinsi').val(code);
        $('#namaEditPropinsi').val(nama);
        $('#modalEditPropinsi').modal({
            show: true,
            backdrop: 'static'
        });
    }
    
    function showModalDeletePropinsi(id){
        $('#idDeletePropinsi').val(id);
        $('#modalDeletePropinsi').modal({
            show: true,
            backdrop: 'static'
        });
    }
</script>
@endsection
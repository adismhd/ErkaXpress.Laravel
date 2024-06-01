@extends('layout.admin')

@section('container')

<div class="mt-5">
    <h1>User Admin</h1>
</div>

<div class="card mt-3" style="border-radius: 25px">  
    <div class="table-responsive card-body">
        <div style="border-radius: 15px; overflow: hidden;">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">
                            <center>
                                <a href="#" class="btn btn-sm btn-primary" onclick="showModalTambah()">Tambah</a>
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adminList as $data)
                        <tr class="" >
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                <center>
                                    <a href="#" class="btn btn-sm btn-success" onclick="showModalEdit('{{ $data->id }}','{{ $data->name }}','{{ $data->email }}','{{ $data->password }}')">Detail</a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="TambahUser" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" name="namaUser" class="form-control" required>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Email <i style="color: crimson">*</i></label>
                            <input type="email" name="emailUser" class="form-control" required>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Password <i style="color: crimson">*</i></label>
                            <input type="password" name="passwordUser" class="form-control" required>                    
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
                <form action="EditUser" method="post">
                    @csrf
                    <input id="idUser" type="text" name="Id" hidden />
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <label>Nama <i style="color: crimson">*</i></label>
                            <input type="text" name="namaUserEdit" class="form-control" id="inNama" required>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Email <i style="color: crimson">*</i></label>
                            <input type="email" name="emailUserEdit" class="form-control" id="inEmail" required>                    
                        </div>
                        <div class="col-md-12 mt-3">
                            <label>Password <i style="color: crimson">*</i></label>
                            <input type="password" name="passwordUserEdit" class="form-control" id="inPassword" required>                    
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
</div>

<script>    
    function showModalTambah(){
        // $('#inPassword').val(password);
        $('#modalTambah').modal({
            show: true,
            backdrop: 'static'
        });
    }
</script>

<script>    
    function showModalEdit(id, nama, email, password){
        $('#idUser').val(id);
        $('#inNama').val(nama);
        $('#inEmail').val(email);
        // $('#inPassword').val(password);
        $('#modalEdit').modal({
            show: true,
            backdrop: 'static'
        });
    }
</script>
@endsection
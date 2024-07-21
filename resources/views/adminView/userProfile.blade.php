@extends('layout.admin')

@section('container')

<div class="mt-4">
    <h1>User Profile</h1>
</div>

<div class="card mt-3" style="border-radius: 25px">  
    <div class="card-body">
        @if(isset($message))
            <input type="hidden" value="{{ $message }}" id="isiMsg"/>
            <script>
                $(document).ready(function() {
                   alert($("#isiMsg").val());
                });
            </script>
        @endif
        <form action="EditUserProfile" method="post">
            @csrf
            <div class="col-md-12 mt-3">
                <label>Email</label>
                <input type="text" class="form-control mt-1" value="{{ $userProfile->email }}" disabled name="email">
            </div>
            <div class="col-md-12 mt-3">
                <label>Nama <i style="color: crimson">*</i></label>
                <input type="text" class="form-control mt-1" value="{{ $userProfile->name }}" name="name" required>
            </div>
            <div id="inputPass" style="display: none;">
                <div class="col-md-12 mt-3">
                    <label>Password Lama <i style="color: crimson">*</i></label>
                    <input type="password" class="form-control mt-1" name="passLama">
                </div>
                <div class="col-md-12 mt-3">
                    <label>Password Baru <i style="color: crimson">*</i></label>
                    <input type="password" class="form-control mt-1" name="passBaru">
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn btn-danger" type="button" id="btnPass" onclick="ShowPass()">Ganti Password</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
            {{-- <div class="col-md-12 mt-3">
                <label>Password</label>
                <input type="password" class="form-control mt-1" value="{{ $userProfile->password }}" name="password">
            </div> --}}
        </form>
    </div>
</div>

<script>
    function ShowPass(){
        $('#btnPass').hide();
        $("#inputPass").show();
        //alert("asdas");
        
    }
</script>
@endsection
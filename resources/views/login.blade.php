@extends('layout.main')

@section('container')

<div class="mt-3">
    <h1>Login</h1>
</div>
<form class="mt-3" action="" method="">
    <div class="form-group mt-3">
        <label for="emailUser">Email address</label>
        <input type="email" class="form-control" id="emailUser" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group mt-3">
        <label for="passUser">Password</label>
        <input type="password" class="form-control" id="passUser" placeholder="Password">
    </div>
    <a href="/HalamanAdmin" type="submit" class="btn btn-primary mt-3">Login</a>
</form>

@endsection
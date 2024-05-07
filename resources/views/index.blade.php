<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <h1>Selamat Datang</h1>
                <label>Lacak Pesanan :</label>
            </div>
            <div class="input-group">
                <input type="text" class="form-control">
                <button class="btn btn-primary">cari</button>
            </div>
        </div>
        <script src="js/script.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>

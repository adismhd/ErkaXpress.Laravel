@extends('layout.main')

@section('container')
    <div class="mt-5">
        <h2>Booking Pesanan</h2>
    </div>
    <div class="card mt-4 mb-3" style="border-radius: 25px">
        <div class="card-body m-4">
            <form action="SavePesanan" method="post">
                @csrf
                <div class="row">
                    <div class="mt-2 col-md-6">
                        <label>Layanan <i style="color: crimson">*</i></label>
                        {{-- <input id="inLayanan" name="Layanan" class="form-control mt-1" type="text" required value="@isset($data){{ $data->Layanan }}@endisset" /> --}}
                        <select id="inLayanan" class="form-select mt-1" name="Layanan">
                            @foreach ($param as $item)
                                <option value="{{ $item->Code }}">{{ $item->Nama }}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 col-md-6">
                        <label>Tanggal Penjemputan <i style="color: crimson">*</i></label>
                        <input id="inTanggalPenjemputan" name="TanggalPenjemputan" class="form-control mt-1" type="date"
                            required
                            value="@isset($pesanan){{ $pesanan->TanggalPenjemputan }}@endisset" />
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="mt-2 col-md-4">
                        <label>Nama Pengirim <i style="color: crimson">*</i></label>
                        <input id="inPengirimNama" name="PengirimNama" class="form-control mt-1" type="text"
                            placeholder="Nama" required
                            value="@isset($pengirim){{ $pengirim->Nama }}@endisset" />
                    </div>
                    <div class="mt-2 col-md-4">
                        <label>No. Telp Pengirim <i style="color: crimson">*</i></label>
                        <input id="inPengirimNoTelepon" name="PengirimNoTelepon" class="form-control mt-1" type="number"
                            placeholder="081000000000" required
                            value="@isset($pengirim){{ $pengirim->NoTelepon }}@endisset" />
                    </div>
                    <div class="mt-2 col-md-4">
                        <label>Email Pengirim <i style="color: crimson">*</i></label>
                        <input id="inPengirimEmail" name="PengirimEmail" class="form-control mt-1" type="email"
                            placeholder="email@domain.com" required
                            value="@isset($pengirim){{ $pengirim->Email }}@endisset" />
                    </div>
                    <div class="mt-2 col-md-12">
                        <label>Alamat Propinsi Pengirim <i style="color: crimson">*</i></label>
                        <select class="form-select mt-1" name="PropinsiPengirim" required>
                            <option value=""  disabled selected hidden>-- Pilih --</option>    
                            @foreach ($paramPropinsi as $item)
                                <option value="{{ $item->Code }}">{{ $item->Nama }}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 col-md-12">
                        <label>Alamat Lengkap Pengirim<i style="color: crimson">*</i></label>
                        <textarea id="inPengirimAlamat" name="PengirimAlamat" class="form-control mt-1"required>@isset($pengirim){{ $pengirim->NoTelepon }}@endisset</textarea>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="mt-2 col-md-6">
                        <label>Nama Penerima <i style="color: crimson">*</i></label>
                        <input id="inPenerimaNama" name="PenerimaNama" class="form-control mt-1" type="text"
                            placeholder="Nama" required
                            value="@isset($penerima){{ $penerima->Nama }}@endisset" />
                    </div>
                    <div class="mt-2 col-md-6">
                        <label>No. Telp Penerima <i style="color: crimson">*</i></label>
                        <input id="inPenerimaNoTelepon" name="PenerimaNoTelepon" class="form-control mt-1" type="number"
                            placeholder="081000000000" required
                            value="@isset($penerima){{ $penerima->NoTelepon }}@endisset" />
                    </div>
                    <div class="mt-2 col-md-12">
                        <label>Alamat Propinsi Penerima <i style="color: crimson">*</i></label>
                        <select class="form-select mt-1" name="PropinsiPenerima" required>
                            <option value=""  disabled selected hidden>-- Pilih --</option>    
                            @foreach ($paramPropinsi as $item)
                                <option value="{{ $item->Code }}">{{ $item->Nama }}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 col-md-12">
                        <label>Alamat Lengkap Penerima <i style="color: crimson">*</i></label>
                        <textarea id="inPenerimaAlamat" name="PenerimaAlamat" class="form-control mt-1"required>@isset($penerima){{ $penerima->Alamat }}@endisset</textarea>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="mt-2 col-md-9">
                        <label>Jenis Barang <i style="color: crimson">*</i></label>
                        <input id="inBarangJenis" name="BarangJenis" class="form-control mt-1" type="text"
                            placeholder="Bahan Makanan" required
                            value="@isset($barang){{ $barang->Jenis }}@endisset" />
                    </div>
                    <div class="mt-2 col-md-3">
                        <label>Estimasi Berat Barang (kg) <i style="color: crimson">*</i></label>
                        <div class="input-group mt-1">
                            <input id="inBarangBerat" name="BarangBerat" class="form-control" type="number" min="0"
                                placeholder="100 Kg" required
                                value="@isset($barang){{ $barang->Berat }}@endisset" />
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-md-4">
                        <label>Estimasi Kilo Volume (Kgv)</label>
                        <div class="input-group mt-1">
                            <input id="inBarangKilo" name="BarangKilo" class="form-control" type="number" min="0"
                                placeholder="100 Kgv"
                                value="@isset($barang){{ $barang->Kilo }}@endisset" />
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Kgv</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-md-4">
                        <label>Estimasi Kubik (M3)</label>
                        <div class="input-group mt-1">
                            <input id="inBarangKubik" name="BarangKubik" class="form-control" type="number"
                                min="0" placeholder="100 M3"
                                value="@isset($barang){{ $barang->Kubik }}@endisset" />
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">M3</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-md-4">
                        <label>Jumlah Koli <i style="color: crimson">*</i></label>
                        <div class="input-group mt-1">
                            <input id="inBarangKoli" name="BarangKoli" class="form-control" type="number"
                                min="0" placeholder="100 Koli" required
                                value="@isset($barang){{ $barang->Koli }}@endisset" />
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Koli</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-md-12">
                        <label>Keterangan Barang <i style="color: crimson">*</i></label>
                        <textarea id="inBarangKeterangan" name="BarangKeterangan" class="form-control mt-1"required>@isset($barang){{ $barang->Keterangan }}@endisset</textarea>
                    </div>
                    <div class="mt-2 col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="Asuransi">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Asuransi
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="checkbox" value="1" name="Packing">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Packing
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <button type="submit" class="btn btn-success mt-4">Pesan</button>
            </form>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking Berhasil!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Nomor Resi anda adalah : <b>@isset($pesanan){{ $pesanan->NoPesanan }}@endisset</b> </p>
                    <p style="font-size: small; color:crimson">* Kami akan menghubungi anda dalam rentan waktu 24 jam</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="copyResi()">Salin Resi</button>
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <a type="button" class="btn btn-secondary" href="/">Close</a>
                </div>
            </div>
        </div>
    </div>

    <input type="text" value="@isset($pesanan){{ $pesanan->NoPesanan }}@endisset" id="inResi" hidden>

    @isset($pesanan) 
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });
        });

        function copyResi() {
            // Get the text field
            //var copyText = document.getElementById("myInput");
            var copyText = document.getElementById("inResi");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Salin data berhasil: " + copyText.value);
        }
    </script>
    @endisset
    
    {{-- <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
            });
        });

        function copyResi() {
            // Get the text field
            //var copyText = document.getElementById("myInput");
            var copyText = document.getElementById("inResi");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }
    </script> --}}
    <script>
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var minDate= year + '-' + month + '-' + day;

            $('#inTanggalPenjemputan').attr('min', minDate);
        }); 
    </script>
@endsection

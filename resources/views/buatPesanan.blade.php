@extends('layout.main')

@section('container')
    <div class="mt-2">
        <h1>Booking Pesanan</h1>
    </div>
    <div class="card mt-2 ">
        <div class="card-body">
            <form action="BuatPesanan" method="post">
                @csrf
                <div class="row">
                    <div class="mt-2 col-md-6">
                        <label>Layanan <i style="color: crimson">*</i></label>
                        {{-- <input id="inLayanan" name="Layanan" class="form-control mt-1" type="text" required value="@isset($data){{ $data->Layanan }}@endisset" /> --}}
                        <select id="inLayanan" class="form-control mt-1" name="Layanan">
                            <option value="Reguler">Reguler</option>
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
                        <label>Alamat Pengirim <i style="color: crimson">*</i></label>
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
                        <label>Alamat Penerima <i style="color: crimson">*</i></label>
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
                </div>
                <button type="submit" class="btn btn-success mt-2">Pesan</button>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
@endsection

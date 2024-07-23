@extends('layout.main')

@section('container')
    <div class="mt-5">
        <h2>Order</h2>
    </div>
    <div class="card mt-4 mb-3" style="border-radius: 25px">
        <div class="card-body m-4">
            <form action="SavePesananVendor" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div id="gmbrDispay1" class="">
                            <a href="{{ asset('img/vendor/SPESIFIKASI UMKM Naik Kelas (Putih).jpg') }}" class="glightbox">
                                <img src="{{ asset('img/vendor/SPESIFIKASI UMKM Naik Kelas (Putih).jpg') }}" class="img-thumbnail">
                            </a>
                        </div>
                        <div id="gmbrDispay2"  class=""  style="display: none;">
                            <a href="{{ asset('img/vendor/SPESIFIKASI UMKM Naik Kelas (Hitam).jpg') }}" class="glightbox">
                                <img src="{{ asset('img/vendor/SPESIFIKASI UMKM Naik Kelas (Hitam).jpg') }}" class="img-thumbnail">
                            </a>
                        </div>
                        <div id="gmbrDispay3"  class="" style="display: none;">
                            <a href="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Putih).jpg') }}" class="glightbox">
                                <img src="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Putih).jpg') }}" class="img-thumbnail">
                            </a>
                        </div>
                        <div id="gmbrDispay4"  class="" style="display: none;">
                            <a href="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Hitam).jpg') }}" class="glightbox">
                                <img src="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Hitam).jpg') }}" class="img-thumbnail">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class=""  style="">
                            <h2 id="txtJudul" style="font-weight: bold">Baju UMKM Naik Kelas - Putih</h2>
                            <h3 id="txtHarga">Rp. 130.000</h3>
                        </div>
                        <input type="hidden" id="bHarga"  name="bHarga" value="130000">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Pilihan Item :</label>
                                <select class="form-select" name="bItem" id="bItem" onchange="ChangeItem()">
                                    <option value="UMKM" selected>UMKM</option>
                                    <option value="KADIN">Kadin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Pilihan Warna :</label>
                                <select class="form-select" name="bWarna" id="bWarna" onchange="ChangeItem()">
                                    <option value="Putih" selected>Putih</option>
                                    <option value="Hitam">Hitam</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-4">
                                <label class="mt-2">Size Chart :</label>
                                <select class="form-select" name="bSize" id="bSize"  onchange="ChangeItem()">
                                    <option value="S" selected>S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XXL">XXL + (Rp.10.000)</option>
                                    <option value="XXXL">XXXL + (Rp.10.000)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2">Variant :</label>
                                <select class="form-select" name="bVariant" id="bVariant"  onchange="ChangeItem()">
                                    <option value="Tangan Pendek" selected>Tangan Pendek</option>
                                    <option value="Tangan Panjang">Tangan Panjang + (Rp.10.000)</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="mt-2">Jumlah :</label>
                                <input type="number" min="0" class="form-control" value="1" name="bJumlahItem" id="bJumlahItem">
                            </div>
                        </div>
                        <hr>
                        <label>Deskripsi : </label>
                        <table>
                            <tr><td>Bahan</td><td>&nbsp;:&nbsp;</td><td>Cotton Combat 24s</td></tr>
                            <tr><td>Sablon</td><td>&nbsp;:&nbsp;</td><td>Plastisol</td></tr>
                            <tr><td>Kerah</td><td>&nbsp;:&nbsp;</td><td>Rib Leher 3cm</td></tr>
                        </table>
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
                        <label>Email <i style="color: crimson">*</i></label>
                        <input id="inPengirimEmail" name="PengirimEmail" class="form-control mt-1" type="email"
                            placeholder="email@domain.com" required
                            value="@isset($pengirim){{ $pengirim->Email }}@endisset" />
                    </div>
                    <div class="mt-2 col-md-12">
                        <label>Alamat Propinsi <i style="color: crimson">*</i></label>
                        <select class="form-select mt-1" name="PropinsiPengirim" required>
                            <option value=""  disabled selected hidden>-- Pilih --</option>    
                            @foreach ($paramPropinsi as $item)
                                <option value="{{ $item->Code }}">{{ $item->Nama }}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 col-md-12">
                        <label>Alamat Lengkap<i style="color: crimson">*</i></label>
                        <textarea id="inPengirimAlamat" name="PengirimAlamat" class="form-control mt-1"required>@isset($pengirim){{ $pengirim->NoTelepon }}@endisset</textarea>
                    </div>
                </div>
                <hr>
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

        function ChangeItem() {
            // $("#bSize").val();
            // $("#bVariant").val();
            // $("#bWarna").val();
            // $("#bItem").val();

            if ($("#bItem").val() == "UMKM" && $("#bWarna").val() == "Putih"){
                $("#txtJudul").text("Baju UMKM Naik Kelas - Putih");
                $("#txtHarga").text("Rp. 130.000");
                $("#gmbrDispay1").show();
                $("#gmbrDispay2").hide();
                $("#gmbrDispay3").hide();
                $("#gmbrDispay4").hide();
                $("#bHarga").val("130000");
            }
            if ($("#bItem").val() == "UMKM" && $("#bWarna").val() == "Hitam"){
                $("#txtJudul").text("Baju UMKM Naik Kelas - Hitam");
                $("#txtHarga").text("Rp. 130.000");
                $("#gmbrDispay1").hide();
                $("#gmbrDispay2").show();
                $("#gmbrDispay3").hide();
                $("#gmbrDispay4").hide();
                $("#bHarga").val("130000");
            }
            if ($("#bItem").val() == "KADIN" && $("#bWarna").val() == "Putih"){
                $("#txtJudul").text("Baju Kadin Indonesia - Putih");
                $("#txtHarga").text("Rp. 150.000"); 
                $("#gmbrDispay1").hide();
                $("#gmbrDispay2").hide();
                $("#gmbrDispay3").show();
                $("#gmbrDispay4").hide();
                $("#bHarga").val("150000");
            }
            if ($("#bItem").val() == "KADIN" && $("#bWarna").val() == "Hitam"){
                $("#txtJudul").text("Baju Kadin Indonesia - Hitam");
                $("#txtHarga").text("Rp. 150.000");
                $("#gmbrDispay1").hide();
                $("#gmbrDispay2").hide();
                $("#gmbrDispay3").hide();
                $("#gmbrDispay4").show();
                $("#bHarga").val("150000");
            }
        }
    </script>
    
@endsection

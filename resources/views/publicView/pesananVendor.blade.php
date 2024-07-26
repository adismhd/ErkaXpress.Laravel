@extends('layout.main')

@section('container')
    <div class="mt-5">
        <h2>Order</h2>
    </div>
    <div class="card mt-4 mb-3" style="border-radius: 25px">
        <div class="card-body m-4">
            <form action="" method="post">
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
                        {{-- <div id="gmbrDispay3"  class="" style="display: none;">
                            <a href="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Putih).jpg') }}" class="glightbox">
                                <img src="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Putih).jpg') }}" class="img-thumbnail">
                            </a>
                        </div>
                        <div id="gmbrDispay4"  class="" style="display: none;">
                            <a href="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Hitam).jpg') }}" class="glightbox">
                                <img src="{{ asset('img/vendor/SPESIFIKASI KADIN INDONESIA (Hitam).jpg') }}" class="img-thumbnail">
                            </a>
                        </div> --}}
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
                                    {{-- <option value="KADIN">Kadin</option> --}}
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
                                    <option value="XL">XL</option>
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
                        <select class="form-select mt-1" id="inPropinsiPengirim"  name="PropinsiPengirim" required>
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
                    <div class="mt-2 col-md-12">
                        <label>Kode Pos<i style="color: crimson">*</i></label>
                        <input id="inKodePos" type="number" name="KodePos" class="form-control mt-1"required />
                    </div>
                </div>
                <hr>
                <button type="button" class="btn btn-success mt-4" onclick="Keranjang()">Tambah Keranjang</button>
                <button type="button" class="btn btn-primary mt-4" onclick="ShowModalKeranjang()">Lihat Keranjang</button>
            </form>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="mdKerjang">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="SavePesananVendor" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">List Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <input id="inDtNoTelepon" name="DtNoTelepon" class="form-control mt-1" type="hidden" readonly required />
                            <input id="inDtEmail" name="DtEmail" class="form-control mt-1" type="hidden" readonly required />
                            <input id="inDtPropinsi" name="DtPropinsi" class="form-control mt-1" type="hidden" readonly required />
                            <input id="inDtAlamat" name="DtAlamat" class="form-control mt-1" type="hidden" readonly required />
                            <input id="inDtNama" name="DtNama" class="form-control mt-1" type="hidden" readonly required />
                            <input id="inDt" name="Dt" class="form-control mt-1" type="hidden" readonly required >
                            <table class='table table-sm mt-1' id="tPesanan">
                                <thead><tr><th>Variant</th><th>Warna</th><th>Ukuran</th><th>Jumlah</th><th>Total</th><th>#</th></tr></thead>
                                <tbody id="tbody-tPesanan"></tbody>
                                <tfoot style="background-color:lightgray; border:none">
                                    <tr id="trSubTotal" style='display: none;'><td colspan="4">SubTotal</td><td id="subTotal"></td><td></td></tr>
                                </tfoot>
                            </table>
                            <h3 id="total" style="font-weight: bold; text-align: center">Total : Rp. 0 </h3>
                    </div>
                    <div class="modal-footer" style="">
                        <button type="submit" class="btn btn-primary">Bayar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <a type="button" class="btn btn-secondary" href="/">Close</a> --}}
                    </div>
                </form>
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
            if ($("#bItem").val() == "UMKM" && $("#bWarna").val() == "Putih"){
                $("#txtJudul").text("Baju UMKM Naik Kelas - Putih");
                $("#txtHarga").text("Rp. 130.000");
                $("#gmbrDispay1").show();
                $("#gmbrDispay2").hide();
                $("#bHarga").val("130000");
            }
            if ($("#bItem").val() == "UMKM" && $("#bWarna").val() == "Hitam"){
                $("#txtJudul").text("Baju UMKM Naik Kelas - Hitam");
                $("#txtHarga").text("Rp. 130.000");
                $("#gmbrDispay1").hide();
                $("#gmbrDispay2").show();
                $("#bHarga").val("130000");
            }
        }

        const tempPesanan = [];
        var hargaDasar = 130000;

        function Keranjang() {
            const size = $("#bSize").val();
            const variant = $("#bVariant").val();
            const warna = $("#bWarna").val();
            const jumlah = parseInt($("#bJumlahItem").val());
            const id = size + warna + variant;

            var hrgDasar = hargaDasar;
            if(size == "XXL" || size == "XXXL"){
                hrgDasar += 10000;
            }
            if(variant == "Tangan Panjang"){
                hrgDasar += 10000;
            }
            var subtotal = parseInt(jumlah * hrgDasar);

            if (tempPesanan.length == 0) {
                tempPesanan.push({ pId: id, pSize: size, pVariant: variant, pWarna: warna, pJumlah: jumlah, pTotal: subtotal  });
                //TampilPesanan();
            } else {
                var tempData = 0;
                //pencarian data
                for (var i in tempPesanan) {
                    if (tempPesanan[i].pId == id) {
                        tempData = 1;
                    }
                }

                if (tempData != 0) {
                    for (var i in tempPesanan) {
                        if (tempPesanan[i].pId == id) {
                            //tempPesanan[i].pTotalHarga = tempPesanan[i].pTotalHarga + harga;
                            tempPesanan[i].pJumlah += jumlah;
                        }
                    }
                    //TampilPesanan();
                } else {
                    tempPesanan.push({ pId: id, pSize: size, pVariant: variant, pWarna: warna, pJumlah: jumlah, pTotal: subtotal });
                    //TampilPesanan();
                }
            }
            console.log(tempPesanan);
            alert("Sukses Ditambahkan Ke Keranjang");
        }

        function ShowModalKeranjang(){
            $('#inDtNama').val($("#inPengirimNama").val());
            $('#inDtNoTelepon').val($("#inPengirimNoTelepon").val());
            $('#inDtEmail').val($("#inPengirimEmail").val());
            $('#inDtPropinsi').val($("#inPropinsiPengirim").val());
            $('#inDtAlamat').val($("#inPengirimAlamat").val());
            $('#inDt').val(JSON.stringify(tempPesanan));

            const dt1 = $("#inPengirimNama").val();
            const dt2 = $("#inPengirimNoTelepon").val();
            const dt3 = $("#inPengirimEmail").val();
            const dt4 = $("#inPropinsiPengirim").val();
            const dt5 = $("#inPengirimAlamat").val();

            //alert(!dt1);
            if (!dt1 || !dt2 ||!dt3 || !dt4 || !dt5 ){
                alert("Lengkapi Data Terlebih Dahulu!");
            } else if (tempPesanan.length < 1){
                alert("Tambah Keranjang dahulu!");
            } else {
                var cHtml;
                var cTotal = "";
                var totalHarga = 0;

                $("#trSubTotal").show();

                for (var i in tempPesanan) {
                    totalHarga += parseInt(tempPesanan[i].pTotal);

                    cHtml += "<tr><td style='display: none;'>" + tempPesanan[i].pId + "</td><td style='display: none;'>" + tempPesanan[i].pJumlah + "</td><td>" + tempPesanan[i].pVariant + "</td><td>" + tempPesanan[i].pWarna +
                        "</td><td>" + tempPesanan[i].pSize + "</td>><td>" +
                        "" + tempPesanan[i].pJumlah
                        + "</td>" + "<td>" + tempPesanan[i].pTotal + "</td><td><a href='javascript:void(0)' class='btn btn-warning btn-sm' id='bTambah'>Hps</a></td></tr>";
                    cTotal = "Total : Rp. " + totalHarga;
                }
                $("#tbody-tPesanan").empty();
                $('#tPesanan').append(cHtml);

                document.getElementById('subTotal').innerHTML = totalHarga;
                document.getElementById('total').innerHTML = cTotal;

                $('#mdKerjang').modal({
                    show: true,
                    backdrop: 'static'
                });
            }
        }
    </script>
    
@endsection

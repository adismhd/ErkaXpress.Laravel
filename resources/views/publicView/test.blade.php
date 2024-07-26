@extends('layout.main')

@section('container')
    <?php $ListData = []; $ListData['nama'] = ""?>
    <div class="mt-5">
        <h2>Invoice</h2>
    </div>
    <div class="row">
        <div class="col-md-7 order-1 order-1  mt-4 mb-3">
            <div class="card" style="border-radius: 25px">
                <div class="card-body">
                    <form action="AddItemVendor" method="post">
                        @csrf
                        <input id="inNama" name="Nama" class="form-control mt-1" type="text" placeholder="Nama" required value="" />
                        <input id="inJumlah" name="Jumlah" class="form-control mt-1" type="number" placeholder="1" required value="" />
                        
                        <button type="button" onclick="tambahData()" class="btn btn-success mt-4">Pesan</button>
                    </form>
                    <hr>
                </div>
                <ul id="dataSementara"></ul>
                {{-- @isset($pesanan){{ 
                    $pesanan[] = [
                        "nama" => $pesanan
                        ]; 
                        
                }}
                <p>{{  $pesanan }}</p>
                @endisset
                <p>@isset($ListData){{ $ListData['nama'] }}@endisset</p> --}}
            </div>
        </div>
        <div class="col-md-5 order-1 order-1 mt-3 mb-3" >
            <div class="card" style="border-radius: 25px">
                <div class="card-header">
                    <div class="input-group">
                        <input type="text" class="form-control" id="tNamaCustomer" placeholder="New Customer" />&nbsp;
                        <input type="button" class="btn btn-warning" value="Batalkan Pesanan" onclick="ResetKeranjang()" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group" id="hargaItem">
                        <div class="table-responsive">
                            <table class='table table-sm' id="tPesanan">
                                <thead><tr><th>Pesanan</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr></thead>
                                <tbody id="tbody-tPesanan"></tbody>
                                <tfoot style="background-color:lightgray; border:none">
                                    <tr id="trSubTotal" style='display: none;'><td colspan="3">SubTotal</td><td id="subTotal"></td></tr>
                                    <tr id="trtempDiscount" style='display: none;'><td colspan="3" id="textAtempDiscount"></td><td id="texttempDiscount"></td></tr>
                                    <tr id="trTax" style='display: none;'><td colspan="3" id="textATax"></td><td id="textTax"></td></tr>
                                    <tr id="trService" style='display: none;'><td colspan="3" id="textAService"></td><td id="textService"></td></tr>
                                </tfoot>
                            </table>
                        </div>                       
                        <hr />
                        <center><h3 id="total">Total : Rp. 0 </h3></center>
                    </div>
                </div>
                <div class="card-footer" style="overflow-x:auto">
                    <div class="col-md-12">
                        {{-- <center>
                            <div class="btn-group">
                                <input type="button" class="btn btn-danger" value="Bayar Sekarang" onclick="BayarSekarang()" /> 
                                <input type="button" class="btn btn-primary" value="Bayar Nanti" onclick="BayarNanti()" />
                                <input type="button" class="btn btn-secondary" value="Tunda" onclick="TundaBayar()" />
                            </div>
                        </center> --}}
                    </div>                               
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    const tempPesanan = [];

    function tambahData(){
        const nama = $("#inNama").val();
        const jumlah = $("#inJumlah").val();
        tempPesanan.push({ nama, jumlah });
        tampilkanDaftarSiswa();
        $("#inNama").val("");
        $("#inJumlah").val("");
    }

    function tampilkanDaftarSiswa() {
        const daftarSiswaElement = document.getElementById("dataSementara");
        daftarSiswaElement.innerHTML = ""; // Kosongkan daftar sebelum menampilkan ulang

        tempPesanan.forEach((siswa) => {
            const listItem = document.createElement("li");
            listItem.textContent = `Nama: ${siswa.nama}`;
            daftarSiswaElement.appendChild(listItem);
        });
    }
</script>

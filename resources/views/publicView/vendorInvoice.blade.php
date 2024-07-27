@extends('layout.main')

@section('container')
    <div class="mt-5">
        <h2>Invoice</h2>
    </div>
    <div class="card mt-4 mb-3" style="border-radius: 25px">
        <div class="card-body m-4">
            <h4 style="text-align: center; font-weight: bold">Terima Kasih!</h4>
            <h5 style="text-align: center">Harap Lengkapi pembayaran</h5>
            <hr>
            <div class="col-md-12">
                <label class="mt-2" style="font-weight: bold">Nomor Pesanan : {{ $pesanan->NoPesanan }}</label>
                <button class="btn btn-primary btn-sm float-end" onclick="copyResi()">Salin</button>
            </div>
            <hr>
            <label class="mt-2">Rincian Pembayaran :</label>
            <table class="table table-striped mt-2 ">
                <thead>
                    <tr><th>Produk</th><th>Keterangan</th><th>Jumlah Barang</th><th>Harga</th></tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                    <tr>      
                        <td>{{ $item->Jenis }}</td>      
                        <td> {{ $item->Keterangan }}</td>      
                        <td> {{ $item->Jumlah }}</td>      
                        <td style="text-align: right">Rp. {{ formatRupiah($item->Harga) }}</td>         
                    </tr>
                   @endforeach
                </tbody>
               <tfoot>
                    <tr><td colspan="3" style="font-weight: bold">Sub-Total : </td>
                        <td style="text-align: right; font-size: large; font-weight: bold">Rp. {{ formatRupiah($subBiaya) }}</td></tr>
                    <tr><td colspan="3" style="font-weight: bold">Ongkos Kirim : </td>
                        <td style="text-align: right; font-size: large; font-weight: bold">Rp. {{ formatRupiah($ongkir) }}</td></tr>
                    <tr><td colspan="3" style="font-weight: bold">Total : </td>
                        <td style="text-align: right; font-size: large; font-weight: bold">Rp. {{ formatRupiah($biaya->TotalBiaya) }}</td></tr>
                </tfoot>
            </table>
            <p class="mt-4">Metode Pembayaran : Transfer Bank</p>
            <hr>
            <h4 style="font-weight: bold; color: red; text-align: center">No Rekening BCA : 1393061671</h4>
            <h5 style="text-align: center">Atas Nama : MUHAMAD FAJAR ARDANI</h5>
            <hr>
            <div class="alert alert-danger mt-4" role="alert">
                * Setelah melakukan Transfer, Kirim bukti pembayaran via WhatsApp ke nomor berikut : 
                <a aria-label="Chat on WhatsApp" href="https://wa.me/+6287795417676">
                    <img alt="Chat on WhatsApp" src=" {{asset('img/whatsapp.png') }}" style="height: 30px" />
                <a />
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
@endsection

@extends('layout.main')

@section('container')
    <style>
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>

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
            <div id="dgUpload" class="alert alert-danger mt-4" role="alert">
                * Setelah melakukan pembayaran, Upload bukti pembayaran berupa gambar dibawah ini : 
                <div class="input-group mb-3 px-2 py-2 mt-3 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" class="form-control border-0" accept="image/png, image/gif, image/jpeg, image/jpg">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger mt-4" role="alert">
                * Atau kirim bukti pembayaran via WhatsApp ke nomor berikut : 
                <a aria-label="Chat on WhatsApp" href="https://wa.me/+6287795417676">
                    <img alt="Chat on WhatsApp" src=" {{asset('img/whatsapp.png') }}" style="height: 30px" />
                <a />
            </div>
        </div>
    </div>
    <input type="text" value="@isset($pesanan){{ $pesanan->NoPesanan }}@endisset" id="inResi" hidden>
    <form id="fmUpload" action="UploadDokumen" method="POST">
        @csrf
        <input class="form-control" id="fileContentInput" name="base64" hidden />
        <input class="form-control" id="NoApp" name="noAplikasi" value="{{ $pesanan->NoPesanan }}" hidden />
    </form>
   
    <div class="modal" tabindex="-1" role="dialog" style="overflow-y: auto;" id="modalPembayaran">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-body" style="text-align:center">
                    <label style="font-weight: bold">Bukti transfer sudah terkirim. Terimakasih atas pesanannya</label>
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @if(\Session::has('messagePembayaran'))
        <script>
            $(document).ready(function() {
                $('#modalPembayaran').modal({
                    show: true,
                    backdrop: 'static'
                });

                $("#dgUpload").hide();
            });
        </script>
    @endif

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
            
        //upload
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);
        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }

        $(function () {
            $('#upload').on('change', function () {
                //readURL(input);
                getBase64()
            });
        });
        //#endregion

        //#region ConvertBase64
        function getBase64() {
            ShowLoading();
            var fInputData = $('#upload')[0].files[0];

            var reader = new FileReader();
            reader.onloadend = function () {
                $("#fileContentInput").val(reader.result);
                //$('#imageResult').attr('src', reader.result);
                //console.log(reader.result);
                SaveImage();
            }
            reader.readAsDataURL(fInputData);
        }
        //#endregion

        function SaveImage(){
            $('#fmUpload').submit();
        }

    </script>
    @endisset
@endsection

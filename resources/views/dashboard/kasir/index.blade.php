@extends('dashboard.layouts.main')

@section('isibody')


<div class="container m-4">
    <h1>Kasir</h1>
    <div class="mt-5">
        <form method="post" action="/kasir" class="mb-5 data_kasir">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-sm">
                    <input type="text" style="border: 0;" placeholder="Scan barcode" value="{{ request('kode_produk') }}" name="kode_produk" id="kode_produk" autofocus>
                </div>
                <div class="col-sm">
                    <input type="text" style="border: 0;" class=" form-control @error('nama_produk') is-invalid @enderror namaProduk" id="nama_produk" name="nama_produk" value="">
                </div>
                <div class=" col-sm">
                    <input type="text">
                </div>
                <div class="col-sm">
                    <input type="text" style="border: 0;" value="" readonly>
                </div>
                <div class="col-sm">
                    <a href=""><i class="bi bi-x-octagon"></i></a>
                </div>

            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    // on_scanner();

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* When click show user */
        $('#kode_produk').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == 13) {

                // var kode_produk = $(this).data('kode_produk');
                // $.get('kasir/' + kode_produk + '/edit', function(data) {

                //     $('#kode_produk').val(data.kode_produk);
                //     $('#nama_produk').val(data.nama_produk);
                //     $('#total_stok').val(data.total_stok);
                // })
                alert('you pressed');
            }

        });

    });

    // function on_scanner() {



    //     const inputKodeProduk = document.getElementById('kode_produk');

    //     inputKodeProduk.addEventListener('keypress', function(e) {
    //         if (e.key === 'Enter') {
    //             let namaProduk = document.getElementById("nama_produk").value = "dimas";
    //         }
    //     });
    // }
</script>
@endsection
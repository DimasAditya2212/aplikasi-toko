@extends('dashboard.layouts.main')

@section('isibody')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 ml-3 border-bottom">
    <h1 class="h2">Tambah Stok</h1>
</div>
<div class="col-lg-8 ml-3">
    <form method="post" action="/posts/{{ $post->id }}" class="mb-5">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="kode_produk" class="form-label">Barcode</label>
            <input type="text" class="form-control @error('kode_produk') is-invalid @enderror" id="kode_produk" name="kode_produk" value="{{ old('kode_produk',$post->kode_produk) }}" readonly>

        </div>
        <div class="mb-3">
            <div>
                <label for="title" class="form-label">Nama Produk</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{ $post->nama_produk }}">
                @error('nama_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>



            <div class="mb-3">
                <label for="title" class="form-label">Harga Beli</label>
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli',$post->harga_beli) }}">

            </div>

            <div class=" mb-3">
                <label for="title" class="form-label">Harga Jual</label>
                <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" value="{{ old('harga_jual',$post->harga_jual) }}">

            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Total Stok</label>
                <input type="text" class="form-control @error('total_stok') is-invalid @enderror" id="total_stok" name="total_stok" value="{{ old('total_stok',$post->total_stok) }}">


            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                    @if(old('category_id',$post->category_id)== $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-3">Ubah stok</button>
    </form>
</div>

<!-- <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script> -->
@endsection
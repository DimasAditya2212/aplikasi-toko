@extends('dashboard.layouts.main')

@section('isibody')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 ml-3 border-bottom">
    <h1 class="h2">
        {{ $title }}
    </h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
    <a href="" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-striped table-sm ">
        <thead>
            <tr>
                <th scope="col">Kode Barcode</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Total Stock</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->kode_produk }}</td>
                <td>{{ $post->nama_produk }}</td>
                <td>{{ $post->harga_beli }}</td>
                <td>{{ $post->harga_jual }} </td>
                <td>{{ $post->total_stok }} </td>
                <td><a href="/posts?category={{ $post->category->slug }}" class="text-dark text-decoration-none">
                        {{ $post->category->name }}
                    </a></td>
                <td>

                    <a href="/posts/{{ $post->id }}/edit" class="badge bg-warning"><i class="bi bi-pen"></i><span data-feather="edit"></span></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-start">
        {{ $posts->links() }}
    </div>
</div>


@endsection
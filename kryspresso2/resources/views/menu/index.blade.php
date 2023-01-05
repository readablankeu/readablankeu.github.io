
@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Kryspresso CRUD Menu</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
            <p><a class="btn btn-warning" href="{{ route('menu.create') }}">Tambah Menu</a></p>
            @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}
            </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Menu</th>
                        <th scope="col">Jenis Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Bahan Produk</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Stok Produk</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu as $m)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $m->category_produk }}</td>
                    <td>{{ $m->jenis_produk }}</td>
                    <td>{{ $m->nama_produk }}</td>
                    <td>{{ $m->bahan_produk }}</td>
                    <td>{{ $m->deskripsi_produk }}</td>
                    <td>{{ $m->harga_produk }}</td>
                    <td>{{ $m->stok_produk }}</td>
                    <td><img src="{{ asset('storage/'.$m->gambar) }}" width="70px" height="70px" alt="gambar"></td>
                    <td><a class="btn btn-warning" href="{{ route('menu.edit', $m->id) }}">Edit</a></td>
                    <td>
                        <form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('menu.destroy', $m->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
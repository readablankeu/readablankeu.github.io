@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h2>Edit Menu</h2>
            <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Category Menu</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_produk" id="category_produk" value="Minuman" {{ $menu->category_produk == 'Minuman' ? 'checked' : '' }} >
                    <label class="form-check-label" for="minuman">Minuman</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_produk" id="category_produk" value="Makanan" {{ $menu->category_produk == 'Makanan' ? 'checked' : '' }}>
                    <label class="form-check-label" for="makanan">Makanan</label>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Produk</label>
                <select class="form-control" name="jenis_produk">
                    <option value="">Pilih jenis produk</option>
                    <option value="Coffee" {{ $menu->jenis_produk == 'Coffee' ? 'selected' : '' }}>Coffee</option>
                    <option value="Tea" {{ $menu->jenis_produk == 'Tea' ? 'selected' : '' }}>Tea</option>
                    <option value="Dessert" {{ $menu->jenis_produk == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                    </select>
                {{-- <input type="text" class="form-control" name="jenis_produk" value="{{ $menu->jenis_produk }}"> --}}
            </div>
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" value="{{ $menu->nama_produk }}">
            </div>
            <div class="form-group">
                <label>Bahan Produk</label>
                <textarea class="form-control" rows="3" name="bahan_produk">{{ $menu->bahan_produk }}</textarea>
            </div>
            <div class="form-group">
                <label>Deskripsi Produk</label>
                <textarea class="form-control" rows="3" name="deskripsi produk">{{ $menu->deskripsi_produk }}</textarea>
            </div>
            <div class="form-group">
                <label>Harga Produk</label>
                <input type="text" class="form-control" name="harga_produk" value="{{ $menu->harga_produk }}">
            </div>
            <div class="form-group">
                <label>Stock Produk</label>
                <input type="text" class="form-control" name="stok_produk" value="{{ $menu->stok_produk }}">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" class="form-control" name="gambar"  value="{{ $menu->gambar }}">
            </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
@endsection
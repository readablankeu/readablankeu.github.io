
@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h2>Create Menu</h2>
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Field Baru --}}
            <div class="form-group">
                <label>Category Menu</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_produk" id="category_produk" value="Minuman">
                    <label class="form-check-label" for="minuman">Minuman</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_produk" id="category_produk" value="Makanan">
                    <label class="form-check-label" for="makanan">Makanan</label>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Produk</label><br>
                    <select class="form-control" name="jenis_produk">
                        <option value="">Pilih jenis produk</option>
                        <option value="Coffee">Coffee</option>
                        <option value="Tea">Tea</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Appetizer">Appetizer</option>
                        <option value="Main course">Main Course</option>
                    </select>
            </div>
            <div class="form-group">
                <label>Nama Produk</label><br>
                <input type="text" class="form-control" name="nama_produk">
            </div>
            <div class="form-group">
                <label>Bahan Produk</label>
                <textarea class="form-control"  rows="3" name="bahan_produk"></textarea>
            </div>
            <div class="form-group">
                <label>Deskripsi Produk</label>
                <textarea class="form-control"  rows="3" name="deskripsi_produk"></textarea>
            </div>
            <div class="form-group">
                <label>Harga Produk</label>
                <input type="text" class="form-control" name="harga_produk">
            </div>
            <div class="form-group">
                <label>Stock Produk</label><br>
                <input type="text" class="form-control" name="stok_produk">
            </div>
            <div class="form-group">
                <label>Gambar</label><br>
                <input type="file" class="form-control" name="gambar">
            </div>
        
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
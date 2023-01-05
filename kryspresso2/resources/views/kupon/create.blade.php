@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Create Kupon!</h2>
                <form action="{{ route('kupon.store') }}" method="POST">
                @csrf
                    <div class="form-group">

                        <label for="nama_kupon">Nama kupon </label>
                        <input type="text" class="form-control" placeholder="Masukkan nama kupon" name="nama_kupon">
                    </div>
                    <div class="form-group">
                        <label>Jenis Produk</label>
                            <select class="form-control" name="jenisproduk_id">
                                <option value="">Pilih Jenis</option>
                                @foreach($jenisproduks as $jenisproduk)
                                <option value="{{ $jenisproduk->id }}">{{ $jenisproduk->jenis_produk_menu }}</option>
                                @endforeach
                            </select>
                    </div>
                    {{-- <div class="form-group">
                        <label>Nama produk</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama produk" name="nama_produk">
                    </div> --}}
                    <div class="form-group">
                        <label>Expired kupon</label>
                        <input type="date" class="form-control" name="expired_kupon">
                    </div>
                    <div class="form-group">
                        <label name="deskripsi_kupon">Deskripsi Kupon</label>
                        <textarea type="text" class="form-control" rows="4" name="deskripsi_kupon"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="Claim">
                            <label class="form-check-label" for="Claim">Claim</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="Unclaimed">
                            <label class="form-check-label" for="Unclaim">Unclaim</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
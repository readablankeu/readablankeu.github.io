@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Edit Kupon!</h2>
                <form action="{{ route('kupon.update', $kupon->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_kupon">Nama kupon : </label>
                    <input type="text" class="form-control" name="nama_kupon" value="{{ $kupon-> nama_kupon }}"></input>
                </div>
                <div class="form-group">
                    <label>Jenis Produk</label>
                    <select class="form-control" name="jenisproduk_id">
                                <option value="">Pilih Jenis</option>
                                @foreach($jenisproduks as $jenisproduk)
                                <option value="{{ $jenisproduk->id }}" {{ $jenisproduk->jenisproduk_id == $jenisproduk->id ? 'selected' :''}} >{{ $jenisproduk->jenis_produk_menu }}</option>
                                @endforeach
                            </select>
                </div>
                {{-- <div class="form-group">
                    <label for="nama_produk">Nama produk :</label>
                    <input type="text" class="form-control" name="nama_produk" value="{{ $kupon-> nama_produk }}"></input>
                </div> --}}
                <div class="form-group">
                    <label for="expired_kupon">Expired kupon :</label>
                    <input class="form-control" name="expired_kupon" type="date" value="{{ $kupon-> expired_kupon }}"></input><br>
                </div>
                <div class="form-group">
                    <label name="deskripsiKupon">Deskripsi Kupon</label>
                    <textarea type="text" class="form-control" rows="4" name="deskripsi_kupon">{{ $kupon-> deskripsi_kupon }}</textarea><br>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Claim" {{ $kupon->status == 'Claim' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Claim">Claim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="Unclaimed" {{ $kupon->status == 'Unclaimed' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Unclaim">Unclaim</label>=
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
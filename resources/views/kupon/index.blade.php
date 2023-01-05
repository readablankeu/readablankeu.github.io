@extends('layouts.apps')
@section('content')

    <div class="container">
        <div class="py-5 text-center">
            <h2>Kryspresso CRUD Coupon</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
            <p ><a class="btn btn-warning" href="{{ route('kupon.create') }}">Tambah Kupon</a></p><br>
            @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}
            </div>
            @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kupon</th>
                <th scope="col">Jenis Produk</th>
                {{-- <th scope="col">Nama Produk</th> --}}
                <th scope="col">Expired Kupon</th>
                <th scope="col">Deskripsi kupon</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

        @foreach($kupon as $k)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $k->nama_kupon }}</td>
            <td>{{ $k->jenisproduk->jenis_produk_menu }}</td>
            {{-- <td>{{ $k->nama_produk }}</td> --}}
            <td>{{ $k->expired_kupon }}</td>
            <td>{{ $k->deskripsi_kupon }}</td>
            <td>{{ $k->status }}</td>
            <td><a class="btn btn-warning" href="{{ route('kupon.edit', $k->id) }}">Edit</a></td>
            <td>
                <form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('kupon.destroy', $k->id) }}" method="POST">
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
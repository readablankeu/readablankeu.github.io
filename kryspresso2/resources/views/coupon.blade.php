@extends('layouts.apss')
@section('content')
    <section id="cupon">
        <h1 id="kups">Coupon Section</h1>
        <div class="container" id="apps">
            <div class="row">
                @foreach($kupon as $k)
                <div class="col-md-3 col-6 my-1">
                    <div class="card h-100">
                        {{-- <img class="card-img-top" src="{{ asset('foto/'.Capture2.jpg) }}" alt="Card image cap"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $k->nama_kupon }}</h5>
                            <p class="card-text">{{ $k->deskripsi_kupon}}</p>
                            <p class="card-text">{{ $k->expired_kupon }}</p>
                            <form action="" method="post">
                                <input type="submit" name="upvote" value="claim">
                            </form>
                            {{-- <a post=" {{ route('kupon.index',['id'=>$kupon->status]) }}"class="btn btn-primary">claim here!</a> --}}
                            {{-- <script>
                                var counter = 0;

                                function buttonCheck(){
                                    counter++;
                                
                                    if (counter >= 4)
                                        document.getElementsByClassName("btn").setAttribute("disabled", "disabled");
                                        }
                            </script> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1"><strong>Kryspresso Coffee & Atealier</strong></p>
    </footer>
@endsection
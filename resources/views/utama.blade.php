@extends('layouts.apss')
@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background: url(foto/cashier-2.jpeg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2><span>Kryspresso </span> Coffee & Atealier</h2>
                <p>Everything STOP to take a coffee and found the relax into tea. Enjoy your DAY without sleepy and boring! your favorite coffee and your tea on below! Check our Menu below!</p>
              <div>
                <a href="#menyu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
              </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section><!-- End Hero -->
  <!-- ======= promo ======= -->
  
  <section id="promo-menu">
    <!-- <h1 class="tulisan">Promo</h1> -->
    <div class="container">
      <div class="row">
      <div class="box-promo col-md-12 col-6 my-1" style="background-image: url(foto/glass_coffee.jpg);">
        <a href="coupon" class="promo2">KRYSPRESSO PROMO WHITE's DAY</a>
      </div>
    </div>
    </div>
  </section>
    

  <br>
  <br>
  <!-- Menyu Section Start -->
{{-- <div id="apps"> --}}
  <section id="menyu"> 
    <!-- <h1 class="tulisan">Menu</h1> -->
      <div class="d-flex justify-content-center h-100">
        <div class="search"> <input type="text" class="search-input" placeholder="search..." name=""> <a href="#" class="search-icon"> <i class="fa fa-search"></i> </a> </div>
      </div>
      <h1 id="nums">Menu Section</h1>
      <div class="container">

        <div class="row">
          @foreach($menu as $m)
          <div class="col-md-3 col-6 my-1">
            <div class="card h-100">
              <img class="card-img-top" src="{{ asset('storage/'.$m->gambar) }}" alt="Card image cap">
                <div class="card-body ">
                  <h5 class="card-title"><strong>{{ $m->nama_produk }}</strong></h5>
                    <p class="card-text">{{ $m->jenis_produk}}</p>
                    <p class="card-text">{{ $m->deskripsi_produk}}</p>
                    <p class="card-text">{{ $m->bahan_produk}}</p> 
                    <p class="card-text2">{{ $m->harga_produk}}</p>
                    <p class="card-text2"> stock : {{ $m->stok_produk}}</p>
                      <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#menuModal">click for detail</button> -->
                </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </section><!-- End menyu -->
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1"><strong>Kryspresso Coffee & Atealier</strong></p>
  </footer>
{{-- </div>  --}}
@endsection
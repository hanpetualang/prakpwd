@include('User.navbar')
  
{{-- {{ dd(auth()->user()->email) }} --}}
<div class="container mt-5">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
    @foreach ($dtProduct as $item)                      
    <div class="col mb-4">
      <div class="card">
        <img src="{{ asset('img/'.$item->img) }}" width="190px" height="190px" style="padding: 10px" class="card-img-top" alt="Fail to load image">
        <div class="card-body">
          <h5 class="card-title">{{ $item->tipe }}</h5>
          <p class="card-text">{{ $item->harga }}</p>
          <p class="text-end">
            <br>
            <a href="{{ url('save-order',$item->id) }}"><button class="btn-sm btn-info">Add to cart</button></a>
          </p>
        </div>
      </div>
  </div>  
    @endforeach
  </div>
</div>
<!-- /.container -->


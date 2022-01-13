@include('User.navbar')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="mt-5">
      <div class="d-style rounded btn-brc-tp border-2 bgc-white w-100 my-2 py-3 shadow-sm">
        {{-- {{ dd($order->product) }} --}}
        @foreach ($order as $item)
            
        <div class="row align-items-center bg-secondary text-light rounded mb-3 pt-2 pb-1">
          <div class="col-12 col-md-4">
              <img src="{{ asset('img/'.$item->product->img) }}" width="60px" height="60px" alt="image">
            </div>

          <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-start my-4 my-md-0">
            <li>
              <span>
                  <strong>{{ $item->product->tipe }}</strong>
              </span>
            </li>

            <li class="mt-25">
              <span class="text-110">
                <span>{{ $item->product->harga }}</span>
            </span>
            </li>

            <li class="mt-25">
                <br>
            </li>
          </ul>

          <div class="col-12 col-md-4 text-center">
              <a href="{{ url('delete-order', $item->id_order) }}">
                <i class="fa fa-trash-o" style="font-size:36px;color:orange"></i>
              </a>
          </div>
        </div>
        @endforeach

      </div>

      </div>
    </div>
@foreach($products as $product)
    <div class="col-12 col-sm-8 col-md-6 col-lg-3">
      <div class="card" id="{{$product->id}}">
        <img class="card-img" src="/storage/{{$product->thumbnail}}" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">{{$product->name}}</h4>
          <p class="card-text" >{{$product->description}}</p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success">
              <h5 class="mt-4" >${{$product->price}}</h5>
            </div>
            <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
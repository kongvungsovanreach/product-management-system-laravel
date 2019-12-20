@extends("layouts.user.master")
@section("title", "Home Page")
@section("script")
  <script>
  function showLoading(){
    $body.addClass("loading");
  }

  function hideLoading(){
    $body.removeClass("loading");
  }
  $(document).ready(function(){
    $body = $("body");
    $(".card").click(function(){
      showLoading();
      var id = $(this).attr("id");
      $.ajax({
        url:"/api/user/products/"+id,
        method:"GET",
        success: function(data){
          var product = data.data;
          $("#product-name").text(product.name);
          $("#product-description").text(product.description);
          $("#product-price").text(product.price+"$ only");
          $("#product-thumbnail").attr("src","/storage/"+product.thumbnail);
          hideLoading();
          $("#modalLargeDefault").modal("show");
        },
        error: function(){
        }
      })
    })
  })
  </script>
@endsection
@section("content")
<div class="container">
  <div class="row">
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
    <div id="pagination-div">
      {{$products->links()}}
    </div>
    <div class="modal fade" id="modalLargeDefault" tabindex="-1" role="dialog" aria-labelledby="modalLargeDefaultLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modalLargeDefaultLabel">Product Detail Info</h4>
          </div>
          <div class="modal-body">
            <table class="table">
              <tr style="border:hidden">
                <th>Name</th>
                <td id="product-name"></td>
              </tr>
              <tr style="border:hidden">
                  <th>Price</th>
                  <td id="product-price"></td>
                </tr>
                <tr style="border:hidden">
                    <th>Description</th>
                    <td id="product-description"></td>
                </tr>
            </table>
            <img src="" alt="" id="product-thumbnail" style="width:100%; height:100%">
          </div>
          <div class="modal-footer">
              <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@extends("layouts.admin.master")
@section("title", "Home Page")
@section("script")
  <script>
	$(document).ready(function(){
		$(".view-one").click(function(){
			var id = $(this).attr("id");
			viewOne(id);
		})

		$(".update-one").click(function(){
			var id = $(this).attr("id");
			updateOne(id);
		})

		$(".delete-one").click(function(){
			var id = $(this).attr("id");
			deleteOne(id);
		})


		$("#changeImageButton").click(function(){
			chooseNewImage();
		})

		$("#updateButton").click(function(){
			var id = $("#updateModal #updateId").val();
			updateAction(id);
		})
  	})
  </script>
@endsection
@section("content")
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table class="table table-striped">
						<thead>
							<tr class="table100-head">
								<th class="column1">ID</th>
								<th class="column2">Name</th>
								<th class="column3">Description</th>
								<th class="column4">Price</th>
								<th class="column5">Profile</th>
								<th class="column6">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr id="view-all-row">
									<td class="column1">{{$product->id}}</td>
									<td class="column2" id="uName{{$product->id}}">{{$product->name}}</td>
									<td class="column3" id="uDescription{{$product->id}}">{{$product->description}}</td>
									<td class="column4" id="uPrice{{$product->id}}">{{$product->price}} $</td>
									<td class="column5" >
										<img id="thumbnail-view-all" class=" uThumbnail{{$product->id}}" src="/storage/{{$product->thumbnail}}" alt="">
									</td>
									<td class="column6">
										{{-- <a href=""> --}}
											<button class="btn-primary view-one" id="{{$product->id}}"><i class="fas fa-eye"></i></button>
										{{-- </a> --}}
										{{-- <a href=""> --}}
											<button class="btn-danger update-one" id="{{$product->id}}"><i class="fas fa-edit"></i></button>
										{{-- </a> --}}
										{{-- <a href=""> --}}
											<button class="btn-success delete-one" id="{{$product->id}}><i class="fas fa-trash-alt"></i></button>
										{{-- </a> --}}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<div>
						{{$products->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalLargeDefault" tabindex="-1" role="dialog" aria-labelledby="modalLargeDefaultLabel">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title" id="modalLargeDefaultLabel">Product Detail Info</h4>
			</div>
			<div class="modal-body">
			  <table class="table" style="border:hidden">
				<tr style="border:hidden">
				  <th>Name</th>
				  <td id="product-name"></td>
				</tr>
				<tr style="border:hidden">
					<th>Price</th>
					<td id="product-price"></td>
				  </tr>
				  <tr>
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

	  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="modalLargeDefaultLabel">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title" id="modalLargeDefaultLabel">Product Detail Info</h4>
			</div>
			<div class="modal-body">
			<input type="hidden" id="updateId" >
			 <form action="">
				<table class="table" style="border:hidden">
					<tr style="border:hidden">
					  <th>Name</th>
					  <td id="product-name"><input type="text" class="form-control"></td>
					</tr>
					<tr style="border:hidden">
						<th>Price</th>
						<td id="product-price"><input type="text" class="form-control"></td>
					  </tr>
					  <tr>
						  <th>Description</th>
						  <td id="product-description"><input type="text" class="form-control"></td>
					  </tr>
				  </table>
				  <div class="hiddenfile">
					<input name="thumbnail" type="file" id="fileinput" onchange="pick_image(this)"/>
				  </div>
				  <div class="image-container">
					<img src="" alt="" id="product-thumbnail" class="image" style="width:100%; height:100%">
					<div class="middle" id="changeImageButton">
						<a href="#">
							<input class="btn btn-primary" type="button" value="Upload New">
						</a>
					</div>
				  </div>
			 </form>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-danger mt-3"><i class="fas fa-times"></i> Cancel</a>
				<a href="#" class="btn btn-success mt-3" id="updateButton"><i class="fas fa-edit"></i> Update</a>
			</div>
		  </div>
		</div>
	  </div>

@endsection
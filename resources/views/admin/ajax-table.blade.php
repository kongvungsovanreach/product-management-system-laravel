@foreach($products as $product)
								<tr id="view-all-row" class="delete-row-{{$product->id}}">
									<td class="column1">{{$product->id}}</td>
									<td class="column2" id="uName{{$product->id}}">{{$product->name}}</td>
									<td class="column3" id="uDescription{{$product->id}}">{{$product->description}}</td>
									<td class="column4" id="uPrice{{$product->id}}">{{$product->price}} $</td>
									<td class="column5" >
										<img id="thumbnail-view-all" class=" uThumbnail{{$product->id}}" src="/storage/{{$product->thumbnail}}" alt="">
									</td>
									<td class="column6">
										<button class="btn-primary view-one" id="{{$product->id}}"><i class="fas fa-eye"></i></button>
										<button class="btn-danger update-one" id="{{$product->id}}"><i class="fas fa-edit"></i></button>
										<button class="btn-success delete-one" id="{{$product->id}}"><i class="fas fa-trash-alt"></i></button>
									</td>
								</tr>
							@endforeach
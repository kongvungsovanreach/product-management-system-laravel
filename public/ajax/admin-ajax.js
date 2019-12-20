function renderNewPage(page){
    $.ajax({
        url: "/api/admin/products?page="+page,
        method: "GET",
        success: function(products){
            $("tbody").empty().html(products.data)
        },
        error: function(err){

        }
    })
}

function viewOne(id){
    $.ajax({
        url:"/api/admin/products/"+id,
        method:"GET",
        success: function(product){
            $("#modalLargeDefault #product-name").text(product.name);
            $("#modalLargeDefault #product-description").text(product.description);
            $("#modalLargeDefault #product-price").text(product.price+"$ only");
            $("#modalLargeDefault #product-thumbnail").attr("src","/storage/"+product.thumbnail);
            $("#modalLargeDefault").modal("show");
        },
        error: function(err){
            console.log(err)
        }
    })
}
function updateOne(id){
    $.ajax({
        url:"/api/admin/products/"+id,
        method:"GET",
        success: function(product){
            $("#updateModal #updateId").val(product.id);
            $("#updateModal #product-name input").val(product.name);
            $("#updateModal #product-description input").val(product.description);
            $("#updateModal #product-price input").val(product.price);
            $("#updateModal #product-thumbnail").attr("src","/storage/"+product.thumbnail);
            $("#updateModal").modal("show");
        },
        error: function(err){
            console.log(err)
        }
    })
}

function deleteOne(id){
    console.log(id)
    $.ajax({
        url:"/api/admin/products/"+id,
        method:"DELETE",
        success: function(data){
            swal({
                title: data.message
            });
            $(".delete-row-"+id).remove();
        },
        error: function(err){
            console.log(err)
        }
    })
}

function chooseNewImage(){
    $('#fileinput').trigger('click'); 
}

function pick_image(input) {
    var profile = document.querySelector('#updateModal #product-thumbnail');
    var reader = new FileReader();
    reader.onloadend = function () {
      profile.src = reader.result;
    }
    if (input.files[0]) {
      reader.readAsDataURL(input.files[0]);
    } else {
      profile.src = "";
    }
  }

  function updateAction(id){
      var thumbnail = document.querySelector('#updateModal #fileinput').files[0];
      var formData = new FormData();
      formData.append("name",$("#updateModal #product-name input").val());
      formData.append("description", $("#updateModal #product-description input").val());
      formData.append("price", $("#updateModal #product-price input").val());
      formData.append("thumbnail", thumbnail);
      formData.append("_method", "PUT")
    $.ajax({
        url:"/api/admin/products/"+id,
        method:"POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            $("#updateModal").modal("hide");
            changeDataAfterUpdate(data.data);
            swal({
                title: data.message
            })
        },
        error: function(err){
            console.log(err)
        }
    })
  }

  function changeDataAfterUpdate(product){
      $("#uName"+product.id).text(product.name);
      $("#uDescription"+product.id).text(product.description);
      $("#uPrice"+product.id).text(product.price+"$");
      $(".uThumbnail"+product.id).attr("src","/storage/"+product.thumbnail);
  }
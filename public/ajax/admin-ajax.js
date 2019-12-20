function renderNewPage(page){
    showLoading()
    $.ajax({
        url: "/api/admin/products?page="+page,
        method: "GET",
        success: function(products){
            $("#index-tbody").empty().html(products.data);
            hideLoading();
        },
        error: function(err){

        }
    })
}

function showLoading(){
    $body.addClass("loading");
}

function hideLoading(){
    $body.removeClass("loading");
}

function viewOne(id){
    showLoading();
    $.ajax({
        url:"/api/admin/products/"+id,
        method:"GET",
        success: function(data){
            var product = data.data;
            $("#modalLargeDefault #product-name").text(product.name);
            $("#modalLargeDefault #product-description").text(product.description);
            $("#modalLargeDefault #product-price").text(product.price+"$ only");
            $("#modalLargeDefault #product-thumbnail").attr("src","/storage/"+product.thumbnail);
            $("#modalLargeDefault").modal("show");
            hideLoading();
        },
        error: function(err){
            console.log(err)
        }
    })
}
function updateOne(id){
    showLoading();
    $.ajax({
        url:"/api/admin/products/"+id,
        method:"GET",
        success: function(data){
            var product = data.data;
            $("#updateModal #updateId").val(product.id);
            $("#updateModal #product-name input").val(product.name);
            $("#updateModal #product-description input").val(product.description);
            $("#updateModal #product-price input").val(product.price);
            $("#updateModal #product-thumbnail").attr("src","/storage/"+product.thumbnail);
            $("#updateModal").modal("show");
            hideLoading()
        },
        error: function(err){
            console.log(err)
        }
    })
}

function deleteOne(id){
    showLoading();
    $.ajax({
        url:"/api/admin/products/"+id,
        method:"DELETE",
        success: function(data){
            hideLoading();
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

  function pick_image_insert(input) {
    var profile = document.querySelector('#product-thumbnail');
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
      showLoading();
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
            hideLoading();
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
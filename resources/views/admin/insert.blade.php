@extends('layouts.admin.master')
@section("title", "Insert Page")
@section("style")
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<link href="/admin/css/style.css" rel="stylesheet">
@endsection
@section("script")
<script>
    $(document).ready(function(){
        $("#changeImageButton").click(function(){
		    chooseNewImage();
	    })
    })
</script>
@endsection
@section("content")
<div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Import Product</h2>
                        <form action="/admin/products" method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                {!! csrf_field() !!}
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Product name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="price" id="price" placeholder="Product price"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="description" id="description" placeholder="Product description"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit"  value="Import Now"/>
                            </div>
                            <div class="hiddenfile">
                                <input name="thumbnail" type="file" id="fileinput" onchange="pick_image_insert(this)"/>
                            </div>
                        </form>
                    </div>
                    <div class="image-container signup-image">
                        <img src="/admin/images/signup-image.jpg" alt="" id="product-thumbnail" class="image" style="width:100%; height:100%">
                        <div class="middle" id="changeImageButton">
                            <a href="#">
                                <input class="btn btn-primary" type="button" value="Upload New">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
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
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Product name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="price" id="price" placeholder="Product price"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="description" id="description" placeholder="Product description"/>
                            </div>
                            {{-- <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> --}}
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit"  value="Import Now"/>
                            </div>
                        </form>
                    </div>
                    <div class="hiddenfile">
                        <input name="thumbnail" type="file" id="fileinput" onchange="pick_image_insert(this)"/>
                    </div>
                    <div class="image-container signup-image">
                        <img src="/admin/images/signup-image.jpg" alt="" id="product-thumbnail" class="image" style="width:100%; height:100%">
                        <div class="middle" id="changeImageButton">
                            <a href="#">
                                <input class="btn btn-primary" type="button" value="Upload New">
                            </a>
                        </div>
                    </div>
                    {{-- <div class="signup-image">
                        <figure><img src="/admin/images/signup-image.jpg" alt="sing up image"></figure>
                        
                    </div> --}}
                </div>
            </div>
        </section>
    </div>
@endsection
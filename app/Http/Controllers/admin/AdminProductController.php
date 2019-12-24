<?php

namespace App\Http\Controllers\admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\utility\FileUploadController;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return view("admin.product", compact("products"));
    }

    public function create()
    {
        return view("admin.insert");
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "price"=>"numeric|required",
            "description"=>"required",
            "thumbnail" => "required"
        ]);
        $thumbnail = FileUploadController::uploadSingleFile($request->file("thumbnail"));;
        $product = new Product();
        $product->fill($request->all());
        $product->thumbnail = str_replace("public/", "", $thumbnail);
        $product->save();
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

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
        dd($request);
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

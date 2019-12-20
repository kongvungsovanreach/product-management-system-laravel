<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ApiAdminProductController extends BaseAdminApiController
{
    public function index(Request $request)
    {
        $products = Product::paginate(15);
        if ($request->ajax()) {
            $table = view('admin.ajax-table', compact('products'))->render();
            return $this->sendFetchSuccess(true, $table, "Products were fetch successfully!");
        }        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $file = $request->file("thumbnail");
        if($file==""){
            Product::find($id)->update($request->except("thumbnail"));
            return $this->sendUpdateSuccess(true, Product::find($id), "Product update successfully!" );
        }else {
            $dbUser = Product::find($id);
            $dbUser->fill($request->except("thumbnail"));
            $profile = FileUploadController::uploadSingleFile($file);
            $dbUser-> thumbnail = str_replace("public/", "", $profile);;
            $dbUser->save();
            return $this->sendUpdateSuccess(true, Product::find($id), "Product update successfully!");
        }
        
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return $this->sendDeleteSuccess(true, "Product is deleted successfully!!!");
    }
}

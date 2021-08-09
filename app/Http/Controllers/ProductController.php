<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    public function showProduct(){
        $product = Product::all();
        return response()->json($product);
    }

    //
    public function createProduct(Request $request){
        $variabel = Validator::make($request->all(), [
            'name'  => 'required',
            'price' => 'required|numeric',
            'desc'  => 'required|max:100'
        ]);

        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'desc'  => $request->desc
        ]);
        
        return response()->json([
            'messages'  => 'Success Insert Data'
        ], 200);
    }

    public function deleteProduct($id)
    {
        Product::destroy($id);
        return response()->json([
            'message'   => 'Success Delete Data'
        ]);
    }

    public function getAllData()
    {
        $product = Product::all();
        return response()->json([
            'product'   => $product
        ]);
    }

    public function getData($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function searchData(Request $request)
    {
        $product = Product::where('name', 'LIKE', '%'.$request->product_name.'%')->get();
        return response()->json([
            'messageSuccess'  => 'Data ditemukan',
            'productSearch'   => $product
        ]);
    }

    public function updateData(Request $request, $id){
        Product::findOrFail($id)->update([
            'name'  => $request->name,
            'price' => $request->price,
            'desc'  => $request->desc
        ]);

        return response()->json([
            'message'   => 'Success Update Data'
        ]);
    }
}

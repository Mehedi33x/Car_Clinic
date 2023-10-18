<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Else_;

class ProductController extends Controller
{
    //all-products
    public function allProducts()
    {
        $allProducts = Product::all();
        // dd($allProducts);
        if ($allProducts) {
            return $this->responseWithSuccess($allProducts, "all-products");
        } else {
            return $this->responseWithError('No Product Found');
        }
    }

    //single-product
    public function product($id)
    {
        $product = Product::find($id);
        // dd($product);
        if ($product) {
            return $this->responseWithSuccess($product, "Product Found");
        } else {
            return $this->responseWithError("No Product Found");
        }
    }

    public function createProduct(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => $validate->getMessageBag(),
                'success_code' => 200
            ]);
        }
        $product_image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $product_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/product', $product_image);
        }

        $product = Product::create([
            'product_code' => Str::random(10),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'status' => 'active',
            'image' => $product_image,
        ]);
        if ($product) {
            return $this->responseWithSuccess($product, 'Product Added Successfully');
        } else {
            return $this->responseWithError('Product Create Failed!!');
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return $this->responseWithSuccess($product, "Product Deleted Successfully");
        } else {
            return $this->responseWithError('No data found');
        }
    }
}

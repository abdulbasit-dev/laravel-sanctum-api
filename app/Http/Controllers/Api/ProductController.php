<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdcutRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function index()
  {
    $products = Product::orderBy("created_at", "desc")->get();
    return [
      "total" => count($products),
      "data" => $products
    ];
  }

  public function store(StoreProdcutRequest $request)
  {
    $product = Product::create($request->validated());
    return [
      "messsage" => "product succesfully added",
      "data" => $product
    ];
  }

  public function show(Product $product)
  {
    return $product;
  }

  public function update(Request $request, Product $product)
  {
    $product->update($request->all());
    return [
      "messsage" => "product succesfully updated",
      "data" => $product
    ];
  }

  public function destroy(Product $product)
  {
    $product->delete();
    return [
      "messsage" => "product succesfully deleted",
      "data" => $product
    ];
  }


  public function search($name)
  {
    $product = Product::where('name', 'like', '%' . $name . '%')->get();
    return $product;
  }
}

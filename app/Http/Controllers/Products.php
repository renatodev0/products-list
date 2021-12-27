<?php

namespace App\Http\Controllers;

use App\Models\Products as ModelsProducts;
use App\Models\ProductTags;
use App\Models\Tag;
use Illuminate\Http\Request;

class Products extends Controller
{
    //

    public function index () {
        try {
            $products = ModelsProducts::all();
            foreach($products as $product){
                $new_tags = [];
                foreach($product->tags as $tag) {
                    $tag_obj = Tag::find($tag->tag_id);
                    array_push($new_tags, $tag_obj);
                }
                $product->tags = $new_tags;
            }
            return view('products.index', compact('products'));
        } catch (\Throwable $th) {
            echo $th;
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function create () {
        try {
            $tags = Tag::all();
            
            return view('products.create', compact('tags'));
        } catch (\Throwable $th) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function save (Request $request) {
        try {
            $product = ModelsProducts::create([
                'name' => $request->name
            ]); 

            if($request->tags){
                for($i = 0, $length = count($request->tags, 0); $i < $length; $i++) {
                    ProductTags::create([
                        'product_id' => $product->id,
                        'tag_id' => $request->tags[$i]
                    ]);
                }
            }
            
            return redirect()->action([Products::class, 'index']);
        } catch (\Throwable $th) {

            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function edit ($id) {
        try {
            $product = ModelsProducts::find($id);

            $new_tags = [];

            foreach($product->tags as $tag) {
                $tag_obj = Tag::find($tag->tag_id);
                array_push($new_tags, $tag_obj);
            }
            
            $product->tags = $new_tags;

            $tags = Tag::all();
            
            return view('products.edit', compact('product', 'tags'));
        } catch (\Throwable $th) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function update (Request $request) {
        try{           
            ModelsProducts::find($request->id)->update([
                "name"=> $request->name
            ]);

            ProductTags::where('product_id', $request->id)->delete();

            if($request->tags){
                for($i = 0, $length = count($request->tags, 0); $i < $length; $i++) {
                    ProductTags::create([
                        'product_id' => $request->id,
                        'tag_id' => $request->tags[$i]
                    ]);
                }
            }

            return redirect()->action([Products::class, 'index']);
        }catch(\Throwable $th){
            echo $th;
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function delete ($id) {
        try{
            ModelsProducts::find($id)->delete();

            return redirect()->action([Products::class, 'index']);
        }catch(\Throwable $th){
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }
}

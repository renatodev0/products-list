<?php

namespace App\Http\Controllers;

use App\Models\ProductTags;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tags extends Controller
{
    //
    public function index () {
        try {
            $tags = Tag::all();

            return view('tags.index', compact('tags'));
        } catch (\Throwable $th) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function create () {
        try {            
            return view('tags.create');
        } catch (\Throwable $th) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function save (Request $request) {
        try {            
            Tag::create([
                'name' => $request->name
            ]); 
            
            return redirect()->action([Tags::class, 'index']);
        } catch (\Throwable $th) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function edit ($id) {
        try {
            $tag = Tag::find($id);
            
            return view('tags.edit', compact('tag'));
        } catch (\Throwable $th) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function update (Request $request) {
        try{
            Tag::find($request->id)->update([
                "name"=> $request->name
            ]);

            return redirect()->action([Tags::class, 'index']);
        }catch(\Throwable $th){
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function delete ($id) {
        try{
            Tag::find($id)->delete();

            return redirect()->action([Tags::class, 'index']);
        }catch(\Throwable $th){
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function report () {
        try {
            $tags = DB::table('product_tags')
                    ->join('tags', 'product_tags.tag_id', '=', 'tags.id')
                    ->select(DB::raw('product_tags.tag_id as tag, tags.name as nome, count(product_tags.product_id) as total'))
                    ->groupBy('product_tags.tag_id')
                    ->orderByDesc('total')
                    ->get();
            
            return view('reports.index', compact('tags'));
        } catch (\Throwable $th) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }
    
}

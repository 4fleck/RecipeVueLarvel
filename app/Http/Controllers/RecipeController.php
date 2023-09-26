<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipe = Recipe::all()->toArray();
        return array_reverse($recipe);
    }
    
    public function add(Request $request)
    {
        $recipe = new Recipe([
          'name' => $request->name,
          'author' => $request->author,
          'discrption' => $request->discrption
        ]);
        $recipe->save();

        return response()->json('The recipe succefully added');
    }
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        return response()->json($recipe);
    }
    public function update($id,Request $request)
    {
        $recipe = Recipe::find($id);
        $recipe->update($request->all());

        return response()->json('The recipe successfully updated');
    }
    public function delete($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        return response()->json('The recipe succefully deleted');
    }
}


   
    

    

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function store(Request $req) {
        return $recipe = Recipe::create($req->all());
    }

    public function index() {
        $recipes = Recipe::all();
        foreach ($recipes as $recipe) {
            $recipe->user;
            $recipe->ratings;
            $recipe->comments;
        }
        return $recipes;
    }

    public function indexByUser($user_id) {
        $recipes = Recipe::where('user_id', '=', $user_id)->get();
        foreach ($recipes as $recipe) {
            $recipe->user;
            $recipe->ratings;
        }
        return $recipes;
    }

    public function get($id) {
        $recipe = Recipe::findOrFail($id);
        $recipe->user;
        $recipe->comments;
        foreach ($recipe->comments as $comment){
            $comment->user;
        }
        $recipe->ratings;
        foreach ($recipe->ratings as $rating){
            $rating->user;
        }

        return $recipe;
    }

    public function update(Request $req) {
        $recipe = Recipe::findOrFail($req->id);
        $recipe->name = $req->name;
        $recipe->description = $req->description;
        $recipe->ingredients = $req->ingredients;
        $recipe->steps = $req->steps;
        $recipe->image = $req->image;
        $recipe->save();
        return $recipe;
    }

    public function destroy($id) {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return 204;
    }
}

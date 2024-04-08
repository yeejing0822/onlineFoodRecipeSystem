<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $req) {
        return $rating = Rating::create($req->all());
    }
}

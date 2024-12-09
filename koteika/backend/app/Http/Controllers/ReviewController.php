<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    public function randomCountReviews()
    {
        $reviewsCount = Review::count();
        if(5 > $reviewsCount){
            return response()->json(['message' => 'Недостаточное кол-во существующих отзывов'], 400);
        }
        $reviews = Review::inRandomOrder()->limit(5)->get();

        return response()->json($reviews, 200);
    }
}

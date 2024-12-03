<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function randomCountReviews(){
        $reviewsCount = Review::count();

        if(5 > $reviewsCount){
            return response()->json(['message' => 'Недостаточное кол-во существующих отзывов'], 400, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        }

        $reviews = Review::inRandomOrder()->limit(5)->get();

        return response()->json($reviews, 200, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}

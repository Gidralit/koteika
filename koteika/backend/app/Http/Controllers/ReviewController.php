<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Reservation;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use App\Models\Room;
use App\Services\ReviewService;
use Exception;
use Illuminate\Http\JsonResponse;



class ReviewController extends Controller
{

    protected $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }


    public function randomCountReviews()
    {
        $reviewsCount = Review::count();
        if ($reviewsCount < 5) {
            return response()->json(['message' => 'Недостаточное кол-во существующих отзывов'], 400);
        }

        $reviews = Review::with('user')->inRandomOrder()->limit(5)->get();

        return ReviewResource::collection($reviews);
    }

    public function store(ReviewRequest $request): JsonResponse
    {
        try {
            $review = $this->reviewService->createReview($request->validated());

            return response()->json([
                'message' => 'Отзыв успешно создан',
                'review' => new ReviewResource($review)
            ], 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

}

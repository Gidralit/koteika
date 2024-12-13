<?php
namespace App\Services;

use App\Models\Review;
use App\Models\Reservation;
use Exception;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    public function createReview(array $data)
    {
        $reservation = Reservation::findOrFail($data['reservation_id']);

        if ($reservation->status !== 'approved') {
            throw new Exception('Бронирование не одобрено');
        }

        if ($reservation->user_id !== Auth::id()) {
            throw new Exception('Вы не можете оставить отзыв на эту бронь');
        }

        if (Review::where('user_id', Auth::id())
            ->where('reservation_id', $data['reservation_id'])
            ->exists()) {
            throw new Exception('Вы уже оставили отзыв на это бронирование');
        }

        return Review::create([
            'user_id' => Auth::id(),
            'reservation_id' => $data['reservation_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'rating' => $data['rating'],
        ]);
    }
}

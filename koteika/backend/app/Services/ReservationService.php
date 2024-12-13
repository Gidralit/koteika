<?php

namespace AppServices;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Exception;

class ReservationService
{
    public function checkRoomAvailability(Room $room, $checkInDate, $checkOutDate)
    {
        return Reservation::where('room_id', $room->id)
            ->where('status', 'approved')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('check_in_date', '<=', $checkInDate)
                            ->where('check_out_date', '>=', $checkOutDate);
                    });
            })
            ->exists();
    }

    public function createReservation(array $data, Room $room)
    {
        return Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'price' => $data['price'],
            'pets_names' => $data['pets_names'],
            'check_in_date' => $data['check_in_date'],
            'check_out_date' => $data['check_out_date'],
            'pets_count' => $data['pets_count'] ?? 0,
            'status' => 'pending',
        ]);
    }

    public function cancelReservation($reservationId)
    {
        $reservation = Reservation::find($reservationId);

        if (!$reservation) {
            return null;
        }

        if ($reservation->user_id !== Auth::id()) {
            throw new Exception('Unauthorized action');
        }

        $reservation->delete();
        return $reservation;
    }

    public function getUserReservations($userId)
    {
        return Reservation::where('user_id', $userId)->with('room')->get();
    }

    public function getAllReservations($request)
    {
        $query = Reservation::query();

        if ($request->has('room_id')) {
            $query->where('room_id', $request->input('room_id'));
        }

        return $query->with('room', 'user')->get();
    }
}

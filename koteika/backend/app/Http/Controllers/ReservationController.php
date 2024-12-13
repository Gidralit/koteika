<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Illuminate\Support\Facades\Gate;
use function Pest\Laravel\json;


class ReservationController extends Controller
{
    public function reservationRoom(ReservationRequest $request, Room $room)
    {
        if (!$room) {
            return response()->json(['message' => 'Комната не найдена'], 404);
        }


        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');

        $oldReservations = Reservation::query()
            ->where('room_id', '=', $room->id)
            ->where('status', '=', 'approved')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('check_in_date', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('check_out_date', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('check_in_date', '<=', $checkInDate)
                            ->where('check_out_date', '>=', $checkOutDate);
                    });
            })
            ->get();

        if ($oldReservations->isNotEmpty()) {
            return response()->json(['message' => 'Бронь на это время уже существует'], 409);
        }
        Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'price' => $room->price,
            'pets_names' => $request->pets_names,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'pets_count' => $request->pets_count ?? 0,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Заявка на бронь успешно подана'], 201);
    }

    public function cancelReservation($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        if (!$reservation) {
            return response()->json(['message' => 'Бронирование не найдено'], 404);
        }
        if ($reservation->user_id !== Auth::id()) {
            return response()->json(['message' => 'У вас нет прав на отмену этого бронирования'], 403);
        }
        $reservation->delete();
        return response()->json(['message' => 'Бронирование успешно отменено'], 200);
    }


    public function userReservations()
    {
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
        $reservations = Reservation::where('user_id', Auth::id())
            ->with('room')
            ->get();

        return response()->json($reservations, 200, [], JSON_UNESCAPED_UNICODE);

    }

    public function index(Request $request)
    {
        Gate::authorize('admin', Reservation::class);
        $query = Reservation::query();

        if ($request->has('room_id')) {
            $query->where('room_id', $request->input('room_id'));
        }

        // Получаем все заявки на бронь
        $reservations = $query->with('room', 'user')->get();

        return response()->json($reservations, 200);
    }

    public function approveReservation($reservationId)
    {
        Gate::authorize('admin', Reservation::class);
        $reservation = Reservation::find($reservationId);
        if (!$reservation) {
            return response()->json(['message' => 'Бронирование не найдено'], 404);
        }

        $reservation->status = 'approved';
        $reservation->save();
        return response()->json(['message' => 'Бронирование успешно одобрено'], 200);
    }

    public function adminDeleteReservation($reservationId)
    {
        Gate::authorize('admin', Reservation::class);
        $reservation = Reservation::find($reservationId);
        if (!$reservation) {
            return response()->json(['message' => 'Бронирование не найдено'], 404);
        }

        $reservation->delete();
        return response()->json(['message' => 'Заявка на бронь успешно удалена'], 200);
    }
}

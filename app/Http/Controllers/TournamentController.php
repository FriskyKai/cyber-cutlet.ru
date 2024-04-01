<?php

namespace App\Http\Controllers;

use App\Http\Resources\TournamentListResource;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function tournamentsList(Request $request)
    {
        // Получение параметра disciplineId из запроса
        $disciplineId = $request->input('discipline_id');

        // Подготовка запроса для получения турниров
        $query = Tournament::query();

        // Если передан параметр disciplineId, добавляем условие для фильтрации по дисциплине
        if ($disciplineId) {
            $query->where('discipline_id', $disciplineId);
        }

        // Получаем список турниров
        $tournaments = $query->get();

        // Формируем ответ
        return response()->json(['data' => ['tournaments' => TournamentListResource::collection($tournaments)]]);
    }
}

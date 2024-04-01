<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function create(Request $request) {
        $user = Discipline::create($request->all());
        $user->save();

        return response()->json([
            'message' => 'Дисциплина добавлена',
        ])->setStatusCode(201);
    }

}

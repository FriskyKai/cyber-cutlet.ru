<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageStoreRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorageController extends Controller
{
    // Добавление нового логотипа
    public function addTeamLogo(ImageStoreRequest $request) {
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $filename = time() . '_' . $uploadedFile->getClientOriginalName();
            $path = $uploadedFile->storeAs('uploads/logos', $filename);

            $uploadedFiles = [
                'imageUrl' => url("storage/{$path}"),
            ];

            return response()->json($uploadedFiles);
        }

        return response()->json(['message' => 'No image uploaded'], 400);
    }

    // Добавление нового аватара пользователя
    public function addPlayerPhoto(ImageStoreRequest $request) {
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $filename = time() . '_' . $uploadedFile->getClientOriginalName();
            $path = $uploadedFile->storeAs('uploads/photos', $filename);

            $uploadedFiles = [
                'imageUrl' => url("storage/{$path}"),
            ];

            return response()->json($uploadedFiles);
        }

        return response()->json(['message' => 'No image uploaded'], 400);
    }
}

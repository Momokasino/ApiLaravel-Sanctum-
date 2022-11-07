<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Image;

class ImageController extends Controller
{
    public function imageStore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_path = $request->file('image');
        $imageName = $image_path->getClientOriginalName();

        $image_path = $request->file('image')->storeAs('image', $imageName, 'public');

        $data = Image::create([
            'image' => $image_path,
        ]);

        return response($data, Response::HTTP_CREATED);
    }
}

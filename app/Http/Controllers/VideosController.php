<?php

namespace App\Http\Controllers;

use App\Models\{Video, Comment};
use Illuminate\Http\Request;
use Inertia\Inertia;

class VideosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return Inertia::render('Video', [
            'video' => Video::find($id),
            'comments' => Comment::all(),
            'recommededVideos' => Video::inRandomOrder()->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}

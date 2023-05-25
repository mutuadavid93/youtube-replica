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
    public function destroy(int $id)
    {
        $video = Video::find($id);

        // Remove the file from local folder too.
        // Since the file from DB already match public file path.
        if (file_exists(public_path() . $video->video)) {
            unlink(public_path() . $video->video);
        }

        if (file_exists(public_path() . $video->thumbnail)) {
            unlink(public_path() . $video->thumbnail);
        }

        $video->delete();

        // Redirect back to see all remaining videos list
        return redirect()->route('deleteVideo');
    }
}

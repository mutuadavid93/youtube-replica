<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\{Video, Comment};

class VideosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_file = null;
        $video_file = null;

        $video = new Video();

        $image_file = $request->file('image');
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $video_file = $request->file('video');
        $request->validate(['video' => 'required|mimes:mp4']);

        $thumbPath = '/videos/Thumbnails/';
        $vidPath = '/videos/';

        $time = time();
        $extension = $image_file->getClientOriginalExtension();
        $imageName = $time . '.' . $extension;

        $extension = $video_file->getClientOriginalExtension();
        $videoName = $time . '.' . $extension;

        // Save to Database
        $video->title = $request->input("title");
        $video->video = $vidPath . $videoName;
        $video->thumbnail = $thumbPath . $imageName;
        $video->user = "John Weeks Dev";
        $video->views = rand(10, 100) . 'k views - ' . rand(1, 6) . ' days ago';

        // Finally move the files
        $image_file->move(public_path() . $thumbPath, $imageName);
        $video_file->move(public_path() . $vidPath, $videoName);

        if ($video->save()) {
            // Redirect back to show the video just created
            return redirect()->route('videos.show', $video['id']);
        }
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * index
     * 
     * @return void
     * 
     */
    public function index()
    {
        $videos = Video::latest()->paginate(4);
        return response()->json([
            "response" => [
            "status" => 200,
            "message" => "List Data Video"
            ], "data" => $videos
        ], 200);
    }

    /**
     * videoHomepage
     * 
     * @return void
     */
    public function VideoHomepage ()
    {
        $videos = Video::latest()->take(2)->get();
        return response()-json([
            "response" => [
                "status" => 200,
                "message" => "liat Data video Homepage"
            ], "data" => $videos
        ], 200);
    }
}

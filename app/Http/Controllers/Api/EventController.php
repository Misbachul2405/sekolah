<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * index
     * 
     * @return void
     * 
     */
    public function index()
    {
        $events = Event::latest()->paginate(4);
        return response()->json([
            "response" => [
            "status" => 200,
            "message" => "List Data Agenda"
        ], "data" => $events ], 200);
    }

    /**
     * show
     * 
     * @param  mixed $slug
     * @return void
     * 
     */
    public function show ($slug)
    {
        $event = Event::where('slug', $slug)->first();

        if($event) {
            return response()->json ([
                "response" => [
                    "status" => 200,
                    "message" => "Detail Data Agenda"
                ], "data" => $event
            ], 200);
        }else{
            return response()->json([
                "response" =>[
                    "status" =>404,
                    "message" => "Data Agenda Tidak Ditemukan"
                ], "data" => null
            ], 404);
        }
    }

    /**
     * EventHomePage
     * 
     * @return void
     */
    public function EventHomePage ()
    {
        $events = Event::lates()->take(5)->get();
        return response()->json([
            "response"=> [
                "status" => 200,
                "message" => "list Data Agenda Homepage"
            ], "data" => $events
        ], 200);
    }
}

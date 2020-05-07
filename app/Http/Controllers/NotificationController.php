<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notifications = Notification::all();
        return NotificationResource::collection($notifications);
    }
}

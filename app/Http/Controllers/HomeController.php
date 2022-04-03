<?php

namespace App\Http\Controllers;

use App\Custom\Fcm\Fcm;
use App\Models\Portfolio;
use App\Models\Visitor;

class HomeController extends Controller
{
    public function home()
    {
        //save visitor count
        $visitor = new Visitor;
        $visitor->ip = $_SERVER['REMOTE_ADDR'];
        $visitor->save();

        //send notif
        Fcm::send();

        $Portfolio = Portfolio::all();

        return view('home', ['data' => $Portfolio]);
    }
}

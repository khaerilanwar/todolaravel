<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "tasks" => Task::all()
        ];

        return view('home', $data);
    }
}

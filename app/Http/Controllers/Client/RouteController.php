<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class RouteController extends Controller
    {
        public function index()
        {
            dd('candidate');
            return view('candidate.index');
        }
    }

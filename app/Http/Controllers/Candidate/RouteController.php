<?php

    namespace App\Http\Controllers\Candidate;

    use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    class RouteController extends Controller
    {
        public function index()
        {
            $user = Auth::user()->load('candidate');
            $documents = $user->candidate->documents ?? [];
            $countries = Country::all();

            return view('candidate.index', compact('user', 'documents', 'countries'));
        }
    }

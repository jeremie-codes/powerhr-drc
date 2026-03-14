<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobOffer;

class RouteController extends Controller
{
    public function index()
    {
        $partenaires = Company::where('logo', '!=', null)->get();
        $offers = JobOffer::where('is_active', true)->limit(9)->get();

        return view('index', compact('partenaires', 'offers'));
    }

}

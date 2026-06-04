<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobOffer;

class RouteController extends Controller
{
    public function index()
    {
        $partenaires = Company::where('logo', '!=', null)->get();
        $jobs = JobOffer::with('category')->where('is_active', true)->limit(9)->get();

        return view('index', compact('partenaires', 'jobs'));
    }

    public function jobs()
    {
        $jobs = JobOffer::with('category')->where('is_active', true)->paginate(10);

        return view('jobs', compact('jobs'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

}

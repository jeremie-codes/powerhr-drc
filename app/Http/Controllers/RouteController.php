<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use App\Models\JobCategory;
use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $partenaires = Company::where('logo', '!=', null)->get();
        $jobs = JobOffer::with('category')->where('is_active', true)->limit(9)->get();

        return view('index', compact('partenaires', 'jobs'));
    }

    public function jobs(Request $request)
    {
        $perPage = $request->integer('per_page', 50);
        $countries = Country::orderBy('name')->get();
        $jobs = JobOffer::with('category')

            ->visible()
            ->filter($request->only([
                'search',
                'category',
                'contract_type',
                'location',
                'experience'
            ]))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        $categories = JobCategory::orderBy('name')->get();

        return view('jobs', compact(
            'jobs',
            'categories',
            'countries'
        ));
    }

    public function about()
    {
        $teams = User::where('role', 'admin')->get();

        //dd($teams);
        return view('about', compact('teams'));
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

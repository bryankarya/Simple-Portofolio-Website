<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\certification;
use App\Models\Experience;

class PortofolioController extends Controller
{
    public function index()
    {
        $about = About::first();
        $certifications = Certification::all();
        $experiences = Experience::all();

        return view('index', compact('about', 'certifications', 'experiences'));
    }
}

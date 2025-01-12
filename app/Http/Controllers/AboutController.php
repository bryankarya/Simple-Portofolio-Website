<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\About;
class AboutController extends Controller
{
private $view_directory = 'pages.admin.about.'; // Adjust the view directory for the about page

public function index()
{
    $about = About::first(); // Get the first record from the about table

    return view($this->view_directory . 'index', [
        'page_title' => 'About Management',
        'page' => 'about-management',
        'about' => $about,
    ]);
}

public function edit()
{
    $about = About::first(); // Get the first record from the about table

    return view($this->view_directory . 'edit', [
        'page_title' => 'Edit About',
        'page' => 'about-management',
        'about' => $about,
        'javascript_file' => 'admin/about/about-edit.js',
    ]);
}

public function update(Request $request)
{
    // Validate input fields
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'bio' => 'required',
        'linkedin' => 'nullable|url',
        'github' => 'nullable|url',
    ]);

    try {
        // Find the first About record
        $about = About::first();

        // Prepare social links as an array (Laravel will handle JSON encoding automatically)
        $socialLinks = [
            'linkedin' => $validatedData['linkedin'] ?? null,
            'github' => $validatedData['github'] ?? null,
        ];

        // Update the About data
        $about->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'bio' => $validatedData['bio'],
            'social_links' => $socialLinks,  // Just store the array, Laravel will handle the JSON conversion
        ]);

        // Return a JSON response indicating success
        return response()->json([
            'status' => 'success',
            'message' => 'About section updated successfully!',
        ]);
    } catch (\Exception $e) {
        // Return a JSON response indicating an error
        return response()->json([
            'status' => 'error',
            'message' => 'Error updating About section: ' . $e->getMessage(),
        ]);
    }
}


}
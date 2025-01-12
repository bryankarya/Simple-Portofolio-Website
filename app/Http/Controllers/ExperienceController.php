<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExperienceController extends Controller
{
    private $view_directory = 'pages.admin.experiences.';  // Directory for views

    // Display all experiences
    public function index()
    {
        return view($this->view_directory . 'index', [
            'page_title' => 'Experience Management',
            'page' => 'experience-management',
            'data' => Experience::all(),  // Fetch all experiences
        ]);
    }

    // Display the form to create a new experience
    public function create()
    {
        return view($this->view_directory . 'create', [
            'page_title' => 'Create Experience',
            'page' => 'experience-management',
            'javascript_file' => 'admin/experience/experience-create.js',  // Optional JS file for create form
        ]);
    }

    // Store a new experience in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required',
            'company_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $data = [
                'role' => $request->role,
                'company_name' => $request->company_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
            ];

            // Create new experience
            if (Experience::create($data)) {
                DB::commit();

                return response()->json([
                    'status' => 201,
                    'message' => 'Experience created successfully',
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Failed to create experience',
                    'data' => $data,
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'statusCode' => 422,
                'message' => 'Failed to save data. Error:' . $e->getMessage()
            ], 422);
        }
    }

    // Display the form to edit an experience
    public function edit($id)
    {
        return view($this->view_directory . 'edit', [
            'page_title' => 'Edit Experience',
            'page' => 'experience-management',
            'detail' => Experience::find($id),  // Fetch specific experience
            'javascript_file' => 'admin/experience/experience-edit.js',  // Optional JS file for edit form
        ]);
    }

    // Update an existing experience
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role' => 'required',
            'company_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $data = Experience::find($id);
            if (!$data) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Experience not found',
                ]);
            }

            $data->role = $request->role;
            $data->company_name = $request->company_name;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->description = $request->description;

            if ($data->save()) {
                DB::commit();
                return response()->json([
                    'status' => 201,
                    'message' => 'Experience updated successfully',
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Failed to update experience',
                    'data' => $data,
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'statusCode' => 422,
                'message' => 'Failed to save data. Error:' . $e->getMessage()
            ]);
        }
    }

    // Delete an experience
    public function delete($id)
    {
        $data = Experience::find($id);


        if ($data) {
            $data->delete();
            Session::flash('message', 'Experience successfully deleted');
            return redirect()->back();
        }
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Certification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CertificationController extends Controller
{
    private $view_directory = 'pages.admin.certifications.';  // Directory for views

    // Display all certifications
    public function index(){
        return view($this->view_directory.'index', 
            [
                'page_title' => 'Certification Management',
                'page' => 'certification-management', 
                'data' => Certification::all(),  // Fetch all certifications
            ]);
    }

    // Display the form to create a new certification
    public function create(){
        return view($this->view_directory.'create', 
            [
                'page_title' => 'Create Certification',
                'page' => 'certification-management', 
                'javascript_file' => 'admin/certification/certification-create.js',  // Optional JS file for create form
            ]);
    }

    // Store a new certification in the database
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'issuer' => 'required',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $data = [
                'title' => $request->title,
                'issuer' => $request->issuer,
                'issue_date' => $request->issue_date,
                'expiry_date' => $request->expiry_date,
                'description' => $request->description,
            ];

            // Create new certification
            if (Certification::create($data)) {
                DB::commit();

                return response()->json([
                    'status' => 201,
                    'message' => 'Certification created successfully',
                    'data' => $data,
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Failed to create certification',
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

    // Display the form to edit a certification
    public function edit($id){
        return view($this->view_directory.'edit',
            [
                'page_title' => 'Edit Certification',
                'page' => 'certification-management', 
                'detail' => Certification::find($id),  // Fetch specific certification
                'javascript_file' => 'admin/certification/certification-edit.js',  // Optional JS file for edit form
            ]);
    }

    // Update an existing certification
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required',
            'issuer' => 'required',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $data = Certification::find($id);
            if ($data) {
                $data->title = $request->title;
                $data->issuer = $request->issuer;
                $data->issue_date = $request->issue_date;
                $data->expiry_date = $request->expiry_date;
                $data->description = $request->description;

                // Save the updated certification
                if ($data->save()) {
                    DB::commit();

                    return response()->json([
                        'status' => 201,
                        'message' => 'Certification updated successfully',
                        'data' => $data,
                    ]);
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Failed to update certification',
                        'data' => $data,
                    ]);
                }
            }

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 422,
                'message' => 'Failed to save data. Error:' . $e->getMessage()
            ]);
        }
    }

    // Delete a certification
    public function delete($id){
        $data = Certification::find($id);

        if ($data) {
            $data->delete();
            Session::flash('message', 'Certification successfully deleted');
            return redirect()->back();
        }
    }
}

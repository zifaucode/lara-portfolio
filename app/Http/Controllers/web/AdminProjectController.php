<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::with(['users', 'status'])->get();
        return view('admin.project.index', [
            'project' => $project,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'image' => 'file|max:512|mimes:jpg,bmp,png',
        ]);

        $user = Auth::user();
        $date = date(' Y-m-d ');
        try {
            $project = new Project;
            $project->date = $date;
            $project->user_id = $user->id;
            $project->status_id = $request->status_id;
            $project->category_id = $request->category_id;
            $project->name = $request->name;
            $project->deskripsi = $request->deskripsi;
            $project->req_time = $request->req_time;
            $project->budged = $request->budged;
            $project->message = $request->message;
            $project->phone = $request->phone;
            $project->image = $request->file('image');
            $nama_foto =  $project->name . "_" . $request->image_name;
            $project->image->move('files/project', $nama_foto);
            $project->image = $nama_foto;
            $project->save();
            return response()->json([
                'message' => 'OK',
                'data' => $project,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function detail($id)
    {
        $project = Project::with(['users', 'status'])->findOrFail($id);
        return view('admin.project.detail', [
            'project' => $project,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updates = Project::findOrFail($id);
        $updates->status_id = $request->status_id;
        $updates->message = $request->message;
        try {
            $updates->save();
            return response()->json([
                'message' => 'OK',
                'code' => '200',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);;
        try {
            $project->delete();
            return [
                'message' => 'Blog has been deleted',
                'error' => false,
                'code' => 200,
            ];
        } catch (Exception $e) {
            return [
                'message' => 'internal error',
                'error' => true,
                'code' => 500,
                'errors' => $e,
            ];
        }
    }
}

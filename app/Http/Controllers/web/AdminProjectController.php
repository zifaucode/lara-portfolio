<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $project = Project::all();
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
        DB::beginTransaction();
        $validated = $request->validate([
            'image' => 'file|max:2048|mimes:jpg,bmp,png',
        ]);
        try {
            $project = new Project;
            $project->name = $request->name;
            $project->deskripsi = $request->deskripsi;
            $project->link = $request->link;

            if ($request->hasFile('image')) {
                $project->image = $request->file('image');
                $nama_foto =  $project->name . "_" . time() . '.' . $request->image->extension();
                $project->image->move('files/project', $nama_foto);
                $project->image = $nama_foto;
            }

            $project->save();
            DB::commit();
            return response()->json([
                'message' => 'Save data successfully ',
                'data' => $project,
                'code' => '200',
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'line' => $e->getLine(),
                'errors' => $e->getMessage(),
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
        $project = Project::findOrFail($id);
        // return $project;
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
        $project = Project::findOrFail($id);
        // return $project;
        return view('admin.project.edit', [
            'project' => $project,
        ]);
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
        DB::beginTransaction();
        try {
            $projectUpdate = Project::findOrFail($id);
            $projectUpdate->name = $request->name;
            $projectUpdate->deskripsi = $request->deskripsi;
            $projectUpdate->link = $request->link;

            if ($request->hasFile('image')) {
                $projectUpdate->image = $request->file('image');
                $nama_foto =  $projectUpdate->name . "_" . time() . '.' . $request->image->extension();
                $projectUpdate->image->move('files/project', $nama_foto);
                $projectUpdate->image = $nama_foto;
            }

            $projectUpdate->save();
            DB::commit();
            return response()->json([
                'message' => 'Update Data successfully ',
                'data' => $projectUpdate,
                'code' => '200',
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'line' => $e->getLine(),
                'errors' => $e->getMessage(),
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

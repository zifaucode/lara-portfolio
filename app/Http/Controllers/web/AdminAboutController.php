<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        // return $about;
        return view('admin.about.index', [
            'about' => $about
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try {
            $getData = About::first();
            if (isset($getData)) {
                $updateAbout = About::find($getData->id);
                $updateAbout->name = $request->name;
                $updateAbout->email = $request->email;
                $updateAbout->role = $request->role;
                $updateAbout->description = $request->description;
                $updateAbout->hobby = $request->hobby;
                $updateAbout->github = $request->github;
                $updateAbout->gitlab = $request->gitlab;
                $updateAbout->instagram = $request->instagram;
                $updateAbout->facebook = $request->facebook;
                $updateAbout->twitter = $request->twitter;
                $updateAbout->last_education = $request->last_education;
                $updateAbout->skill = $request->skill;
                $updateAbout->work_experience = $request->work_experience;

                if ($request->hasFile('image')) {
                    $updateAbout->image = $request->file('image');
                    $nama_foto =  $updateAbout->name . "_" . $request->image_name;
                    $updateAbout->image->move('files/about', $nama_foto);
                    $updateAbout->image = $nama_foto;
                }

                $updateAbout->save();
                DB::commit();
                return response()->json([
                    'message' => 'Save data successfully ',
                    'data' => $updateAbout,
                    'code' => '200',
                ]);
            } else {
                $newAbout = new About();
                $newAbout->name = $request->name;
                $newAbout->email = $request->email;
                $newAbout->role = $request->role;
                $newAbout->description = $request->description;
                $newAbout->hobby = $request->hobby;
                $newAbout->github = $request->github;
                $newAbout->gitlab = $request->gitlab;
                $newAbout->instagram = $request->instagram;
                $newAbout->facebook = $request->facebook;
                $newAbout->twitter = $request->twitter;
                $newAbout->last_education = $request->last_education;
                $newAbout->skill = $request->skill;
                $newAbout->work_experience = $request->work_experience;

                if ($request->hasFile('image')) {
                    $newAbout->image = $request->file('image');
                    $nama_foto =  $newAbout->name . "_" . $request->image_name;
                    $newAbout->image->move('files/about', $nama_foto);
                    $newAbout->image = $nama_foto;
                }
                $newAbout->save();
                DB::commit();
                return response()->json([
                    'message' => 'Save data successfully ',
                    'data' => $newAbout,
                    'code' => '200',
                ]);
            }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', [
            'about' => $about
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

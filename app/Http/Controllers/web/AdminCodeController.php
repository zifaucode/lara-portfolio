<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\SourceCode;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class AdminCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = SourceCode::all();
        return view('admin.code.index', [
            'code' => $code,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.code.create');
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
            'image' => 'file|max:1024|mimes:jpg,bmp,png',
        ]);

        $user = Auth::user();
        $date = date(' Y-m-d ');
        DB::beginTransaction();
        try {
            $code = new SourceCode;
            $code->date = $date;
            $code->name = $request->name;
            $code->link_download = $request->link_download;
            $code->link_demo = $request->link_demo;
            $code->author_code = $request->author_code;
            $code->image = $request->file('image');
            $nama_foto =  $code->name . "_" . $request->image_name;
            $code->image->move('files/code', $nama_foto);
            $code->image = $nama_foto;
            $code->save();
            DB::commit();
            return response()->json([
                'message' => 'OK',
                'data' => $code,
            ]);
        } catch (Exception $e) {
            DB::rollback();
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
        $code = SourceCode::find($id);
        return view('admin.code.detail', [
            'code' => $code,
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
        $code = SourceCode::find($id);
        return view('admin.code.edit', [
            'code' => $code,
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
        $date = date(' Y-m-d ');
        DB::beginTransaction();
        try {
            $codeUpdate = SourceCode::find($id);
            $codeUpdate->date = $date;
            $codeUpdate->name = $request->name;
            $codeUpdate->link_download = $request->link_download;
            $codeUpdate->link_demo = $request->link_demo;
            $codeUpdate->author_code = $request->author_code;
            if ($request->hasFile('image')) {
                $codeUpdate->image = $request->file('image');
                $nama_foto =  $codeUpdate->name . "_" . $request->image_name;
                $codeUpdate->image->move('files/code', $nama_foto);
                $codeUpdate->image = $nama_foto;
            }


            $codeUpdate->save();
            DB::commit();
            return response()->json([
                'message' => 'OK',
                'data' => $codeUpdate,
            ]);
        } catch (Exception $e) {
            DB::rollback();
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
        $code = SourceCode::find($id);;
        try {
            $code->delete();
            return [
                'message' => 'Code has been deleted',
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

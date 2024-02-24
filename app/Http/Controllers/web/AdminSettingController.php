<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\DB;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', [
            'setting' => $setting,
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
        //
    }

    public function update_web_setting(Request $request)
    {
        DB::beginTransaction();
        try {
            $getData = Setting::first();
            if (isset($getData)) {
                $updateSettingWeb = Setting::find($getData->id);
                $updateSettingWeb->web_name = $request->web_name;
                $updateSettingWeb->web_logo = $request->web_logo;
                $updateSettingWeb->web_icon = $request->web_icon;
                $updateSettingWeb->web_desk = $request->web_desk;
                $updateSettingWeb->web_title = $request->web_title;
                $updateSettingWeb->web_meta = $request->web_meta;
                $updateSettingWeb->web_front_image = $request->web_front_image;
                $updateSettingWeb->web_footer = $request->web_footer;


                // if ($request->hasFile('image')) {
                //     $updateSettingWeb->image = $request->file('image');
                //     $nama_foto =  $updateSettingWeb->name . "_" . $request->image_name;
                //     $updateSettingWeb->image->move('files/about', $nama_foto);
                //     $updateSettingWeb->image = $nama_foto;
                // }

                $updateSettingWeb->save();
                DB::commit();
                return response()->json([
                    'message' => 'Save data successfully ',
                    'data' => $updateSettingWeb,
                    'code' => '200',
                ]);
            } else {
                $newAbout = new Setting();
                $newAbout->web_name = $request->web_name;
                $newAbout->web_logo = $request->web_logo;
                $newAbout->web_icon = $request->web_icon;
                $newAbout->web_desk = $request->web_desk;
                $newAbout->web_title = $request->web_title;
                $newAbout->web_meta = $request->web_meta;
                $newAbout->web_front_image = $request->web_front_image;
                $newAbout->web_footer = $request->web_footer;
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
    public function setting_web()
    {
        $setting = Setting::first();
        return view('admin.setting.setting-web', [
            'setting' => $setting,
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

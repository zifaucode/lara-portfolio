<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                $updateSettingWeb->web_desk = $request->web_desk;
                $updateSettingWeb->web_title = $request->web_title;
                $updateSettingWeb->web_meta = $request->web_meta;
                $updateSettingWeb->web_footer = $request->web_footer;


                if ($request->hasFile('web_logo')) {
                    $updateSettingWeb->web_logo = $request->file('web_logo');
                    $nama_logo =  $updateSettingWeb->web_name . "_" . $request->logo_name;
                    $updateSettingWeb->web_logo->move('files/logo', $nama_logo);
                    $updateSettingWeb->web_logo = $nama_logo;
                }

                if ($request->hasFile('web_front_image')) {
                    $updateSettingWeb->web_front_image = $request->file('web_front_image');
                    $nama_front =  $updateSettingWeb->web_name . "_" . $request->front_image_name;
                    $updateSettingWeb->web_front_image->move('files/front-image', $nama_front);
                    $updateSettingWeb->web_front_image = $nama_front;
                }

                if ($request->hasFile('web_icon')) {
                    $updateSettingWeb->web_icon = $request->file('web_icon');
                    $nama_icon =  $updateSettingWeb->web_name . "_" . $request->icon_name;
                    $updateSettingWeb->web_icon->move('files/icon', $nama_icon);
                    $updateSettingWeb->web_icon = $nama_icon;
                }


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
                $newAbout->web_desk = $request->web_desk;
                $newAbout->web_title = $request->web_title;
                $newAbout->web_meta = $request->web_meta;
                $newAbout->web_footer = $request->web_footer;

                if ($request->hasFile('web_logo')) {
                    $newAbout->web_logo = $request->file('web_logo');
                    $nama_logo =  $newAbout->name . "_" . $request->logo_name;
                    $newAbout->web_logo->move('files/logo', $nama_logo);
                    $newAbout->web_logo = $nama_logo;
                }

                if ($request->hasFile('web_front_image')) {
                    $newAbout->web_front_image = $request->file('web_front_image');
                    $nama_front =  $newAbout->name . "_" . $request->front_image_name;
                    $newAbout->web_front_image->move('files/front-image', $nama_front);
                    $newAbout->web_front_image = $nama_front;
                }

                if ($request->hasFile('web_icon')) {
                    $newAbout->web_icon = $request->file('web_icon');
                    $nama_icon =  $newAbout->name . "_" . $request->icon_name;
                    $newAbout->web_icon->move('files/icon', $nama_icon);
                    $newAbout->web_icon = $nama_icon;
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

    public function update_account(Request $request)
    {
        DB::beginTransaction();
        try {
            $getData = User::first();
            if (isset($getData)) {
                $updateAccount = User::find($getData->id);
                $updateAccount->username = $request->username;
                $updateAccount->full_name = $request->full_name;
                $updateAccount->email = $request->email;
                $updateAccount->level = 1;
                if (!empty($request->password)) {
                    $updateAccount->password = Hash::make($request->password);
                }
                $updateAccount->save();
                DB::commit();
                return response()->json([
                    'message' => 'Save data successfully ',
                    'data' => $updateAccount,
                    'code' => '200',
                ]);
            } else {
                $newAccount = new User();
                $newAccount->username = $request->username;
                $newAccount->full_name = $request->full_name;
                $newAccount->email = $request->email;
                $newAccount->level = 1;
                if (!empty($request->password)) {
                    $newAccount->password = Hash::make($request->password);
                }
                $newAccount->save();
                DB::commit();
                return response()->json([
                    'message' => 'Save data successfully ',
                    'data' => $newAccount,
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

    public function show_web()
    {
        $setting = Setting::first();
        return view('admin.setting.detail-web', [
            'setting' => $setting,
        ]);
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

    public function setting_account()
    {
        $user = User::first();
        return view('admin.setting.setting-account', [
            'user' => $user,
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

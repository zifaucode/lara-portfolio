<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class UserBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $category = Category::all();
        $blog = Blog::where('user_id', $user_id)->with(['users', 'categories'])->get();
        // return $blog;
        return view('user.blog.index', [
            'blog' => $blog,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('user.blog.create', [
            'category' => $category,
        ]);
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
        try {
            $blog = new Blog;
            $blog->date = $date;
            $blog->user_id = $user->id;
            $blog->category_id = $request->category_id;
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->image = $request->file('image');
            $nama_foto =  $blog->category_id . "_" . $request->image_name;
            $blog->image->move('files/blog', $nama_foto);
            $blog->image = $nama_foto;
            $blog->save();
            return response()->json([
                'message' => 'OK',
                'data' => $blog,
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
        $blog = Blog::find($id);;
        try {
            $blog->delete();
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

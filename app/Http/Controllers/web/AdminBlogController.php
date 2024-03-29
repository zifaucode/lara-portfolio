<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use HTMLPurifier;
use HTMLPurifier_Config;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $blog = Blog::where('active', 1)->with(['users', 'categories'])->get();
        // return $blog;
        return view('admin.blog.index', [
            'blog' => $blog,
            'category' => $category,
        ]);
    }

    public function persetujuan()
    {
        $category = Category::all();
        $blog = Blog::where('active', 0)->with(['users', 'categories'])->get();
        // return $blog;
        return view('admin.blog.persetujuan', [
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
        return view('admin.blog.create', [
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
        DB::beginTransaction();
        try {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            // $user = Auth::user();
            $date = date(' Y-m-d ');
            $blog = new Blog;
            $blog->date = $date;
            $blog->user_id = 1;
            $blog->category_id = $request->category_id;
            $categoryName = Category::where('id', $request->category_id)->first()->name;
            $blog->title = $request->title;

            // ===================== DOM IMAGE UPLOAD ===================

            $content = $request->content;
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');

            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name = "/files/content/" . time() . $item . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }



            $content = $dom->saveHTML();
            //    ============================= DOM IMAGE UPLOAD ==========================


            $blog->content = $content;
            $blog->image = $request->file('image');
            $nama_foto =  $categoryName . "_" . time() . '.' . $request->image->extension();
            $blog->image->move('files/blog', $nama_foto);
            $blog->image = $nama_foto;


            $blog->active = 1;
            $blog->save();

            DB::commit();
            session()->flash('status', 'Create Blog Success ');
            return redirect()->back();
        } catch (\Throwable $e) {
            DB::rollback();
            session()->flash('error', 'Error ' . $e->getMessage());
            return redirect()->back();
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
        $category = Category::all();
        $blog = Blog::with(['users', 'categories'])->findOrFail($id);
        // return $blog;
        return view('admin.blog.detail', [
            'blog' => $blog,
            'category' => $category,
        ]);
    }

    public function status(Request $request, $id)
    {
        $updates = Blog::findOrFail($id);
        $updates->active = $request->active;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();
        return view('admin.blog.edit', [
            'blog' => $blog,
            'categories' => $categories,
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

            // $user = Auth::user();
            $date = date(' Y-m-d ');
            $blog = Blog::find($id);
            $blog->date = $date;
            $blog->user_id = 1;
            $blog->category_id = $request->category_id;
            $categoryName = Category::where('id', $request->category_id)->first()->name;
            $blog->title = $request->title;

            // ===================== DOM IMAGE UPLOAD ===================

            // $content = $request->content;
            // $content = tidy_repair_string($content, ['clean' => true]);


            // $dom = new \DomDocument();
            // $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            // $imageFile = $dom->getElementsByTagName('img');

            // foreach ($imageFile as $item => $image) {
            //     $data = $image->getAttribute('src');
            //     list($type, $data) = explode(';', $data);
            //     list(, $data)      = explode(',', $data);
            //     $imgeData = base64_decode($data);
            //     $image_name = "/files/content/" . time() . $item . '.png';
            //     $path = public_path() . $image_name;
            //     file_put_contents($path, $imgeData);

            //     $image->removeAttribute('src');
            //     $image->setAttribute('src', $image_name);
            // }

            // $content = $dom->saveHTML();
            //    ============================= DOM IMAGE UPLOAD ==========================

            $content = $request->input('content');
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            $cleanContent = $purifier->purify($content);


            $blog->content = $cleanContent;
            if ($request->hasFile('image')) {
                $blog->image = $request->file('image');
                $nama_foto =  $categoryName . "_" . time() . '.' . $request->image->extension();
                $blog->image->move('files/blog', $nama_foto);
                $blog->image = $nama_foto;
            }


            $blog->active = 1;
            $blog->save();

            DB::commit();
            session()->flash('status', 'Create Blog Success ');
            return redirect()->back();
        } catch (\Throwable $e) {
            DB::rollback();
            session()->flash('error', 'Error ' . $e->getMessage());
            return redirect()->back();
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

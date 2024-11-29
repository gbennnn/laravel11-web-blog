<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        $data = Post::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(3);
        // print_r($data);

        return view('member.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // print_r($post);
        $data = $post;

        return view('member.blogs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Untuk memvalidasi data yang dikirim
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'thumbnail'=>'image|mimes:jpeg,png,jpg|max:10240',
        ], [
            'title.required'=>'Judul wajib diisi',
            'content.required'=>'Konten wajib diisi',
            'thumbnail.image'=>'Hanya file gambar yang diperbolehkan',
            'thumbnail.mimes'=>'Ekstensi file yang diperbolehkan: jpeg, png, jpg',
            'thumbnail.max'=>'Ukuran file maksimal 10MB',
        ]);

        // Cek apakah ada file thumbnail yang dikirim
        if($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail');
            $imageName = time().'_'.$image->getClientOriginalName();
            $destinationPath = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
            $image->move($destinationPath, $imageName);
        }

        // Update data
        $data=[
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'status'=>$request->status,
            'thumbnail'=>isset($imageName) ? $imageName : $post->thumbnail
        ];

        // Update data ke database
        Post::where('id', $post->id)->update($data);

        // Redirect ke halaman index
        return redirect()->route('member.blogs.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

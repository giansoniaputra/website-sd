<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Postingan Berita';  // Menentukan judul halaman untuk daftar postingan
        return view('posts.index', [
            'posts' => Post::all(),
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Postingan Baru';  // Menentukan judul halaman untuk form tambah postingan
        return view('posts.create', [
            'categories' => KategoriBerita::all(),
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'slug' => 'required|unique:posts',
            'image' => 'required|image|file|max:2048',
            'category_id' => 'required',
            'body' => 'required',
            'published_at' => 'required|date_format:Y-m-d', // Add this line
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('post-images');
        }

        $data['author'] = $request->author;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 150);
        $data['published_at'] = $request->published_at; // Add this line

        Post::create($data);

        return redirect('/news')->with('message', 'Postingan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $pageTitle = 'Detail Postingan';  // Menentukan judul halaman untuk detail postingan
        return view('posts.show', [
            'posts' => $post,
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $pageTitle = 'Edit Postingan Berita';  // Menentukan judul halaman untuk form edit postingan
        return view('posts.edit', [
            'post' => $post,
            'categories' => KategoriBerita::all(),
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $data = [
            'title' => 'required|max:255',
            'author' => 'required',
            'category_id' => 'required',
            'body' => 'required',
        ];
        if ($request->slug != $post->slug) {
            $data['slug'] = 'required|unique:posts';
        }
        if ($request->file('image')) {
            $data['image'] = 'image|file|max:2048';
        }
        $validateData = $request->validate($data);

        if ($request->file('image')) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        $validateData['excerpt'] = strip_tags(substr($request->body, 0, 150));

        Post::where('id', $post->id)->update($validateData);




        return redirect('/news')->with('message', 'Postingan baru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::where('slug', $post->slug)->delete();
        return redirect('/news')->with('message', 'Data Berhasil Dihapus');
    }

    //Menangani Cek Slug
    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

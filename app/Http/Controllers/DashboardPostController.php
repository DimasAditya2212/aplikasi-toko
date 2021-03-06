<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'stok';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title =  $category->name;
        }


        return view('dashboard.posts.index', [
            "title" => "Total dari "  . $title,
            "posts" => Post::orderBy('total_stok', 'ASC')->latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
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
        $validatedData = $request->validate([
            'kode_produk' => 'required|',
            'nama_produk' => 'required|unique:posts',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'total_stok' => 'required',
            'category_id' => 'required'
        ]);


        Post::create($validatedData);
        return redirect('/posts')->with('success', 'post baru ditambah');

        // return redirect('/posts')->with('success', 'post baru ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [

            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'total_stok' => 'required',
            'category_id' => 'required'
        ];
        if ($request->kode_produk != $post->kode_produk) {
            $rules['kode_produk'] = 'required';
            $rules['nama_produk'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);


        Post::where('id', $post->id)
            ->update($validatedData);
        return redirect('/posts')->with('success', 'stock diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

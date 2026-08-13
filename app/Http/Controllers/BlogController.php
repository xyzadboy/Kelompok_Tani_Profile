<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Menampilkan daftar semua artikel blog.
     */
    public function index()
    {
        $blogs = Blog::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(6);

        // Sesuaikan dengan file resources/views/pages/blog.blade.php
        return view('pages.blog', compact('blogs'));
    }

    /**
     * Menampilkan detail isi artikel berdasarkan slug.
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        // Jika file detail baca ada di resources/views/pages/blog-detail.blade.php
        // Ubah menjadi 'pages.blog-detail' (atau sesuaikan dengan nama file detail Anda)
        return view('pages.blog-detail', compact('blog', 'relatedBlogs'));
    }
}
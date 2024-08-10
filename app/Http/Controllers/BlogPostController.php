<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        // Fetch all blog posts
        $blogPosts = BlogPost::paginate(10); // Adjust the query as needed
    
        // Return the view with blog posts
        return view('rentacar', compact('blogPosts'));
    }
    
    public function show($id)
    {
        $blogPost = BlogPost::with('vehicle')->findOrFail($id);
        return view('blog.show', compact('blogPost'));
    }
}

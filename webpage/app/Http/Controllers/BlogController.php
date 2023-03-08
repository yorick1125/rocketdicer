<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BlogController {
  
  // This method retrieves all the blog posts from the database and displays them on the homepage
  function index() {
    // Retrieve all blog posts from the database using your chosen database library (e.g. ActiveRecord, Sequelize, etc.)
    $posts = BlogPost::all();
    
    // Render the index view, passing the blog posts as a parameter
    return view('blog.index', ['posts' => $posts]);
  }
  
  // This method displays a single blog post
  function show($id) {
    // Retrieve the blog post with the given ID from the database
    $post = BlogPost::find($id);
    
    // Render the show view, passing the blog post as a parameter
    return view('blog.show', ['post' => $post]);
  }
  
  // This method displays a form for creating a new blog post
  function create() {
    // Render the create view
    return view('blog.create');
  }
  
  // This method stores a new blog post in the database
  function store() {
    // Validate the incoming form data using your chosen validation library (e.g. Laravel Validation, Symfony Validator, etc.)
    $validatedData = request()->validate([
      'title' => 'required|max:255',
      'body' => 'required',
    ]);
    
    // Create a new blog post model instance with the validated form data
    $post = new BlogPost($validatedData);
    
    // Save the new blog post to the database
    $post->save();
    
    // Redirect the user to the newly created blog post
    return redirect()->route('blog.show', ['id' => $post->id]);
  }
  
  // This method displays a form for editing an existing blog post
  function edit($id) {
    // Retrieve the blog post with the given ID from the database
    $post = BlogPost::find($id);
    
    // Render the edit view, passing the blog post as a parameter
    return view('blog.edit', ['post' => $post]);
  }
  
  // This method updates an existing blog post in the database
  function update($id) {
    // Retrieve the blog post with the given ID from the database
    $post = BlogPost::find($id);
    
    // Validate the incoming form data using your chosen validation library (e.g. Laravel Validation, Symfony Validator, etc.)
    $validatedData = request()->validate([
      'title' => 'required|max:255',
      'body' => 'required',
    ]);
    
    // Update the blog post model instance with the validated form data
    $post->update($validatedData);
    
    // Redirect the user to the updated blog post
    return redirect()->route('blog.show', ['id' => $post->id]);
  }
  
  // This method deletes an existing blog post from the database
  function delete($id) {
    // Retrieve the blog post with the given ID from the database
    $post = BlogPost::find($id);
    
    // Delete the blog post from the database
    $post->delete();
    
    // Redirect the user to the index page
    return redirect()->route('blog.index');
  }
  
}

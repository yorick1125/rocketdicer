<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MusicController extends Controller {
    
    // This method retrieves all songs from the database and displays them in a list
    function index() {
        // Retrieve all songs from the database using the Song model
        $songs = Song::all();
        
        // Render the index view, passing the songs as a parameter
        return view('music.index', ['songs' => $songs]);
    }
    
    // This method displays a form for creating a new song
    function create() {
        // Render the create view
        return view('music.create');
    }
    
    // This method stores a new song in the database
    function store(Request $request) {
        // Validate the incoming form data using Laravel's built-in validation rules
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'artist' => 'required|max:255',
            'release_date' => 'required|date',
        ]);
        
        // Create a new Song model instance with the validated form data
        $song = new Song();
        $song->name = $validatedData['name'];
        $song->artist = $validatedData['artist'];
        $song->release_date = $validatedData['release_date'];
        
        // Save the new song to the database
        $song->save();
        
        // Redirect the user to the newly created song
        return redirect()->route('music.show', ['id' => $song->id]);
    }
    
    // This method displays a single song
    function show($id) {
        // Retrieve the song with the given ID from the database using the Song model
        $song = Song::find($id);
        
        // Render the show view, passing the song as a parameter
        return view('music.show', ['song' => $song]);
    }
    
    // This method displays a form for editing an existing song
    function edit($id) {
        // Retrieve the song with the given ID from the database using the Song model
        $song = Song::find($id);
        
        // Render the edit view, passing the song as a parameter
        return view('music.edit', ['song' => $song]);
    }
    
    // This method updates an existing song in the database
    function update(Request $request, $id) {
        // Retrieve the song with the given ID from the database using the Song model
        $song = Song::find($id);
        
        // Validate the incoming form data using Laravel's built-in validation rules
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'artist' => 'required|max:255',
            'release_date' => 'required|date',
        ]);
        
        // Update the song model instance with the validated form data
        $song->name = $validatedData['name'];
        $song->artist = $validatedData['artist'];
        $song->release_date = $validatedData['release_date'];
        $song->save();
        
        // Redirect the user to the updated song
        return redirect()->route('music.show', ['id' => $song->id]);
    }
    
    // This method deletes an existing song from the database
    function delete($id) {
        // Retrieve the song with the given ID from the database using the Song model
        $song = Song::find($id);
        
        // Delete the song from the database
        $song->delete();
        
    }
}
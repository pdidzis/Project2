<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{
    /**
     * Display a list of authors.
     */
    public function list(): View
    {
        $items = Author::orderBy('name', 'asc')->get();

        return view(
            'author.list',
            [
                'title' => 'Authors',
                'items' => $items,
            ]
        );
    }

    /**
     * Display the form for creating a new author.
     */
    public function create(): View
    {
        return view(
            'author.form',
            [
                'title' => 'Add new author',
                'author' => new Author(), // Pass an empty Author object
            ]
        );
    }

    /**
     * Create a new author and save it to the database.
     */
    public function put(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Author();
        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors')->with('success', 'Author added successfully!');
    }

    /**
     * Display the form for editing an author.
     */
    public function update(Author $author): View
    {
        return view(
            'author.form',
            [
                'title' => 'Edit author',
                'author' => $author,
            ]
        );
    }

    /**
     * Delete an author from the database.
     */
    public function delete(Author $author): RedirectResponse
    {
        $author->delete();

        return redirect('/authors')->with('success', 'Author deleted successfully!');
    }
}

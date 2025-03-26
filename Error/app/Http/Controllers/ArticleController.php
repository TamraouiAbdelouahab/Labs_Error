<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all(); // Récupérer tous les articles triés du plus récent au plus ancien
        return view('index', compact('articles'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('index')->with('success', 'Article ajouté avec succès.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AiNews;

class AiNewsController extends Controller
{
    public function index()
    {
        // Fetch only published news, latest first
        $news = AiNews::where('is_published', true)->latest()->get();
        
        return view('pages.ai-news', compact('news'));
    }
}

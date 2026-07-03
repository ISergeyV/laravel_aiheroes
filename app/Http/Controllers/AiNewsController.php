<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AiNews;

class AiNewsController extends Controller
{
    public function index(Request $request)
    {
        // Fetch published news, latest first, with pagination
        $news = AiNews::where('is_published', true)->latest()->paginate(12);
        
        if ($request->ajax() || $request->wantsJson()) {
            $html = view('pages.partials.news-items', compact('news'))->render();
            return response()->json([
                'html' => $html,
                'next_page_url' => $news->nextPageUrl()
            ]);
        }
        
        return view('pages.ai-news', compact('news'));
    }

    public function show($id)
    {
        $newsItem = AiNews::where('is_published', true)->findOrFail($id);
        return view('pages.ai-news-show', compact('newsItem'));
    }
}

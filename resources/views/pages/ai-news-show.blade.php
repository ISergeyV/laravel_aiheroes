@extends('partials.layout')

@section('title', ($newsItem->title ?: 'AI News') . ' - Mr. EuroFix')
@section('description', \Illuminate\Support\Str::limit($newsItem->original_text ?? '', 150))

@section('content')
    <div class="bg-slate-50 min-h-screen pt-32 pb-20">
        <div class="container max-w-[800px] mx-auto px-6">
            
            <div class="mb-8">
                <a href="{{ route('ai-news.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to all news
                </a>
            </div>

            <article class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                
                @if($newsItem->image_path)
                    <div class="relative w-full overflow-hidden border-b border-slate-200 bg-slate-100 aspect-[4/5] md:aspect-auto md:h-[600px]">
                        <img src="{{ Storage::url($newsItem->image_path) }}" alt="{{ $newsItem->title ?? 'AI News Image' }}" class="absolute inset-0 w-full h-full object-cover object-center">
                    </div>
                @else
                    <div class="relative w-full overflow-hidden border-b border-slate-200 bg-slate-100 flex items-center justify-center text-slate-300 aspect-[4/5] md:aspect-auto md:h-[400px]">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                @endif

                <div class="p-6 md:p-10 flex flex-col flex-grow">
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-sm text-slate-400 font-medium uppercase tracking-wider">
                            {{ $newsItem->published_at ? $newsItem->published_at->format('M j, Y') : $newsItem->created_at->format('M j, Y') }}
                        </div>
                        
                        <div class="flex flex-wrap gap-2 justify-end">
                            @if(isset($newsItem->insight['importance_score']))
                                @php
                                    $score = (int)$newsItem->insight['importance_score'];
                                    $impactLevel = 'Notable';
                                    $impactColor = 'bg-blue-100 text-blue-700';
                                    if ($score >= 9) {
                                        $impactLevel = 'Critical';
                                        $impactColor = 'bg-red-100 text-red-700';
                                    } elseif ($score >= 8) {
                                        $impactLevel = 'High';
                                        $impactColor = 'bg-orange-100 text-orange-700';
                                    }
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded text-xs font-semibold {{ $impactColor }}">
                                    {{ $impactLevel }}
                                </span>
                            @endif
                            
                            @if(isset($newsItem->insight['category']))
                                <span class="inline-flex items-center px-3 py-1 rounded text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                    {{ $newsItem->insight['category'] }}
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 leading-tight">
                        {{ $newsItem->title ?: ($newsItem->insight['summary'] ?? 'AI News Update') }}
                    </h1>
                    
                    <div class="text-slate-600 flex flex-col gap-6 text-lg">
                        @if(isset($newsItem->insight['key_thoughts']) && is_array($newsItem->insight['key_thoughts']))
                            <ul class="list-disc list-outside ml-6 space-y-3 text-slate-700">
                                @foreach($newsItem->insight['key_thoughts'] as $thought)
                                    <li class="pl-2">{{ $thought }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="whitespace-pre-wrap">{{ $newsItem->original_text }}</p>
                        @endif

                        @if(!empty($newsItem->insight['why_it_matters']))
                            <div class="mt-4 pl-5 border-l-4 border-indigo-400 bg-indigo-50/50 py-4 pr-4 text-base italic text-slate-700 rounded-r-lg">
                                <strong class="font-semibold text-indigo-900 not-italic block mb-2">Why it matters:</strong>
                                {{ $newsItem->insight['why_it_matters'] }}
                            </div>
                        @endif
                    </div>
                    
                </div>
            </article>

        </div>
    </div>
@endsection

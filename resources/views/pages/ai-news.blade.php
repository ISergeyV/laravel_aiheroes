@extends('partials.layout')

@section('title', 'AI News - Mr. EuroFix')
@section('description', 'Stay updated with the latest AI News')

@section('content')
    <!-- AI News Hero Section -->
    <header class="cs-hero bg-[#0f172a] text-white pt-32 pb-20 relative overflow-hidden -mt-[80px]">
        <!-- Neo-Indigo geometric accents -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-20 pointer-events-none">
            <div class="absolute -top-[10%] -right-[5%] w-[40%] h-[60%] rounded-full bg-indigo-600 blur-[100px]"></div>
            <div class="absolute -bottom-[20%] -left-[10%] w-[50%] h-[70%] rounded-full bg-pink-600 blur-[120px]"></div>
        </div>

        <div class="container relative z-10 max-w-[1200px] mx-auto px-6">
            <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-500/20 text-indigo-300 font-semibold text-sm mb-6 border border-indigo-500/30">
                LATEST UPDATES
            </span>
            <h1 class="text-5xl md:text-6xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400">
                AI News
            </h1>
            <p class="text-xl text-slate-300 max-w-2xl leading-relaxed">
                Stay updated with the latest breakthroughs, tutorials, and discussions in the AI world. Browse our curated selection of video content.
            </p>
        </div>
    </header>

    <main class="section bg-slate-50 py-20 min-h-screen">
        <div class="container max-w-[1200px] mx-auto px-6">
            @if($news->isEmpty())
                <div class="text-center py-20 bg-white rounded-2xl border border-slate-200 shadow-sm">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold text-slate-700 mb-2">No News Yet</h2>
                    <p class="text-slate-500">Check back later for the latest AI updates and videos.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $item)
                        <article class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
                            
                            @if($item->image_path)
                                <div class="relative w-full overflow-hidden border-b border-slate-200 bg-slate-100" style="padding-bottom: 56.25%;">
                                    <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title ?? 'AI News Image' }}" class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-700 hover:scale-[1.03]">
                                </div>
                            @else
                                <div class="relative w-full overflow-hidden border-b border-slate-200 bg-slate-100 flex items-center justify-center text-slate-300" style="padding-bottom: 56.25%;">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endif

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="text-xs text-slate-400 font-medium uppercase tracking-wider">
                                        {{ $item->published_at ? $item->published_at->format('M j, Y') : $item->created_at->format('M j, Y') }}
                                    </div>
                                    
                                    <div class="flex gap-2">
                                        @if(isset($item->insight['importance_score']))
                                            @php
                                                $score = (int)$item->insight['importance_score'];
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
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold {{ $impactColor }}">
                                                {{ $impactLevel }}
                                            </span>
                                        @endif
                                        
                                        @if(isset($item->insight['category']))
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                                {{ $item->insight['category'] }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <h3 class="text-xl font-bold text-slate-800 mb-3 leading-tight">
                                    {{ $item->title ?: ($item->insight['summary'] ?? 'AI News Update') }}
                                </h3>
                                
                                <div class="text-slate-600 mb-6 flex-grow flex flex-col gap-4">
                                    @if(isset($item->insight['key_thoughts']) && is_array($item->insight['key_thoughts']))
                                        <ul class="list-disc list-outside ml-5 space-y-2 text-sm text-slate-700">
                                            @foreach($item->insight['key_thoughts'] as $thought)
                                                <li class="pl-1">{{ $thought }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="line-clamp-4">{{ $item->original_text }}</p>
                                    @endif

                                    @if(!empty($item->insight['why_it_matters']))
                                        <div class="mt-2 pl-4 border-l-4 border-indigo-400 bg-indigo-50/50 py-2 pr-2 text-sm italic text-slate-700">
                                            <strong class="font-semibold text-indigo-900 not-italic block mb-1">Why it matters:</strong>
                                            {{ $item->insight['why_it_matters'] }}
                                        </div>
                                    @endif
                                </div>
                                
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
@endsection

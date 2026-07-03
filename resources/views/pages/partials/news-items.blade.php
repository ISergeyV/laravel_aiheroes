@foreach($news as $item)
    <a href="{{ route('ai-news.show', $item->id) }}" class="block h-full group">
        <article id="news-{{ $item->id }}" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden group-hover:shadow-md group-hover:border-indigo-300 transition-all duration-300 flex flex-col h-full relative">
            
            @if($item->image_path)
                <div class="relative w-full overflow-hidden border-b border-slate-200 bg-slate-100 aspect-[4/5]">
                    <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title ?? 'AI News Image' }}" class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-[1.03]">
                </div>
            @else
                <div class="relative w-full overflow-hidden border-b border-slate-200 bg-slate-100 flex items-center justify-center text-slate-300 aspect-[4/5] group-hover:bg-slate-200 transition-colors duration-300">
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
                
                <h3 class="text-xl font-bold text-slate-800 mb-3 leading-tight group-hover:text-indigo-600 transition-colors">
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
            
            <div class="absolute bottom-6 right-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-x-2 group-hover:translate-x-0">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </div>
        </article>
    </a>
@endforeach

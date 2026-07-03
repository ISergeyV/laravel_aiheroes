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
                <div id="news-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @include('pages.partials.news-items', ['news' => $news])
                </div>

                @if($news->hasMorePages())
                    <div id="infinite-scroll-trigger" class="flex justify-center mt-12 py-8" data-next-page="{{ $news->nextPageUrl() }}">
                        <div class="inline-flex flex-col items-center gap-3">
                            <svg class="w-8 h-8 text-indigo-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="text-sm font-medium text-slate-500">Loading more news...</span>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </main>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let trigger = document.getElementById('infinite-scroll-trigger');
            if (!trigger) return;

            let loading = false;
            let grid = document.getElementById('news-grid');

            let observer = new IntersectionObserver(function (entries) {
                if (entries[0].isIntersecting && !loading) {
                    loadMore();
                }
            }, {
                rootMargin: '0px 0px 400px 0px' // Load slightly before reaching the bottom
            });

            observer.observe(trigger);

            function loadMore() {
                let nextPageUrl = trigger.getAttribute('data-next-page');
                if (!nextPageUrl) return;

                loading = true;

                fetch(nextPageUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Append HTML to grid
                    grid.insertAdjacentHTML('beforeend', data.html);

                    // Update next page url
                    if (data.next_page_url) {
                        trigger.setAttribute('data-next-page', data.next_page_url);
                        loading = false;
                    } else {
                        // No more pages
                        trigger.remove();
                        observer.disconnect();
                    }
                })
                .catch(error => {
                    console.error('Error loading more news:', error);
                    loading = false;
                });
            }
        });
    </script>
    @endpush
@endsection

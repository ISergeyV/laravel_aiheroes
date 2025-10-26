<!--
This view is for displaying a single dynamic page created in the admin panel.
It uses the 'guest' layout as a Blade component, which is the modern Laravel way.
-->
<x-layouts.guest>
    <!-- The title for the browser tab will be the page title. -->
    @section('title', $page->title)

    <!--
    The content below is passed into the `$slot` variable
    of the `layouts/guest.blade.php` file.
    -->
    <div class="container mx-auto py-12 px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg prose max-w-none">
            <h1>{{ $page->title }}</h1>
            <div>
                {!! $page->content !!}
            </div>
        </div>
    </div>
</x-layouts.guest>

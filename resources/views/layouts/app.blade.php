@php
    $title = $title ?? null;
@endphp
<x-layouts.app.sidebar :title="$title">
    <flux:main>
        @yield('content')
    </flux:main>
</x-layouts.app.sidebar>

@php
    use Illuminate\Support\Str;

    $segments = request()->segments();
    $path = request()->path();

    $labelMap = [
        'resource-library' => 'Resource Library',
        'case-studies' => 'Case Studies',
        'case-study' => 'Case Study',
        'insights' => 'Insights',
        'technology' => 'Technology',
        'solutions' => 'Solutions',
        'products-and-services' => 'Products and Services',
        'sustainability' => 'Sustainability',
        'about-us' => 'About Us',
        'contact' => 'Contact',
        'multiphase-compression' => 'Multiphase Compression',
        'multiphase-compression-technology' => 'Multiphase Compression',
        'vapor-recovery' => 'Vapor Recovery',
        'casing-gas-compression' => 'Casing Gas Compression',
    ];

    $items = [];

    /*
    |--------------------------------------------------------------------------
    | Custom breadcrumb structure for solution detail pages
    |--------------------------------------------------------------------------
    */
    if ($path === 'multiphase-compression') {
        $items = [
            ['label' => 'Solutions', 'url' => url('/solutions')],
            ['label' => 'Multiphase Compression', 'url' => null],
        ];
    } elseif ($path === 'vapor-recovery') {
        $items = [
            ['label' => 'Solutions', 'url' => url('/solutions')],
            ['label' => 'Vapor Recovery', 'url' => null],
        ];
    } elseif ($path === 'casing-gas-compression') {
        $items = [
            ['label' => 'Solutions', 'url' => url('/solutions')],
            ['label' => 'Casing Gas Compression', 'url' => null],
        ];
    } else {
        foreach ($segments as $index => $segment) {
            $url = url(implode('/', array_slice($segments, 0, $index + 1)));

            $label = $labelMap[$segment]
                ?? Str::of(urldecode($segment))
                    ->replace('-', ' ')
                    ->replace('_', ' ')
                    ->title()
                    ->toString();

            $items[] = [
                'label' => $label,
                'url' => $index < count($segments) - 1 ? $url : null,
            ];
        }
    }
@endphp

@if (count($items))
    <section class="w-full border-y border-slate-200 bg-white">
        <div class="mx-auto max-w-[1680px] px-4 sm:px-6 lg:px-10">
            <nav aria-label="Breadcrumb" class="overflow-x-auto py-4">
                <ol class="flex min-w-max items-center gap-2 text-sm leading-6 text-slate-600 sm:text-[15px]">
                    <li class="shrink-0">
                        <a href="{{ url('/') }}" class="transition-colors duration-200 hover:text-[#0018dc]">
                            Home
                        </a>
                    </li>

                    @foreach ($items as $item)
                        <li class="shrink-0 text-slate-400">/</li>

                        <li class="shrink-0">
                            @if ($item['url'])
                                <a href="{{ $item['url'] }}" class="transition-colors duration-200 hover:text-[#0018dc]">
                                    {{ $item['label'] }}
                                </a>
                            @else
                                <span class="font-medium text-slate-700">
                                    {{ $item['label'] }}
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </section>
@endif
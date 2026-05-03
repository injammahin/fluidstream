@extends('layouts.app')

@section('content')
    <section class="fs-search-page">
        <div class="fs-search-hero">
            <div class="fs-search-container">
                <h1>Search</h1>
            </div>
        </div>

        <div class="fs-search-container fs-search-body">
            <form class="fs-search-page-form" action="{{ route('search') }}" method="GET">
                <div class="fs-search-input-wrap">
                    <input type="search" name="q" value="{{ $query }}" placeholder="Search pages, sections, case studies..."
                        autocomplete="off" autofocus>

                    @if($query)
                        <a href="{{ route('search') }}" class="fs-search-clear" aria-label="Clear search">
                            ×
                        </a>
                    @endif
                </div>

                <button type="submit">
                    <span>Search</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fs-search-btn-icon" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" />
                    </svg>
                </button>
            </form>

            @if($query)
                <p class="fs-search-count">
                    Results {{ $total ? '1 - ' . $total : '0' }} of {{ $total }} for <strong>{{ $query }}</strong>
                </p>
            @endif

            <div class="fs-search-results">
                @if(!$query)
                    <div class="fs-search-empty">
                        Type something above to search Fluidstream pages and sections.
                    </div>
                @elseif($total === 0)
                    <div class="fs-search-empty">
                        No result found for <strong>{{ $query }}</strong>.
                    </div>
                @else
                    @foreach($results as $result)
                        <a href="{{ $result['url'] }}" class="fs-search-result-card">
                            <span class="fs-search-result-type">{{ $result['type'] }}</span>
                            <h2>{{ $result['title'] }}</h2>
                            <p>{{ $result['description'] }}</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <style>
        .fs-search-page {
            background: #ffffff;
            color: #0b1220;
            min-height: 100vh;
        }

        .fs-search-container {
            width: min(calc(100% - 56px), 1320px);
            margin: 0 auto;
        }

        .fs-search-hero {
            background: #0018dc;
            color: #ffffff;
            padding: 86px 0 96px;
        }

        .fs-search-hero h1 {
            margin: 0;
            color: #ffffff;
            font-size: clamp(58px, 6vw, 96px);
            line-height: .95;
            letter-spacing: -.06em;
            font-weight: 300;
        }

        .fs-search-body {
            padding: 72px 0 96px;
        }

        .fs-search-page-form {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 220px;
            gap: 22px;
            align-items: stretch;
            max-width: 1180px;
        }

        .fs-search-input-wrap {
            position: relative;
        }

        .fs-search-input-wrap input {
            width: 100%;
            height: 68px;
            border: 1px solid #637083;
            border-radius: 0;
            padding: 0 70px 0 20px;
            color: #0b1220;
            background: #ffffff;
            font-size: 22px;
            font-weight: 400;
            outline: none;
        }

        .fs-search-input-wrap input:focus {
            border-color: #0018dc;
            box-shadow: 0 0 0 3px rgba(0, 24, 220, .10);
        }

        .fs-search-clear {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #111827;
            font-size: 42px;
            line-height: 1;
            font-weight: 300;
            text-decoration: none;
        }

        .fs-search-page-form button {
            height: 68px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 28px;
            border: 0;
            border-radius: 0;
            background: #0018dc;
            color: #ffffff;
            font-size: 21px;
            line-height: 1;
            font-weight: 700;
            cursor: pointer;
            transition: background .2s ease, transform .2s ease;
        }

        .fs-search-page-form button:hover {
            background: #001096;
            transform: translateY(-1px);
        }

        .fs-search-btn-icon {
            width: 30px;
            height: 30px;
        }

        .fs-search-count {
            margin: 30px 0 34px;
            color: #111827;
            font-size: 18px;
            line-height: 1.5;
            font-weight: 400;
        }

        .fs-search-count strong {
            font-weight: 500;
        }

        .fs-search-results {
            max-width: 1180px;
        }

        .fs-search-result-card {
            display: block;
            padding: 26px 22px 28px;
            border-bottom: 1px solid #d8dce3;
            color: #0b1220;
            text-decoration: none;
            transition: background .2s ease;
        }

        .fs-search-result-card:hover {
            background: #f8fbff;
        }

        .fs-search-result-type {
            display: block;
            margin-bottom: 14px;
            color: #707070;
            font-size: 17px;
            line-height: 1;
            font-weight: 800;
        }

        .fs-search-result-card h2 {
            margin: 0 0 16px;
            color: #050505;
            font-size: clamp(28px, 2.8vw, 40px);
            line-height: 1.15;
            letter-spacing: -.035em;
            font-weight: 500;
        }

        .fs-search-result-card p {
            margin: 0;
            color: #111827;
            font-size: 21px;
            line-height: 1.5;
            font-weight: 400;
        }

        .fs-search-empty {
            padding: 46px 28px;
            border: 1px solid #dce6ff;
            background: #f8fbff;
            color: #526071;
            font-size: 18px;
            line-height: 1.6;
        }

        @media (max-width: 900px) {
            .fs-search-container {
                width: min(calc(100% - 32px), 1320px);
            }

            .fs-search-hero {
                padding: 62px 0 70px;
            }

            .fs-search-body {
                padding: 44px 0 72px;
            }

            .fs-search-page-form {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .fs-search-input-wrap input,
            .fs-search-page-form button {
                height: 60px;
            }

            .fs-search-input-wrap input {
                font-size: 18px;
            }

            .fs-search-page-form button {
                width: 100%;
                font-size: 18px;
            }

            .fs-search-result-card {
                padding: 24px 0;
            }

            .fs-search-result-card h2 {
                font-size: 28px;
            }

            .fs-search-result-card p {
                font-size: 17px;
            }
        }
    </style>
@endsection
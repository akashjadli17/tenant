@extends('layouts.master')

@section('title', 'Men Categories')

@section('content')

    <main class="main">

        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">Men Category</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="/">Home</a></li>
                    <li class="active">Men Category</li>
                </ul>
            </div>
        </div>


        <div class="team-area pt-4">
            <div class="container">

                {{-- Tabs --}}
                <ul class="nav nav-tabs justify-content-center mb-4" role="tablist">
                    @foreach ($topCategories as $index => $topCat)
                        <li class="nav-item">
                            <button class="nav-link @if ($index === 0) active @endif" data-bs-toggle="tab"
                                data-bs-target="#tab-{{ $topCat->id }}" type="button" role="tab">
                                {{ $topCat->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                {{-- Tab Content --}}
                <div class="tab-content">
                    @foreach ($topCategories as $index => $topCat)
                        <div class="tab-pane fade @if ($index === 0) show active @endif"
                            id="tab-{{ $topCat->id }}" role="tabpanel">

                            <div class="row justify-content-center">
                                @foreach ($topCat->midCategories as $midCat)
                                    <div class="col-6 col-md-6 col-lg-2 mb-4">
                                        <a
                                            href="{{ route('services', ['gender' => strtolower($midCat->topCategory->gender->name), 'mid' => Str::slug($midCat->name)]) }}">

                                            <div class="card h-100 text-center">
                                                <img src="{{ asset('storage/uploads/mid_categories/' . $midCat->image) }}"
                                                    alt="{{ $midCat->name }}" class="img-fluid mb-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $midCat->name }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach




                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </main>

@endsection

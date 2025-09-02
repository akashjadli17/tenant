@extends('layouts.master')

@section('title', $blog->meta_title ?? $blog->heading)

@section('content')

<main class="main">

    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">{{ $blog->heading }}</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('blog') }}">Our Blog</a></li>
                <li class="active">{{ $blog->heading }}</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog single -->
    <div class="blog-single py-120">
        <div class="container">
            <div class="row g-4">

                <!-- Main Blog Content -->
                <div class="col-lg-8">
                    <div class="blog-single-wrap">
                        <div class="blog-single-content">
                            <div class="blog-thumb-img">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->heading }}" class="img-fluid">
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="blog-meta-left">
                                        <ul>
                                            <li><i class="far fa-user"></i> {{ $blog->author ?? 'Admin' }}</li>
                                            <li><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-details">
                                    <h3 class="blog-details-title mb-20">{{ $blog->heading }}</h3>

                                    <p class="mb-10">{{ $blog->short_description }}</p>

                                    {!! $blog->description !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="blog-sidebar">

                        <!-- Search -->
                        <div class="widget search">
                            <h5 class="widget-title">Search</h5>
                            <div class="search-form">
                                <form action="{{ route('blog') }}" method="GET">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request('search') }}">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Recent Posts -->
                        <div class="widget recent-post">
                            <h5 class="widget-title">Recent Posts</h5>
                            @foreach($recentBlogs as $recent)
                                <div class="recent-post-item">
                                    <div class="recent-post-img">
                                        <img src="{{ asset('storage/' . $recent->image) }}" alt="{{ $recent->heading }}">
                                    </div>
                                    <div class="recent-post-info">
                                        <h6>
                                            <a href="{{ route('blog-details', $recent->slug) }}">
                                                {{ Str::limit($recent->heading, 50) }}
                                            </a>
                                        </h6>
                                        <span><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($recent->created_at)->format('d M, Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </div>
    <!-- blog single end -->

</main>

@endsection

<style>
.img-fluid {
    height: auto;
    aspect-ratio: 6 / 3;
    width: 90%;
    object-fit: cover;
    border-radius: 8px;
}
</style>

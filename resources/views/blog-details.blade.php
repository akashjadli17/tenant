@extends('layouts.master')

@section('title', $blog->title . ' | Myraluxa Aesthetic Pvt Ltd')

@section('content')

<main class="main">

    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Blog Details</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('blogs') }}">Home</a></li>
                <li class="active">{{ $blog->title }}</li>
            </ul>
        </div>
    </div>

    <div class="blog-single-area pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-wrapper">
                        <div class="blog-single-content">
                            <div class="blog-thumb-img mb-4">
                                @if($blog->image)
                                    <img src="{{ asset('storage/blogs/' . $blog->image) }}" alt="Blog Image" class="img-fluid rounded">
                                @else
                                    <img src="{{ asset('assets/img/blog/default.jpg') }}" alt="No Image" class="img-fluid rounded">
                                @endif
                            </div>
                            <h2 class="mb-3">{{ $blog->title }}</h2>
                            <div class="blog-meta mb-4">
                                <ul class="d-flex flex-wrap gap-4 list-unstyled small">
                                    <li><i class="far fa-user"></i> Admin</li>
                                    <li><i class="far fa-clock"></i> {{ $blog->created_at->format('d M Y') }}</li>
                                    <li><i class="far fa-eye"></i> {{ rand(200,1000) }} Views</li> {{-- Optional fake count --}}
                                </ul>
                            </div>
                            <div class="blog-content">
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar">

                        <div class="widget search">
                            <h5 class="widget-title">Search</h5>
                            <form class="search-form">
                                <input type="text" class="form-control" placeholder="Search Here...">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget recent-post">
                            <h5 class="widget-title">Recent Posts</h5>
                            {{-- You can replace with a dynamic recent blogs loop --}}
                            @foreach(App\Models\Blog::latest()->take(3)->get() as $recent)
                                <div class="recent-post-single mb-3 d-flex">
                                    <div class="recent-post-img me-3">
                                        <img src="{{ $recent->image ? asset('storage/blogs/' . $recent->image) : asset('assets/img/blog/default.jpg') }}" alt="Recent" width="70" class="rounded">
                                    </div>
                                    <div class="recent-post-bio">
                                        <h6><a href="{{ route('blogs.show', $recent->slug) }}">{{ \Illuminate\Support\Str::limit($recent->title, 50) }}</a></h6>
                                        <span><i class="far fa-clock"></i> {{ $recent->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
<style>
    .img-fluid {
    /* max-width: 100%; */
    height: auto;
    aspect-ratio: 6 / 3;
    width: 90%;
}
</style>

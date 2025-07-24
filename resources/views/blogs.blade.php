@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

@section('content')
<main class="main">
    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Our Blog</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="active">Our Blog</li>
            </ul>
        </div>
    </div>

    <div class="blog-area py-5">
        <div class="container">
            <div class="row">
                @forelse ($blogs as $blog)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item">
                            <div class="blog-item-img">
                                <img src="{{ asset('storage/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
                            </div>
                            <div class="blog-item-info">
                                <h4 class="blog-title">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                                </h4>
                                <p>{!! Str::limit(strip_tags($blog->content), 100, '...') !!}</p>
                                <a class="blog-btn" href="{{ route('blogs.show', $blog->slug) }}">
                                    Read More <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No blogs found.</p>
                @endforelse
            </div>

            <div class="pagination-area">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

<style>
    .img-fluid {
    max-width: 100%;
    height: auto;
    aspect-ratio: 3 / 2;
}
</style>

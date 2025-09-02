@extends('layouts.master')

@section('title', 'Our Blog')

@section('content')
    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
            <div class="container">
                <h2 class="breadcrumb-title">Our Blog</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Our Blog</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- blog-area -->
        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <h2 class="site-title">Our Latest News & <span>Blog</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row g-4">
                    @forelse($blogs as $blog)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="blog-item-img">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </div>
                                <div class="blog-item-info">
                                    <div class="blog-item-meta">
                                        <ul>
                                            <li>
                                                <i class="far fa-user-circle"></i> 
                                                {{ $blog->author ?? 'Admin' }}
                                            </li>
                                            <li>
                                                <i class="far fa-calendar-alt"></i> 
                                                {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="blog-title">
                                        <a href="{{ route('blog-details', $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h4>
                                    <p>{{ Str::limit($blog->short_description, 120) }}</p>
                                    <a class="theme-btn" href="{{ route('blog-details', $blog->slug) }}">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No blog posts available right now.</p>
                        </div>
                    @endforelse
                </div>

                <!-- pagination -->
                <div class="pagination-area mt-4">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
                <!-- pagination end -->
            </div>
        </div>
        <!-- blog-area end -->

    </main>
@endsection

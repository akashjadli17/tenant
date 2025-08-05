@extends('layouts.master')

@section('title', 'Tenants Management')

@section('content')
   <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">Our Blog</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.php">Home</a></li>
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
                            <span class="site-title-tagline"><i class="far fa-helmet-safety"></i> Our Blog</span>
                            <h2 class="site-title">Our Latest News & <span>Blog</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/01.jpg" alt="Thumb">
                                <div class="blog-date">
                                    <strong>20</strong>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2.5k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="{{ route('blogs')}}">There are many variations of passages orem available.</a>
                                </h4>
                                <p>
                                    It is a long established fact that a reader will majority have suffered distracted
                                    readable.
                                </p>
                                <a class="theme-btn" href="{{ route('blogs')}}">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/02.jpg" alt="Thumb">
                                <div class="blog-date">
                                    <strong>25</strong>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 1.2k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="{{ route('blogs')}}">Generator internet repeat tend word chunk necessary.</a>
                                </h4>
                                <p>
                                    It is a long established fact that a reader will majority have suffered distracted
                                    readable.
                                </p>
                                <a class="theme-btn" href="{{ route('blogs')}}">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/03.jpg" alt="Thumb">
                                <div class="blog-date">
                                    <strong>28</strong>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2.8k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="{{ route('blogs')}}">Survived only five centuries but also the leap into.</a>
                                </h4>
                                <p>
                                    It is a long established fact that a reader will majority have suffered distracted
                                    readable.
                                </p>
                                <a class="theme-btn" href="{{ route('blogs')}}">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/01.jpg" alt="Thumb">
                                <div class="blog-date">
                                    <strong>20</strong>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2.5k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="{{ route('blogs')}}">There are many variations of passages orem available.</a>
                                </h4>
                                <p>
                                    It is a long established fact that a reader will majority have suffered distracted
                                    readable.
                                </p>
                                <a class="theme-btn" href="{{ route('blogs')}}">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/02.jpg" alt="Thumb">
                                <div class="blog-date">
                                    <strong>25</strong>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 1.2k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="{{ route('blogs')}}">Generator internet repeat tend word chunk necessary.</a>
                                </h4>
                                <p>
                                    It is a long established fact that a reader will majority have suffered distracted
                                    readable.
                                </p>
                                <a class="theme-btn" href="{{ route('blogs')}}">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/03.jpg" alt="Thumb">
                                <div class="blog-date">
                                    <strong>28</strong>
                                    <span>Nov</span>
                                </div>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2.8k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="{{ route('blogs')}}">Survived only five centuries but also the leap into.</a>
                                </h4>
                                <p>
                                    It is a long established fact that a reader will majority have suffered distracted
                                    readable.
                                </p>
                                <a class="theme-btn" href="{{ route('blogs')}}">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pagination -->
                <div class="pagination-area">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- pagination end -->
            </div>
        </div>
        <!-- blog-area end -->

    </main>



@endsection


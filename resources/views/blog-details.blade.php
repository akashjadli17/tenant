@extends('layouts.master')

@section('title', $blog->title . ' | Myraluxa Aesthetic Pvt Ltd')

@section('content')

    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">Blog Single</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Blog Single</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- blog single -->
        <div class="blog-single py-120">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="blog-single-wrap">
                            <div class="blog-single-content">
                                <div class="blog-thumb-img">
                                    <img src="assets/img/blog/single.jpg" alt="thumb">
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="blog-meta-left">
                                            <ul>
                                                <li><i class="far fa-user"></i><a href="#">Jean R Gunter</a></li>
                                                <li><i class="far fa-comments"></i>3.2k Comments</li>
                                                
                                            </ul>
                                        </div>
                                        <!-- <div class="blog-meta-right">
                                            <a href="#" class="share-link"><i class="far fa-share-alt"></i>Share</a>
                                        </div> -->
                                    </div>
                                    <div class="blog-details">
                                        <h3 class="blog-details-title mb-20">It is a long established fact that a reader
                                        </h3>
                                        <p class="mb-10">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                            ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                            porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                            adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore magnam aliquam quaerat voluptatem.
                                        </p>
                                        <p class="mb-10">
                                            But I must explain to you how all this mistaken idea of denouncing pleasure
                                            and praising pain was born and I will give you a complete account of the
                                            system, and expound the actual teachings of the great explorer of the truth,
                                            the master-builder of human happiness. No one rejects, dislikes, or avoids
                                            pleasure itself, because it is pleasure, but because those who do not know
                                            how to pursue pleasure rationally encounter consequences that are extremely
                                            painful.
                                        </p>

                                        <p class="mb-20">
                                            In a free hour when our power of choice is untrammelled and when nothing
                                            prevents our being able to do what we like best, every pleasure is to be
                                            welcomed and every pain avoided. But in certain circumstances and owing to
                                            the claims of duty or the obligations of business it will frequently occur
                                            that pleasures have to be repudiated and annoyances accepted. The wise man
                                            therefore always holds in these matters to this principle of selection.
                                        </p>





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="blog-sidebar">
                            <!-- search-->
                            <div class="widget search">
                                <h5 class="widget-title">Search</h5>
                                <div class="search-form">
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search Here...">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- recent post -->
                            <div class="widget recent-post">
                                <h5 class="widget-title">Recent Post</h5>
                                <div class="recent-post-item">
                                    <div class="recent-post-img">
                                        <img src="assets/img/blog/bs-1.jpg" alt="thumb">
                                    </div>
                                    <div class="recent-post-info">
                                        <h6><a href="#">There are many variatio of passage majority.</a></h6>
                                        <span><i class="far fa-clock"></i>Nov 23, 2024</span>
                                    </div>
                                </div>
                                <div class="recent-post-item">
                                    <div class="recent-post-img">
                                        <img src="assets/img/blog/bs-2.jpg" alt="thumb">
                                    </div>
                                    <div class="recent-post-info">
                                        <h6><a href="#">There are many variatio of passage majority.</a></h6>
                                        <span><i class="far fa-clock"></i>Nov 23, 2024</span>
                                    </div>
                                </div>
                                <div class="recent-post-item">
                                    <div class="recent-post-img">
                                        <img src="assets/img/blog/bs-3.jpg" alt="thumb">
                                    </div>
                                    <div class="recent-post-info">
                                        <h6><a href="#">There are many variatio of passage majority.</a></h6>
                                        <span><i class="far fa-clock"></i>Nov 23, 2024</span>
                                    </div>
                                </div>
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
    /* max-width: 100%; */
    height: auto;
    aspect-ratio: 6 / 3;
    width: 90%;
}
</style>

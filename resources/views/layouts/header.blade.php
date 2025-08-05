 <!-- header area -->
 <header class="header">


     <!-- navbar -->
     <div class="main-navigation" id="home">
         <nav class="navbar navbar-expand-lg">
             <div class="container position-relative">
                 <a class="navbar-brand" href="/">
                     <img src="assets/img/logo/logo.png" alt="logo">
                 </a>
                 <div class="mobile-menu-right">
                     <div class="mobile-menu-btn">
                         <div class="nav-btn">
                             <a href="#" class="theme-btn"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                 Login</a>
                         </div>
                     </div>
                     <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                         data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                         aria-label="Toggle navigation">
                         <span></span>
                         <span></span>
                         <span></span>
                     </button>
                 </div>
                 <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                     aria-labelledby="offcanvasNavbarLabel">
                     <div class="offcanvas-header">
                         <a href="/" class="offcanvas-brand" id="offcanvasNavbarLabel">
                             <img src="assets/img/logo/logo.png" alt="">
                         </a>
                         <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                                 class="far fa-xmark"></i></button>
                     </div>
                     <div class="offcanvas-body gap-xl-4">
                         <ul class="navbar-nav justify-content-end flex-grow-1">
                             <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                             <li class="nav-item"><a class="nav-link" href="{{ route('frontPackages') }}">Packages</a></li>
                             <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                             <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                         </ul>

                         <!-- nav-right -->
                         <div class="nav-right">

                             <div class="nav-btn">
                                 <a href="{{ route('login') }}" class="theme-btn"><i
                                         class="fa-solid fa-arrow-right-to-bracket"></i>
                                     Login</a>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </nav>
     </div>
     <!-- navbar end-->



 </header>
 <!-- header area end -->


 <!-- popup search -->
 <div class="search-popup">
     <button class="close-search"><span class="far fa-times"></span></button>
     <form action="#">
         <div class="form-group">
             <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
             <button type="submit"><i class="far fa-search"></i></button>
         </div>
     </form>
 </div>
 <!-- popup search end -->

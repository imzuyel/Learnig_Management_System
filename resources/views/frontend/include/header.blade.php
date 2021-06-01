     <!-- Start Header Top 
    ============================================= -->
     <div class="top-bar-area address-two-lines bg-dark text-light">
         <div class="container">
             <div class="row">
                 <div class="col-md-8 address-info">
                     <div class="info box">
                         <ul>
                             <li>
                                 <span><i class="fas fa-map"></i> Address</span>{{ $setting->address }}
                             </li>
                             <li>
                                 <span><i class="fas fa-envelope-open"></i> Email</span>{{ $setting->email }}
                             </li>
                             <li>
                                 <span><i class="fas fa-phone"></i> Contact</span>{{ $setting->phone }}
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="user-login text-right col-md-4">
                     <a class="popup-with-form" href="#register-form">
                         <i class="fas fa-edit"></i> Register
                     </a>
                     <a class="popup-with-form" href="#login-form">
                         <i class="fas fa-user"></i> Login
                     </a>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Header Top -->



     <header id="home">

         <!-- Start Navigation -->
         <nav class="navbar navbar-default attr-border navbar-sticky bootsnav">

             <!-- Start Top Search -->
             <div class="container">
                 <div class="row">
                     <div class="top-search">
                         <div class="input-group">
                             <form action="#">
                                 <input type="text" name="text" class="form-control" placeholder="Search">
                                 <button type="submit">
                                     <i class="fas fa-search"></i>
                                 </button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- End Top Search -->

             <div class="container">

                 <!-- Start Atribute Navigation -->
                 <div class="attr-nav">
                     <ul>
                         <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                         <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                     </ul>
                 </div>
                 <!-- End Atribute Navigation -->

                 <!-- Start Header Navigation -->
                 <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                         <i class="fa fa-bars"></i>
                     </button>
                     <a class="navbar-brand" href="{{ route('frontend.index') }}">
                         <img src="{{ asset('/').$setting->logo }}"  class="logo" alt="Logo">
                     </a>
                 </div>
                 <!-- End Header Navigation -->

                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse" id="navbar-menu">
                     <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                         <li class="dropdown {{ Request::is('/') ? 'active' : '' }}">
                             <a href="{{ route('frontend.index') }}">Home</a>

                         </li>
                         <li class="dropdown megamenu-fw">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category</a>
                             <ul class="dropdown-menu megamenu-content" role="menu">
                                 <li>
                                     <div class="row">
                                         @foreach ($categories as $category)
                                         <div class="col-menu col-md-3">
                                            <h6 class="title" style="margin-bottom: 0px;">&#9672;{{ $category->category_name }}</h6>
                                            @if (!empty($category->subCategories))
                                             <div class="content">
                                                 <ul class="menu-col">
                                                     @foreach ($category->subCategories as $subcategory)
                                                          <li ><a href="" style="padding: 0px;color: rgb(121, 14, 14)">&nbsp;&nbsp;&#10146;&nbsp;{{ $subcategory->category_name }}</a></li>
                                                         
                                                     @endforeach
                                                 </ul>
                                             </div>
                                              @endif
                                         </div>
                                       
                                        @endforeach
                                          <hr>
                                     </div>
                                     <!-- end row -->
                                 </li>
                             </ul>
                         </li>
                          <li>
                             <a href="http://imzuyel.xyz/" target="_blanck">About</a>
                         </li>
                         <li class="{{ Request::is('contact') ? 'active' : '' }}">
                             <a href="{{ route('contact.create') }}">contact</a>
                         </li>
                     </ul>
                 </div>
                 <!-- /.navbar-collapse -->
             </div>


             <!-- Start Side Menu -->
             <div class="side">
                 <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                 <div class="widget">
                     <h4 class="title">Users Pages</h4>

                     <ul style="z-index: 20;">
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>
                         <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Event <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                                 <li>
                                     <a href="">Contact</a>
                                 </li>
                             </ul>
                         </li>
                         <hr>

                     </ul>
                 </div>


             </div>
             <!-- End Side Menu -->


         </nav>
         <!-- End Navigation -->

     </header>

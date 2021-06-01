 <div id="top-categories" class="top-cat-area default-padding bottom-less">
   
     <div class="container">
         <div class="row">
             <div class="site-heading text-center">
                 <div class="col-md-8 col-md-offset-2">
                     <h2>Top Categories</h2>
                     <p>That all the top category. You can browse this category and can read blog.</p>
                 </div>
             </div>
         </div>
         <div class="row">
                 @foreach ($mainCategories as $maincategory)
             <div class="top-cat-items">
             
                 <div class="col-md-3 col-sm-6 equal-height p-2">
                     <div class="item" style="background-image: url({{ asset('/').$maincategory->category_image }});">
                         <a href="#">
                             <i class="{{ $maincategory->icon }}"></i>
                             <div class="info">
                                 <h4>{{ $maincategory->category_name }}</h4>
                                 <span>({{ count($maincategory->posts) }}) Topics</span>
                             </div>
                         </a>
                     </div>
                 </div>
                 
             </div> @endforeach
         </div>
     </div>
 </div>

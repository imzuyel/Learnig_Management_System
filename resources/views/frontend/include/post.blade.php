<div class="popular-courses circle bg-gray carousel-shadow default-padding">
    <div class="container">
        <div class="row">
            <div class="site-heading text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h2>Popular Post</h2>
                    <p>That is very popular post in this website. You can try to browse this blog to know more. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="popular-courses-items popular-courses-carousel owl-carousel owl-theme">
                    @foreach ($popularPosts as $popularpost)
                        <div class="item  box glowing" >
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ asset('').$popularpost->image }}" alt="Thumb">
                                </a>
                            </div>
                            <div class="info">
                                <h4><a href="#">{{ $popularpost->title }}</a></h4>
                                <p>{!! Str::limit($popularpost->body,30) !!}</p>
                                <div class="bottom-info">
                                    <ul>
                                        <li>
                                            <i class="fas fa-user"></i> {{ $popularpost->username->name }}
                                        </li>
                                    </ul>
                                    <a href="#">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
               
                </div>
            </div>
        </div>
    </div>
</div>

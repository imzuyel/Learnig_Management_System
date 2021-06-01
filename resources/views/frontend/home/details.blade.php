@push('css') 
@endpush
@extends('frontend.master')
@section('content')
    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog standard single-blog full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-10 col-md-offset-1">
                        <div class="item-box">
                            <div class="item">
                                <div class="thumb">
                                    <a href="#"><img src="{{ asset('/') }}frontend/assets/img/blog/4.jpg" alt="Thumb"></a>
                                    <div class="date">
                                        <h4><span>24</span> Nov, 2018</h4>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>
                                        Now eldest new tastes plenty mother called misery get
                                    </h3>
                                    <div class="meta">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-user"></i> Author</a></li>
                                            <li><a href="#"><i class="fas fa-comments"></i> 5 Comments</a></li>
                                        </ul>
                                        <div class="share">
                                            <i class="fas fa-share-alt"></i>
                                            <ul>
                                                <li class="facebook">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li class="twitter">
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li class="pinterest">
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                </li>
                                                <li class="dribbble">
                                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>
                                        Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no
                                        meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported
                                        yet her.
                                    </p>
                                    <p>
                                        New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side
                                        in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.
                                    </p>
                                    <blockquote>
                                        He share of first to worse. Weddings and any opinions suitable smallest nay. Houses or months settle remove ladies appear. Engrossed suffering supposing he recommend do eagerness. Commanded no of depending extremity recommend
                                    </blockquote>
                                    <p>
                                        Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited six talked pulled you. Conduct replied off led whether any shortly why arrived adapted. Numerous ladyship so raillery humoured goodness
                                        received an. So narrow formal length my highly longer afford oh. Tall neat he make or at dull ye.
                                    </p>
                                </div>
                                <div class="post-pagi-area">
                                    <a href="#"><i class="fas fa-angle-double-left"></i> Previus Post</a>
                                    <a href="#">Next Post <i class="fas fa-angle-double-right"></i></a>
                                </div>
                                <div class="post-tags">
                                    <span>Tags: </span>
                                    <a href="#">Consulting</a>
                                    <a href="#">Planing</a>
                                    <a href="#">Business</a>
                                    <a href="#">Fashion</a>
                                </div>
                                <div class="author-bio">
                                    <div class="avatar">
                                        <img src="{{ asset('/') }}frontend/assets/img/team/8.jpg" alt="Author">
                                    </div>
                                    <div class="content">
                                        <p>
                                            Supply as so period it enough income he genius. Themselves acceptance bed sympathize get dissimilar way admiration son. Design for are edward regret met lovers. This are calm case roof and.

                                        </p>
                                        <h4> - Jonkey Rotham</h4>
                                    </div>
                                </div>
                                <div class="comments-area">
                                    <div class="comments-title">
                                        <h4>
                                            5 comments
                                        </h4>
                                        <div class="comments-list">
                                            <div class="commen-item">
                                                <div class="avatar">
                                                    <img src="{{ asset('/') }}frontend/assets/img/team/4.jpg" alt="Author">
                                                </div>
                                                <div class="content">
                                                    <h5>Jonathom Doe</h5>
                                                    <div class="comments-info">
                                                        July 15, 2018 <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>
                                                        Delivered ye sportsmen zealously arranging frankness estimable as. Nay any article enabled musical shyness yet sixteen yet blushes. Entire its the did figure wonder off.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="commen-item reply">
                                                <div class="avatar">
                                                    <img src="{{ asset('/') }}frontend/assets/img/team/5.jpg" alt="Author">
                                                </div>
                                                <div class="content">
                                                    <h5>Spark Lee</h5>
                                                    <div class="comments-info">
                                                        July 15, 2018 <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>
                                                        Delivered ye sportsmen zealously arranging frankness estimable as. Nay any article enabled musical shyness yet sixteen yet blushes. Entire its the did figure wonder off.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comments-form">
                                        <div class="title">
                                            <h4>Leave a comments</h4>
                                        </div>
                                        <form action="#" class="contact-comments">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- Name -->
                                                        <input name="name" class="form-control" placeholder="Name *" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- Email -->
                                                        <input name="email" class="form-control" placeholder="Email *" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group comments">
                                                        <!-- Comment -->
                                                        <textarea class="form-control" placeholder="Comment"></textarea>
                                                    </div>
                                                    <div class="form-group full-width submit">
                                                        <button type="submit">
                                                            Post Comments
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endpush
@extends('frontend.master')
@section('content')
    <img class="centered" src="{{ asset('images/ajax-loader.gif') }}" alt="">
    <!-- Start Banner 
        ============================================= -->
    @include('frontend.include.banner')
    <!-- End Banner -->

    <!-- Start About 
        ============================================= -->
    @include('frontend.include.about')
    <!-- End About -->


    <!-- Start Popular Courses 
             ============================================= -->
    @include('frontend.include.post')

    <!-- End Popular Courses -->

    <!-- Start Top Categories 
        ============================================= -->
    @include('frontend.include.category')

    <!-- End Top Categories -->

    <!-- Start Fun Factor 
        ============================================= -->
    @include('frontend.include.fun')
    <!-- End Fun Factor -->

    <!-- Start Event
        ============================================= -->
    @include('frontend.include.event')

    <!-- End Event -->

    <!-- Start Video Area
        ============================================= -->
    @include('frontend.include.video')

    <!-- End Video Area -->

    <!-- Start Blog 
        ============================================= -->
    @include('frontend.include.blog')

    <!-- End Blog -->

    <!-- Start Testimonials 
        ============================================= -->
    @include('frontend.include.testimonial')
    <!-- End Testimonials -->

    <!-- Start Registration 
        ============================================= -->
    @include('frontend.include.contact')
    <!-- End Registration -->

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endpush

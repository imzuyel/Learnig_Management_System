@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endpush
@extends('frontend.master')
@section('content')
    <img class="centered" src="{{ asset('images/ajax-loader.gif') }}" alt="">
    <!-- Start Contact 
        ============================================= -->
    @include('frontend.include.contact')
    <!-- End Contact -->

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endpush

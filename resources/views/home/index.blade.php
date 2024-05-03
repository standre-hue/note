@extends('home.layout')

@section('content')

 <!-- ***** Main Banner Area Start ***** -->
 @if (count($schools) >= 5)
 <div class="main-banner" id="top">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-6">
                 <div class="left-content">
                     <div class="thumb">
                         <div class="inner-content">
                             <h4>We Are Hexashop</h4>
                             <span>Awesome, clean &amp; creative HTML5 Template</span>
                             <div class="main-border-button">
                                 <a href="#">Purchase Now!</a>
                             </div>
                         </div>
                         <img src="assets/images/left-banner-image.jpg" alt="">
                     </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="right-content">
                     <div class="row">
                         <div class="col-lg-6">
                             <div class="right-first-image">
                                 <div class="thumb">
                                     <div class="inner-content">
                                         <h4>Women</h4>
                                         <span>Best Clothes For Women</span>
                                     </div>
                                     <div class="hover-content">
                                         <div class="inner">
                                             <h4>Women</h4>
                                             <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                             <div class="main-border-button">
                                                 <a href="#">Discover More</a>
                                             </div>
                                         </div>
                                     </div>
                                     <img src="assets/images/baner-right-image-01.jpg">
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="right-first-image">
                                 <div class="thumb">
                                     <div class="inner-content">
                                         <h4>Men</h4>
                                         <span>Best Clothes For Men</span>
                                     </div>
                                     <div class="hover-content">
                                         <div class="inner">
                                             <h4>Men</h4>
                                             <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                             <div class="main-border-button">
                                                 <a href="#">Discover More</a>
                                             </div>
                                         </div>
                                     </div>
                                     <img src="assets/images/baner-right-image-02.jpg">
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="right-first-image">
                                 <div class="thumb">
                                     <div class="inner-content">
                                         <h4>Kids</h4>
                                         <span>Best Clothes For Kids</span>
                                     </div>
                                     <div class="hover-content">
                                         <div class="inner">
                                             <h4>Kids</h4>
                                             <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                             <div class="main-border-button">
                                                 <a href="#">Discover More</a>
                                             </div>
                                         </div>
                                     </div>
                                     <img src="assets/images/baner-right-image-03.jpg">
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="right-first-image">
                                 <div class="thumb">
                                     <div class="inner-content">
                                         <h4>Accessories</h4>
                                         <span>Best Trend Accessories</span>
                                     </div>
                                     <div class="hover-content">
                                         <div class="inner">
                                             <h4>Accessories</h4>
                                             <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                             <div class="main-border-button">
                                                 <a href="#">Discover More</a>
                                             </div>
                                         </div>
                                     </div>
                                     <img src="assets/images/baner-right-image-04.jpg">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endif

 <!-- ***** Main Banner Area End ***** -->
        <!-- ***** Men Area Starts ***** -->
        <section class="section" id="men">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>Men's Latest</h2>
                            <span>Details to details is what makes Hexashop different from the other themes.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="" style="flex-wrap:wrap; display: flex; ">
                                @foreach ($schools as $key => $school)
                                <div class="item" style="width:350px; border:0px solid red; margin-right:20px">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                                <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <img src="{{ $school->images()->first()->path  ?? "" }}" style="background-size: cover; overflow: hidden;width:100%; height:400px" alt="">
                                    </div>
                                    <div class="down-content " style="display: flex; justify-content:space-between">
                                        <h4 style="height:50px"> {{ $school->name }} </h4>
                                        <!--<div class="" style="display: flex">
                                            <h5>{{ $key + 1 }}</h5>
                                            <div style="width:20px"></div>
                                            <h5>{{ $school->average }}/10</h5>
                                        </div> -->
                                    </div>
                                    <a href="/detail_school/{{$school->id}}">
                                        <button class="btn btn-primary px-3 text-center w-100">
                                            Plus
                                        </button>
                                    </a>
                                </div>
                                @endforeach

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Men Area Ends ***** -->
    

    
        
@endsection
<footer class="footer" >
    <div class="footer_top div_bg" style="background: url({{asset('assets/images/footer_bg.png')}});">
        <div class="container">
            <div class="row">
                @isset($ouraddress)
            <div class="col-lg-4 col-sm-12 widget widget-1">
                <h4>about</h4>
                <div class="about_content content">
                    @if(isset($ouraddress->description))
                    <p>{{$ouraddress->description}}</p>
                    @endif
                    <p> <i class="fa fa-map-marker-alt"></i> {{$ouraddress ? $ouraddress->location : ''}}</p>
                    <p> <i class="fa fa-envelope"></i>{{$ouraddress ? $ouraddress->email : ''}}</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i>{{$ouraddress ? $ouraddress->phone : ''}}</p>
                </div>
            </div>
           @endisset
           <div class="col-lg-4 col-sm-12 widget widget-2">
                <h4>newsletter</h4>
                <div class="newsletter_content content">
                    <p>Lorem ipsum dolor sit amet, ei ubique fastidii vim. Elitr feugait complectitur eu pro, sea audire ponderum eleifend cu.sign up for our mailing list to get latest updates and offers</p>
                    <form class="form clearfix">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control outline-none" placeholder="Enter Your Email" aria-label="Enter Your Email" aria-describedby="basic-addon2">
                    <button type="submit" onclick="return false" class="input-group-text" id="basic-addon2" name=""><i class="fa fa-long-arrow-alt-right"></i></button>
                    </div>
                    </form>
                    @if (isset($ouraddress))
                       <div class="foot_social clearfix">
                        <ul class="list-inline list-unstyled">
                            @if (isset($ouraddress->facebook))
                                <li class="list-inline-item"><a href="{{$ouraddress->facebook}}"><i class="fab fa-facebook-f"></i></a></li>  
                            @endif

                            @if (isset($ouraddress->twitter))
                               <li class="list-inline-item"><a href="{{$ouraddress->twitter}}"><i class="fab fa-twitter"></i></a></li> 
                            @endif

                            @if (isset($ouraddress->linkin))
                                <li class="list-inline-item"><a href="{{$ouraddress->linkin}}"><i class="fab fa-linkedin-in"></i></a></li>  
                            @endif

                            @if (isset($ouraddress->instagram))
                                <li class="list-inline-item"><a href="{{$ouraddress->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            @endif

                            @if (isset($ouraddress->youtube))
                               <li class="list-inline-item"><a href="{{$ouraddress->youtube}}"><i class="fab fa-youtube"></a></i></li>      
                            @endif
                            
                        </ul>
                    </div> <!-- end foot social --> 
                    @endif
                </div><!-- end newsletter_content -->
            </div><!-- end widget-2 -->
            <div class="col-lg-4 col-sm-12 widget widget-3">
            <h4>FLICKR PHOTOS</h4>
            <div class="about_content content">
            <div class="row flicker_box cleafix">
            <div class="col-lg-4 col-md-4 col-sm-3 flicker_item"><a href="{{asset('assets/images/flic1B.png')}}"><img src="{{asset('assets/images/flic1.png')}}" alt=""></a></div>
            <div class="col-lg-4 col-md-4 col-sm-3 flicker_item"><a href="{{asset('assets/images/flic2B.png')}}"><img src="{{asset('assets/images/flic2.png')}}" alt=""></a></div>
            <div class="col-lg-4 col-md-4 col-sm-3 flicker_item"><a href="{{asset('assets/images/flic3B.png')}}"><img src="{{asset('assets/images/flic3.png')}}" alt=""></a></div>
            <div class="col-lg-4 col-md-4 col-sm-3 flicker_item"><a href="{{asset('assets/images/flic3B.png')}}"><img src="{{asset('assets/images/flic3.png')}}" alt=""></a></div>
            <div class="col-lg-4 col-md-4 col-sm-3 flicker_item"><a href="{{asset('assets/images/flic5B.png')}}"><img src="{{asset('assets/images/flic5.png')}}" alt=""></a></div>
            <div class="col-lg-4 col-md-4 col-sm-3 flicker_item"><a href="{{asset('assets/images/flic6B.png')}}"><img src="{{asset('assets/images/flic6.png')}}" alt=""></a></div>
            </div>
            </div>
            </div> <!-- end widget 3-->
            </div> <!-- end Row-->
        </div><!-- end Cointainer-->
    </div><!-- end footer_top-->
    <div class="footer_copyright text-center">
        <div class="container">
            <div class="col-lg-12 col-sm-12">
                <p><a href="#">Shoron </a></p>
            </div>
        </div>
    </div>
</footer>
<!-- Jquery -->
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Breadcrumbs JS -->
<script src="{{asset('assets/js/breadcrumbs.min.js')}}"></script>
@if (Request::is('/') || Request::is('schedule'))
    <!-- isotope JS -->
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- lightbox JS -->
<script src="{{asset('assets/js/lightbox.min.js')}}"></script>
@endif


<!-- Owl Carousle JS -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Fontawesome JS -->
{{-- <script src="{{asset('assets/js/all.min.js')}}"></script> --}}
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script type="text/javascript">
</script>
</body>
</html>
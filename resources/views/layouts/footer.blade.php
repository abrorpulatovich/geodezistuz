<!--Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="widget">
                        <div class="footer-logo"><img src="assets/img/logo3_foot.png" alt=""></div>
                        <div class="textwidget">
                            <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper.</p>
                        </div>
                        <ul class="mt-3 footer-social">
                            <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                            <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Havolalar</h3>
                        <ul class="menu">
                            <li><a href="{{ route('home') }}">Bosh sahifa</a></li>
                            <li><a href="{{ route('news') }}">Yangiliklar</a></li>
                            <li><a href="{{ route('rezumes') }}">Rezumelar</a></li>
                            <li><a href="{{ route('vacancies') }}">Vakansiyalar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">So'ngi yangiliklar</h3>
                        <ul class="menu">
                            @foreach($latest_news as $new)
                                <li><a href="{{ route('news_details', ['slug' => $new->slug])  }}"><i class="lni lni-arrow-right"></i> {{ $new->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Biz bilan bog'lanish</h3>
                        <ul class="contact-list">
                            <li><i class="lni-phone-handset"></i> <span>+880- 123-456-789 <br> +880- 123-456-789 </span></li>
                            <li><i class="lni-envelope"></i> <span>contact@shopr.com  info@shopr.com</span></li>
                            <li><i class="lni-map-marker"></i> <span>9923 South Avenue Street,  New York City.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

    <!-- Copyright Start  -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info text-center">
                        <p>Developed by <a href="https://khantech.uz" target="_blank" rel="nofollow">Abror Pulatovich</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
</footer>
<!-- Footer Section End -->

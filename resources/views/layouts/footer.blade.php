<footer>
  <!-- Footer Area Start -->
  <section class="footer-Content">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12">
          <div class="widget">
            <div class="footer-logo"><img src="assets/img/logo3_foot.png" alt=""></div>
            <div class="textwidget">
              <p>Geodeziya haqida ma‘lumot</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-4 col-xs-12">
          <div class="widget">
            <h3 class="block-title">Menu</h3>
            <ul class="menu">
              <li><a href="{{ route('template.index') }}">Bosh sahifa</a></li>
              <li><a href="#">Yangiliklar</a></li>
              <li><a href="{{ route('rezumes.create') }}">Rezumelar</a></li>
              <li><a href="{{ route('vacancies.index') }}">Vakansiyalar</a></li>
            </ul>
            <ul class="menu">
              <li><a href="#">Kitoblar</a></li>
              <li><a href="#">Dasturlar</a></li>
              <li><a href="#">Videolar</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-12">
          <div class="widget">
            <h3 class="block-title">Hoziroq obuna bo‘ling</h3>
            <p></p> 
            <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
              <div class="form-group is-empty">
                <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Email..." required="">
                <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
                <div class="clearfix"></div>
              </div>
            </form>
            <ul class="mt-3 footer-social">
              <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
              <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
              <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
              <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
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
            <p>Developed by <a href="https://uideck.com" rel="nofollow">Ellips Consulting Group</a></p>
          </div>     
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright End -->
</footer>
<!-- Footer Section End -->  

<!-- jQuery first, then Tether, then Bootstrap JS.
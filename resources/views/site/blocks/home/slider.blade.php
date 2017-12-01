<div id="top-slider-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-md-8 wow bounceInUp animated">
        <div class="left-banner">
          <div class="slider-items-products">
            <div id="home-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col1"> 
                @foreach($slider_left as $slider)
                <div class="item"> 
                  <a href="{{ $slider->lienket }}">
                    <img alt="" src="{{ asset('uploads/banner/' . $slider->hinhanh) }}">
                  </a>
                </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
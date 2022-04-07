@extends('layouts.master')

@section('content')
<section class="section section-lg section-main-bunner section-main-bunner-filter text-center">

<!---cover image--->
  <div class="main-bunner-img" style="background-image: url('{{asset('assets/images/cover.jpg')}}'); background-size: cover;"></div>
  <div class="main-bunner-inner">
    <div class="container">
      <div class="box-default">
        <h1 class="box-default-title">Welcome</h1>
        <div class="box-default-decor"></div>
        <p class="big box-default-text">Our website offers full-service dining or home delivery , seen from our indoor covered patio and our outdoor sundeck.</p>
      </div>
    </div>
  </div>
</section>
<div class="bg-gray-1">
  <section class="section-transform-top">
    <div class="container">
      <div class="box-booking">
        <form style="display:flex;align-items: center;" class="" method="POST" action="{{ route('order' ) }}" >
            @csrf
          <!-- <div>
            <p class="booking-title">Your Name</p>
            <div class="form-wrap">
              <input class="form-input" id="booking-name" type="text" name="name" data-constraints="@Required">
              <label class="form-label" for="booking-name"></label>
            </div>
          </div>
          <div>
            <p class="booking-title">Phone</p>
            <div class="form-wrap">
              <input class="form-input" id="booking-phone" type="text" name="phone" data-constraints="@Numeric">
              <label class="form-label" for="booking-phone">Your phone number</label>
            </div>
          </div>
          <div>
            <p class="booking-title">Date</p>
            <div class="form-wrap form-wrap-icon"><span class="icon mdi mdi-calendar-text"></span>
              <input class="form-input" id="booking-date" type="text" name="date" data-constraints="@Required" data-time-picker="date">
            </div>
          </div> -->
          <div>
            <p class="booking-title">Select Restaurant</p>
            <div class="form-wrap">
              <select name="res_id" >
                @foreach($res as $value)

                <option value="{{ $value->id }}">{{ $value->name }}</option>
                <!-- <option>Melting Moment</option>
                <option>Cafe Eamy</option>
                <option>Code 3</option>
                <option>Hungry Heros</option>
                <option>Calyto</option>
                <option>Master Chef</option> -->
                @endforeach
              </select>
            </div>
          </div>
          <div style="margin-left: 20px;">

            <button class="button button-lg button-gray-600" type="submit">Check Menu</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <section class="section section-lg section-inset-1 bg-gray-1 pt-lg-0">
    <div class="container">
      <div class="row row-50 justify-content-xl-between align-items-lg-center">
        <div class="col-lg-6 wow fadeInLeft">
          <div class="box-image"><img class="box-image-static" src="{{asset('assets/images/about.jpg')}}" alt="" width="483" height="327"/>
          </div>
        </div>
        <div class="col-lg-6 col-xl-5 wow fadeInRight">
          <h2>About Us</h2>
          <p>It is a family owned and operated Bangladeshi Service which is a combination of fresh ingredients and authentic Bangladeshi Resturants.</p>
          <p>We will make sure you are served the most authentic and fresh Bangladeshi dishes, while offering the best customer service. Our kitchen is committed to providing our guests with the best Bangladeshi Cuisine.</p>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Featured Offers-->
<section class="section section-lg bg-default">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-9 col-lg-7 wow-outer">
        <div class="wow slideInDown">
          <h2>Featured Offers</h2>
          <p class="text-opacity-80">We offer a great variety of  the best Bangladeshi Resturants to our visitors and guests. Below are some of our most popular main dishes and desserts.</p>
        </div>
      </div>
    </div>
    <div class="row row-20 row-lg-30">
      <div class="col-md-6 col-lg-4 wow-outer">
        <div class="wow fadeInUp">
          <div class="product-featured">
            <div class="product-featured-figure"><img src="{{asset('assets/images/r1.jpg')}}" alt="" width="370" height="395"/>
              <div class="product-featured-button"><a class="button button-primary" href="{{ route('order.page',['res_id'=>3]) }}">order now</a></div>
            </div>
            <div class="product-featured-caption">
              <h4><a class="product-featured-title" href="{{ route('order.page',['res_id'=>3]) }}">Master Chef</a></h4>

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow-outer">
        <div class="wow fadeInUp">
          <div class="product-featured">
            <div class="product-featured-figure"><img src="{{asset('assets/images/r2i.jpg')}}" alt="" width="370" height="395"/>
              <div class="product-featured-button"><a class="button button-primary" href="{{ route('order.page',['res_id'=>1]) }}">order now</a></div>
            </div>
            <div class="product-featured-caption">
              <h4><a class="product-featured-title" href="{{ route('order.page',['res_id'=>1]) }}">Cafe Eammy</a></h4>

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow-outer">
        <div class="wow fadeInUp">
          <div class="product-featured">
            <div class="product-featured-figure"><img src="{{asset('assets/images/r3.jpg')}}" alt="" width="370" height="395"/>
              <div class="product-featured-button"><a class="button button-primary" href="{{ route('order.page',['res_id'=>5]) }}">order now</a></div>
            </div>
            <div class="product-featured-caption">
              <h4><a class="product-featured-title" href="{{ route('order.page',['res_id'=>5]) }}">Code 3</a></h4>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

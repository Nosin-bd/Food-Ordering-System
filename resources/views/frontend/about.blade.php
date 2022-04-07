@extends('layouts.master')
@section('content')
<section class="parallax-container overlay-1" data-parallax-img="{{asset('assets/images/aboutcover.jpg')}}">
        <div class="parallax-content breadcrumbs-custom context-dark"> 
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">About Us</h2>
               
            
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-gray-1">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6 pr-xl-5"><img src="{{asset('assets/images/aboutcover2.jpg')}}" alt="" width="518" height="434"/>
            </div>
            <div class="col-lg-6">
              <h2>About Our Restaurant</h2>
              <div class="text-with-divider">
                <div class="divider"></div>
                <h4>We offer the best Resturants in a friendly and calm atmosphere.</h4>
              </div>
              <p>Getting food from home is much important & effective way now a days. In pandamic we realize that food is much important & sometimes we can not go out for haveing that. In this case our website will much helpfull tlo get food and save the order details.</p>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-white">
        <div class="container">
          <h2 class="text-center">Why People Choose Us</h2>
          <div class="row row-30 row-md-60">
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-triangle"><span class="icon-xl restaurant-icon-30"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Friendly Team</a></h4>
                  <p>Morbi tristique senectus et netus et malesuada fames ac turpis.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-circle"><span class="icon-xl restaurant-icon-11"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Fresh Food</a></h4>
                  <p>Cum resistentia mori, omnes elevatuses imperium plac.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-rectangle"><span class="icon-xl restaurant-icon-36"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Quality Cuisine</a></h4>
                  <p>Cum consilium accelerare, omnes absolutioes quaestio fatalis.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-circle"><span class="icon-xl restaurant-icon-27"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Best Service</a></h4>
                  <p>Cum onus studere, omnes consiliumes amor plac.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-triangle"><span class="icon-xl restaurant-icon-34"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Diverse Menu</a></h4>
                  <p>Cum demolitione persuadere, omnes devatioes captis.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="box-icon-modern">
                <div class="box-icon-inner decorate-rectangle"><span class="icon-xl restaurant-icon-26"></span></div>
                <div class="box-icon-caption">
                  <h4><a href="#">Affordable Prices</a></h4>
                  <p>Mirabilis, gratis devatios mechanice contactus de neuter, primus vigil.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

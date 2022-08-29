@extends('layouts.frontend.app')
@section('title','home -')
@section('content')
  <!-- ======= Header ======= -->
  @include('layouts.frontend.header')
  <!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
     @forelse (sliders() as $slider)
     <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">{{$slider->slider_title}}</h2>
          <p data-aos="fade-up" data-aos-delay="100">{{$slider->slider_description}}</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="{{Storage::disk('public')->url('slider_image/'. $slider->slider_image)}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
     @empty
     <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h2>
          <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="{{asset('frontend/assets')}}/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
     @endforelse
    </div>
  </section><!-- End Hero Section -->


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        @forelse (aboutshows() as $about)
        <div class="row gy-4">
            <div class="col-lg-7 position-relative about-img" style="background-image: url({{Storage::disk('public')->url('about_image/'. $about->about_image)}}) ;" data-aos="fade-up" data-aos-delay="150">
              <div class="call-us position-absolute">
                <h4>Book a Table</h4>
                <p>{{book_a_tabel_number()->setting_value}}</p>
              </div>
            </div>
            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
              <div class="content ps-0 ps-lg-5">
                <p class="fst-italic">
                 {{$about->about_description}}
                </p>


                <div class="position-relative mt-4">
                  <img src="{{Storage::disk('public')->url('about_image/youtube_video_backgroud_img/'. $about->about_youtube_video_backgroud_img)}}" class="img-fluid" alt="">
                   @if (isset($about->about_youtube_video_url))

                   <a href="{{$about->about_youtube_video_url }}" class="glightbox play-btn"></a>
                   @endif
                </div>
              </div>
            </div>
          </div>
        @empty
        <div class="row gy-4">
            <div class="col-lg-7 position-relative about-img" style="background-image: url({{asset('frontend/assets')}}/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
              <div class="call-us position-absolute">
                <h4>Book a Table</h4>
                <p>{{book_a_tabel_number()->setting_value}}</p>
              </div>
            </div>
            <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
              <div class="content ps-0 ps-lg-5">
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>


                <div class="position-relative mt-4">
                  <img src="{{asset('frontend/assets')}}/img/about-2.jpg" class="img-fluid" alt="">
                  <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                </div>
              </div>
            </div>
          </div>
        @endforelse

      </div>
    </section><!-- End About Section -->





    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Starters</h4>
            </a>
          </li><!-- End tab nav item -->



         @foreach (categories() as $category)
         <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-{{$category->id}}">
              <h4>{{$category->name}}</h4>
            </a>
          </li>
         @endforeach<!-- End tab nav item -->



        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Starters</h3>
            </div>

            <div class="row gy-5">
                @forelse (foods() as $food)
                <div class="col-lg-4 menu-item">
                <a href="{{Storage::disk('public')->url('food_image/'. $food->food_image)}}" class="glightbox"><img src="{{Storage::disk('public')->url('food_image/'. $food->food_image)}}" class="menu-img img-fluid" alt=""></a>
                <h4>{{$food->food_name}}</h4>
                <p class="price">
                    ${{$food->food_price}}
                </p>
                </div><!-- Menu Item -->
                @empty
                <div class="col-lg-4 menu-item">
                    <a href="{{asset('frontend/assets')}}/img/menu/menu-item-2.png" class="glightbox"><img src="{{asset('frontend/assets')}}/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
                    <h4>Aut Luia</h4>
                    <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                    </p>
                    <p class="price">
                    $14.95
                    </p>
                </div><!-- Menu Item -->

                <div class="col-lg-4 menu-item">
                    <a href="{{asset('frontend/assets')}}/img/menu/menu-item-3.png" class="glightbox"><img src="{{asset('frontend/assets')}}/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
                    <h4>Est Eligendi</h4>
                    <p class="ingredients">
                    Lorem, deren, trataro, filede, nerada
                    </p>
                    <p class="price">
                    $8.95
                    </p>
                </div><!-- Menu Item -->
                @endforelse

            </div>
          </div><!-- End Starter Menu Content -->
          @foreach (categories() as $category)
          <div class="tab-pane fade" id="menu-{{$category->id}}">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>{{$category->name}}</h3>
            </div>

            <div class="row gy-5">

                @forelse (categorywisefoods($category->id) as $food)
                <div class="col-lg-4 menu-item">
                <a href="{{Storage::disk('public')->url('food_image/'. $food->food_image)}}" class="glightbox"><img src="{{Storage::disk('public')->url('food_image/'. $food->food_image)}}" class="menu-img img-fluid" alt=""></a>
                <h4>{{$food->food_name}}</h4>
                <p class="price">
                    ${{$food->food_price}}
                </p>
                </div><!-- Menu Item -->
                @empty
                <div class="col-lg-4 menu-item">
                   <div class="alert alert-danger">Empty</div>
                </div><!-- Menu Item -->


                @endforelse

            </div>
          </div><!-- End Breakfast Menu Content -->
          @endforeach
        </div>

      </div>
    </section><!-- End Menu Section -->



    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Chefs</h2>
          <p>Our <span>Proffesional</span> Chefs</p>
        </div>

        <div class="row gy-4">

         @forelse (chefs() as $chef)
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
              <div class="member-img">
                <img src="{{Storage::disk('public')->url('chef_image/'. $chef->chef_image)}}" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>{{$chef->chef_name}}</h4>
                <span>{{$chef->chef_title}}</span>
                <p>{{$chef->chef_description}}</p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
         @empty
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
              <div class="member-img">
                <img src="{{asset('frontend/assets')}}/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Master Chef</span>
                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
         @endforelse


        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Book A Table</h2>
          <p>Book <span>Your Stay</span> With Us</p>
        </div>

        <div class="row g-0">

          <div class="col-lg-4 reservation-img" style="background-image: url({{asset('frontend/assets')}}/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

          <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
            <form action="{{route('booktable')}}" method="post" role="form" class="p-5">
                @csrf
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center mt-2"><button type="submit">Book a Table</button></div>
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @forelse (gallerys() as $gallery)
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{Storage::disk('public')->url('gallery_image/thumnail/'.$gallery->gallery_image) }}"><img src="{{Storage::disk('public')->url('gallery_image/'.$gallery->gallery_image) }}" class="img-fluid" alt=""></a></div>

            @empty
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('frontend/assets')}}/img/gallery/gallery-1.jpg"><img src="{{asset('frontend/assets')}}/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('frontend/assets')}}/img/gallery/gallery-2.jpg"><img src="{{asset('frontend/assets')}}/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('frontend/assets')}}/img/gallery/gallery-3.jpg"><img src="{{asset('frontend/assets')}}/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>

            @endforelse
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>



        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>{{address()->setting_value}}</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>{{Emailaddress()->setting_value}}</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>{{book_a_tabel_number()->setting_value}}</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div>
                    {{Opening()->setting_value}}
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form action="{{route('messages')}}" method="post" class=" p-3 p-md-4">
            @csrf
          <div class="row">
            <div class="col-xl-6 form-group mb-2">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mb-2">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mb-2">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>

          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
        <!--End Contact Form -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection

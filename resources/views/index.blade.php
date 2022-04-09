<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



  <!-- slider js -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- CSS -->
  <link href="{{asset('css/styles.css')}}" rel="stylesheet">

  <!-- For Testimonial -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">



  <!-- for scroll effect -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />



  <!-- owl carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Deerwalk Auto Services</title>
</head>

<body>
  <div class="main" id="main">

    <aside class="navigation">
      <ul>
        <li class="navigation-item">
          <a class="indicator active navLink" href="#first">
            <div class="navHover" style="left:-95px">Introduction</div>
          </a>
        </li>

        <li class="navigation-item">
          <a class="indicator navLink" href="#second">
            <div class="navHover" style="left:-75px">About Us</div>
          </a>
        </li>

        <li class="navigation-item">
          <a class="indicator navLink" href="#third">
            <div class="navHover" style="left:-100px">Our Services</div>
          </a>
        </li>

        <li class="navigation-item">
          <a class="indicator navLink" href="#fourth">
            <div class="navHover" style="left:-100px">Our Facilities</div>
          </a>
        </li>

        <li class="navigation-item">
          <a class="indicator navLink" href="#fifth">
            <div class="navHover" style="left:-60px">Gallery</div>
          </a>
        </li>

        <li class="navigation-item">
          <a class="indicator navLink" href="#sixth">
            <div class="navHover" style="left:-90px">Testimonial</div>
          </a>
        </li>

        <li class="navigation-item">
          <a class="indicator navLink" href="#seventh">
            <div class="navHover" style="left:-60px">Clients</div>
          </a>
        </li>

        <!-- <li class="navigation-item">
          <a class="indicator navLink" href="#eighth">
            <div class="navHover" style="left:-84px">Auto Parts</div>
          </a>
        </li> -->

        <li class="navigation-item">
          <a class="indicator navLink" href="#nineth">
            <div class="navHover" style="left:-84px">Contact Us</div>
          </a>
        </li>

      </ul>
    </aside>

    <!-- navigation for mobile start -->
    <div class="navMob">
      <nav class="navbar navbar-expand-lg  navbar-dark sticky-top">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#first">Introduction</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#second">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#third">Our Services</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#fourth">Our Facilities</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#fifth">Gallery</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#sixth">Testimonial</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#seventh">Clients</a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link" href="#eighth">Auto Parts</a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link" href="#nineth">Contact Us</a>
              </li>

            </ul>

          </div>
        </div>
      </nav>
    </div>
    <!-- navigation for mobile end -->

    <!-- bouncing arrow start-->
    <div class="scroll-div">
      <div class="scroll-arrow bounce">
        <a href="#second"><span><i class="fas fa-chevron-down fa-3x"></i></span></a>
      </div>
    </div>
    <!-- bouncing arrow end-->

    <section class="intro_container " id="first">

      <div class="embed-responsive embed-responsive-16by9 video">
        <video autoplay muted loop id="introVideo">
          <source src="{{asset('images/autoservices.mp4')}}" type="video/mp4">
        </video>
      </div>

      <div class="logo">
        <img src="{{asset('images/logo.png')}}" alt="logo">
      </div>
    </section>

    <section class="aboutUs_container section row d-flex flex-row justify-content-center align-items-center mt-5  bg-white" id="second">
      <div class="aboutLeft col-md-5">
        {{-- <img src="{{asset('images/about-us bg.png')}}" class="img-fluid" style="width: 100%;height:auto"> --}}
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @foreach ($aboutUs as $i=>$about)
            <div class="carousel-item {{$i==0?'active':''}}">
              <img src="{{asset('storage/aboutUs/'.$about->image)}}" class="img-fluid" style="width: 100%;height:auto">
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="aboutRight col-md-5 text-center">
        <div class="title">
          <h2 class="text-uppercase fs-1 fw-bold lh-lg">About us</h2>
        </div>

        {{-- <div class="about_content">
          <div class="slidemove">

            <div class="slide">
              <p class="fw-normal fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu leo porta
                semper elit mus molestie vel.
                Pretium ac amet aliquet ut quis nisi lobortis pretium. Auctor mollis dolor nisl risus nulla. Semper amet
                tincidunt nascetur eget sapien in. Tellus curabitur tortor tincidunt pellentesque orci. Lorem ipsum
                dolor
                sit amet, consectetur adipiscing elit. Aliquam arcu leo porta semper elit mus molestie vel.
                Pretium ac amet aliquet ut quis nisi lobortis pretium. Auctor mollis dolor nisl risus nulla. Semper amet
                tincidunt nascetur eget sapien in. Tellus curabitur tortor tincidunt pellentesque orci.</p>
            </div>
            <div class="slide">
              <p class="fw-normal fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam arcu leo porta
                semper elit mus molestie vel.
                Pretium ac amet aliquet ut quis nisi lobortis pretium. Auctor mollis dolor nisl risus nulla. Semper amet
                tincidunt nascetur eget sapien in. Tellus curabitur tortor tincidunt pellentesque orci. Lorem ipsum
                dolor
                sit amet, consectetur adipiscing elit. Aliquam arcu leo porta semper elit mus molestie vel.
                Pretium ac amet aliquet ut quis nisi lobortis pretium. Auctor mollis dolor nisl risus nulla. Semper amet
                tincidunt nascetur eget sapien in. Tellus curabitur tortor tincidunt pellentesque orci.</p>
            </div>

            @foreach ($aboutUs as $about)

            <div class="slide">
              <p class="fw-normal fs-6">{{$about->description}}</p>
      </div>
      @endforeach

  </div>
  </div> --}}
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @foreach ($aboutUs as $i=>$about)
      <div class="carousel-item {{$i==0?'active':''}}">
        <p class="fw-normal fs-6">{{$about->description}}</p>
      </div>
      @endforeach
    </div>
  </div>
  </div>
  </section>

  <section class="services_container section row d-flex flex-row justify-content-center align-items-center mt-5  bg-black" id="third" data-aos-easing="linear" data-aos-offset="500" data-aos="fade-left">
    <!-- style="background-image: url(./images/backgrounds/services-01-01-01-01-01.jpg); background-repeat: no-repeat; background-size: cover;"> -->
    <div class="servicesLeft col-md-5 col-sm-5 text-center" data-aos="fade-right">
      <div class="title">
        <h2 class="text-uppercase fs-1 fw-bold lh-lg">Our Services</h2>
      </div>
      <div class="services_content">
        <p class="fw-normal fs-5">One stop solution to all your car needs.</p>
      </div>
    </div>

    <div class="servicesRight col-md-5 col-sm-5 align-items-center justify-content-center" data-aos="flip-right">

      <div id="carouselExampleFade" class="carousel slide carousel-fade mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
          @if(!$services->isEmpty())
          @foreach ($services as $i=>$service)
          <div class="carousel-item {{$i==0?'active':''}}">
            <img src="{{asset('storage/service/'.$service->image)}}" class="d-block w-100 mt-5" alt="services_image" style="width:610px;height:610px">
            <div class="carousel-caption  d-block">
              <h3>{{$service->description}}</h3>
            </div>
          </div>
          @endforeach
          @endif


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <section class="facilties_container section mt-5  bg-white" id="fourth" data-aos="zoom-out" data-aos-easing="linear" data-aos-offset="300" style="background-image: url('{{ (!is_null($facility))?asset('storage/facility/'.$facility->image) : asset('images/facilities.png') }}'); color: white;width:100vw; background-repeat: no-repeat;
    background-size: cover;">
    <div class="title">
      <h2 class="text-uppercase fs-1 fw-bold text-center m-0" style="line-height: 18vh;">Our Facilities</h2>
    </div>

    <div class="facilities" style="background-color: rgba(0,0,0,0.6); max-height: fit-content;" data-aos="zoom-in">
      <div class="row">

        <div class="col-md-4 bmfeature rfeature bfeature text-center" data-aos="zoom-in">
          <div class="icon" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="150000" style="opacity: 0.75;">
            <i class="fas fa-car fa-6x"></i>
          </div>
          <div class="facilities-heading text-uppercase text-center fw-bold fs-5 lh-lg">
            post lift
          </div>
          <div class="facilities-description text-center fs-6">
            5 two post lift
          </div>
        </div>

        <div class="col-md-4 bmfeature rfeature bfeature text-center" data-aos="zoom-in">
          <div class="icon" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="150000" style="opacity: 0.75;">
            <i class="fas fa-wrench fa-6x"></i>
          </div>
          <div class="facilities-heading text-uppercase text-center fw-bold fs-5 lh-lg">
            equipment
          </div>
          <div class="facilities-description text-center fs-6">
            1 fully equiped four post lift
          </div>
        </div>

        <div class="col-md-4 bmfeature bfeature text-center" data-aos="zoom-in">
          <div class="icon" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="150000" style="opacity: 0.75;">
            <i class="fas fa-parking fa-6x"></i>
          </div>
          <div class="facilities-heading text-uppercase text-center fw-bold fs-5 lh-lg">
            waiting lounge
          </div>
          <div class="facilities-description text-center fs-6 pb-3">
            An adequate parking area and waiting lounge
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 bmfeature rfeature text-center" data-aos="zoom-in">
          <div class="icon" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="150000" style="opacity: 0.75;">
            <i class="fas fa-cogs fa-6x"></i>
          </div>
          <div class="facilities-heading text-uppercase text-center fw-bold fs-5 lh-lg">
            mechanics
          </div>
          <div class="facilities-description text-center fs-6">
            Well trained mechanics
          </div>
        </div>

        <div class="col-md-4 bmfeature rfeature text-center" data-aos="zoom-in">
          <div class="icon" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="150000" style="opacity: 0.75;">
            <i class="fas fa-wifi fa-6x"></i>
          </div>
          <div class="facilities-heading text-uppercase text-center fw-bold fs-5 lh-lg">
            wifi
          </div>
          <div class="facilities-description text-center fs-6">
            Wide area WIFI service
          </div>
        </div>

        <div class="col-md-4 bmfeature feature text-center" data-aos="zoom-in">
          <div class="icon" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="150000" style="opacity: 0.75;">
            <i class="fas fa-video fa-6x"></i>
          </div>
          <div class="facilities-heading text-uppercase text-center fw-bold fs-5 lh-lg">
            surveillance
          </div>
          <div class="facilities-description text-center fs-6">
            24hrs surveillance
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="gallery_container section  bg-white" id="fifth" style="max-height: 100vh;">
    <div class="title">
      <h2 class="text-uppercase fs-1 fw-bold text-center m-0" style="line-height: 20vh; padding-top: 4vh;">Gallery</h2>
    </div>

    <div id="gallery" class="owl-carousel owl-theme">
      <!-- <div class="item">
        <img class="img-fluid" src="{{asset('images/gallery/1.png')}}" alt="image">
      </div>
      <div class="item">
        <img class="img-fluid" src="{{asset('images/gallery/2.png')}}" alt="image">
      </div>
      <div class="item">
        <img class="img-fluid" src="{{asset('images/gallery/3.png')}}" alt="image">
      </div>
      <div class="item">
        <img class="img-fluid" src="{{asset('images/gallery/4.png')}}" alt="image">
      </div> -->
      @foreach ($galleryImages as $i=>$image)
      <div class="item">
        @if ($i%2==0)
        <img class="img-fluid" src="{{asset('storage/gallery/'.$image->image)}}" alt="gallery_image" data-aos="fade-down" data-aos-easing="linear" data-aos-offset="300">
        @else
        <img class="img-fluid" src="{{asset('storage/gallery/'.$image->image)}}" alt="gallery_image" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="300">

        @endif
      </div>
      @endforeach

    </div>
  </section>

  <section class="testimonial_container section mt-5" id="sixth" style="background-color:white;position:sticky" data-aos="fade-up" data-aos-easing="linear" data-aos-offset="300">
    <div class="title">
      <h2 class="text-uppercase fs-1 fw-bold text-center" style="line-height: 20vh;">testimonials</h2>
    </div>

    <div class="testi-wrap">
      <div class="container">
        <div class="row">
          <div id="testimonial-slider" class="owl-carousel">

            @foreach ($testimonials as $i=>$testimonial)

            @if ($i%2 == 0)
            <div class="testi-in" data-aos="flip-left" data-aos-easing="linear" data-aos-offset="300">
              @else
              <div class="testi-in" data-aos="flip-right" data-aos-easing="linear" data-aos-offset="300">
                @endif
                <!-- <div class="testi-diamond"></div> -->
                <div class="testi-in-content" style="height: 265px;">
                  <p>{{$testimonial->description}}</p>
                </div>
                <div class="testi-in-image" style="width:max-content;">
                  <img src="{{asset('storage/testimonial/'.$testimonial->image)}}" class="rounded-circle" style="height: 80px;width:80px;object-fit:cover">
                  <h2 style="padding-bottom: 20px;">{{$testimonial->name}}</h2>
                </div>
              </div>

              @endforeach
            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="client_parts_container section" id="seventh" style="min-height: fit-content;background-color: white;" data-aos="fade-down" data-aos-easing="linear" data-aos-offset="300">
    <div class="clients">
      <div class="title pt-3">
        <h2 class="text-uppercase fs-1 fw-bold text-center m-0" style="line-height: 15vh;">Our Clients</h2>
      </div>
      <div class="row pt-4">
        <div class="col-sm-4 col-md-2 text-center pb-3"><img src="{{asset('images/parts/hyundai.png')}}" height="60vh">
        </div>
        @foreach ($clients as $client)
        <div class="col-sm-4 col-md-2 text-center pb-3"><img src="{{asset('storage/client/'.$client->image)}}" height="60vh">
        </div>
        @endforeach
        <div class="col-sm-4 col-md-2 text-center pb-3"><img src="{{asset('images/parts/kia.jpg')}}" height="60vh">
        </div>
        <div class="col-sm-4 col-md-2 text-center pb-3"><img src="{{asset('images/parts/mahindra.png')}}" height="60vh"></div>
        <div class="col-sm-4 col-md-2 text-center pb-3"><img src="{{asset('images/parts/suzuki.png')}}" height="60vh">
        </div>
        <div class="col-sm-4 col-md-2 text-center pb-3"><img src="{{asset('images/parts/tata.png')}}" height="60vh">
        </div>
      </div>
    </div>

    <div class="parts mt-5" style="height:auto;">
      @if(!is_null($autoPart))
      <img class="img-fluid" src="{{asset('storage/auto-parts/'.$autoPart->image)}}" alt="" width="100%">
      @else
      <img class="img-fluid" src="{{asset('images/DAPAD.jpg')}}" alt="" width="100%">
      @endif
    </div>
  </section>

  <section style="height:fit-content;" id="nineth">
    <div class="row section">
      <div class="col-md-6 p-0">
        <!-- map -->
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14134.156135145975!2d85.30328010000001!3d27.6697302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1634811998038!5m2!1sen!2snp" width="100%" height="100%" style="border:0;" loading="lazy"></iframe> --}}
        <iframe src="https://maps.google.com/maps?q=deerwalk%20auto%20services&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
      </div>
      <div class="col-md-6 p-0" style="background: #000">
        <!-- form -->
        <div class="container d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1000">
          <div class="contact px-3 py-5 w-100">
            <h4 class="text-center pb-2" style="color: white;">Contact Us</h4>
            <form action="{{route('contact-us.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 pb-2"> <input type="text" class="form-control" name="name" placeholder="Name" /> </div>
                <div class="col-md-6"> <input type="text" class="form-control" name="phone" placeholder="Phone" /> </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12"> <input type="text" class="form-control" name="email" placeholder="Email" /> </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12"> <textarea rows="2" class="form-control" name="message" placeholder="Message"></textarea>
                </div>
              </div>
              <div class="row mt-2 text-center">
                <div class="col-md-12">
                  <button class="btn btn-light mt-2">Send Message <i class="fa fa-long-arrow-right mt-1"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="second-footer-container my-3" style="font-size: 0.8rem;">
      <div class="row text-center my-4">
        <div class="col">
          Tel: @if(!is_null($telephone)){{$telephone->phone_number}}@else 01-4599766 @endif<br>
          @forelse ($mobileNumbers as $number)
          {{$number->phone_number}}
          @empty
          984-646-0993 <br>
          @endforelse
        </div>

        <div class="col">
          Kalopul-7, Chabahil, Kathmandu<br>
          <a class="social_icon" href="https://www.facebook.com/deerwalkautoservices"><i class="fab fa-facebook px-1"></i></a>
          <a class="social_icon" href="https://www.instagram.com/deerwalkauto/"><i class="fab fa-instagram px-1"></i></a>
          <a class="social_icon" href="#"><i class="fab fa-twitter px-1"></i></a>
        </div>
      </div>
    </div>

    <div class="copyright_part">
      <div class="row" style="background-color: rgb(0,0,0); color: white; line-height: 5vh;">
        <div class="col-md-12 text-center">
          <span>&copy; Deerwalk Auto Services, 2021</span>
        </div>
      </div>
    </div>
  </section>

  @if(!is_null($notification))
  <section class="popup1">
    <div class="contentBox1">
      <div class="close1"><i class="far fa-times-circle"></i></div>
      <div class="imgBx">
        <img src="{{asset('storage/notification/'.$notification->image)}}" alt="advertisement" class="mx-5">
      </div>
      <div class="content">
        <div>
          <h3>{{$notification->title}}</h3>
          <p>{{$notification->description}}</p>
        </div>
      </div>
    </div>
  </section>

  @endif
  @if(!$bannerNotification->isEmpty()))
  <section class="popup2">
    <div class="contentBox2">
      <div class="close2"><i class="far fa-times-circle"></i></div>
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach ($bannerNotification as $notification)
          <div class="carousel-item active">
            <img src="{{asset('storage/notification/'.$notification->image)}}" class="d-block w-100" alt="advertisement">
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden" style="color: black;">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section>
  @endif
  </div>



  </div>


  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    const popup = document.querySelector('.popup1');
    const close = document.querySelector('.close1');

    window.onload = function() {
      setTimeout(function() {
        popup.style.display = "flex"
      }, 500);
    }

    close.addEventListener('click', () => {
      popup.style.display = 'none'
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#testimonial-slider").owlCarousel({
        items: 3,
        navigation: true,
        dots: true,
        pagination: false,
        autoPlay: true
      });
    });
  </script>

  <script>
    const popup2 = document.querySelector('.popup2');
    const close2 = document.querySelector('.close2');

    window.onload = function() {
      setTimeout(function() {
        popup2.style.display = "flex"
      }, 500);
    }

    close2.addEventListener('click', () => {
      popup2.style.display = 'none'
    })
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <!-- Owl Carousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="{{asset('js/main.js')}}"></script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({disable:'phone'});
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/aaceea354f.js" crossorigin="anonymous"></script>
  {{-- ScrollTrigger --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js"></script>
  <script>
    gsap.registerPlugin(ScrollTrigger);
    gsap.defaults({
      ease: "none",
      duration: 100000000
    });

    // create a sequence that moves 3 of the panels in from different directions
    const tl = gsap.timeline();
    tl.from("#gallery", {
      skewX: -3
    });


    // pin the container and link the animation to the scrollbar (scrub: true). We could easily embed this in the gsap.timeline() to shorten things a bit, but this is to show that you can create the ScrollTrigger separately if you prefer.
    // ScrollTrigger.create({
    //   animation: tl,
    //   trigger: "#container",
    //   start: "top top",
    //   end: "+=4000",
    //   scrub: true,
    //   pin: true,
    //   anticipatePin: 1
    // });
  </script>
  <script>
    $('.carousel').carousel({
      interval: 5000
    })
  </script>
</body>
@include('sweetalert::alert')

</html>

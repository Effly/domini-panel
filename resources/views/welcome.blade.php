<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137004461-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-137004461-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('owlcarousel/owl.carousel.js')}}"></script>

    <title>Domini Games</title>
</head>

<body>

<!-- Section Content -->
<div id="main">
    <div class="container-fluid">

        <!-- Section Tabs -->

        <div class="row">
            <div class="col-xl-12">
                <div class="main__wrapper">

                    <input type="radio" name="tab2" id="tab-3" checked>
                    <div class="main__wrapper-content">
                        <article class="tab-3">
                            <div id="carousel" class="owl-carousel owl-theme">
                                @if(!empty($data_for_big))
                                    @foreach($data_for_big as $slide)
                                        <div class="main__wrapper-content-slider">
                                            <a href="{{$slide['game']['link']}}" target="_blank">
                                                @if($version)
                                                    <img src="{{asset('storage/'.$slide['game']['image_name_ipad'])}}"
                                                         alt="Img">
                                                    @if($slide['label']!= "NULL")
                                                        <img class="label img-fluid"
                                                             src="{{asset('storage/labels/free_big.png')}}"
                                                             alt="Img">
                                                    @endif
                                                @else
                                                    <img src="{{asset('storage/'.$slide['game']['image_name'])}}"
                                                         alt="Img">
                                                    @if($slide['label']!= "NULL")
                                                        <img class="label img-fluid"
                                                             src="{{asset('storage/labels/free_big.png')}}"
                                                             alt="Img">
                                                    @endif
                                                @endif
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- ПЛАНШЕТ -->
                            <div id="carousel_ipad" class="owl-carousel owl-theme">
                                @if(!empty($data_for_big))
                                    @foreach($data_for_big as $slide)
                                        <div class="main__wrapper-content-slider">
                                            <a class="d-block link_img" href="{{$slide['game']['link']}}"
                                               target="_blank">
                                                @if($version)
                                                    <img src="{{asset('storage/'.$slide['game']['image_name_ipad'])}}"
                                                         alt="Img">
                                                    @if($slide['label']!= "NULL")
                                                        <img class="label img-fluid"
                                                             src="{{asset('storage/labels/free_big_ipad.png')}}"
                                                             alt="Img">
                                                    @endif
                                                @else
                                                    <img src="{{asset('storage/'.$slide['game']['image_name'])}}"
                                                         alt="Img">
                                                    @if($slide['label']!= "NULL")
                                                        <img class="label img-fluid"
                                                             src="{{asset('storage/labels/free_big.png')}}"
                                                             alt="Img">
                                                    @endif
                                                @endif
                                            </a>
                                        </div>
                                    @endforeach

                                @endif
                            </div>
                        </article>
                    </div>

                    <!-- РАЗДЕЛИТЕЛЬ -->
                    <div class="row">
                        <div class="col-xl-12 social">
                            <p class="social__text">{!! $data_for_separator->html_text !!}</p>
                            <div class="facebook">
                                <a href="{{$data_for_separator->facebook_link}}" target="_blank">
                                    <img class="social__logo img-fluid"
                                         src="{{asset('storage/'.$data_for_separator->path_facebook_img)}}" alt="#"/>
                                </a>
                            </div>
                            <div class="inst">
                                <a href="{{$data_for_separator->inst_link}}" target="_blank">
                                    <img class="social__logo img-fluid"
                                         src="{{asset('storage/'.$data_for_separator->path_inst_img)}}" alt="#"/>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="main__wrapper-content">
                        <article class="tab-3">
                            <div class="owl-carousel tab_3">
                                <!-- Top Rated -->
                                @if(!empty($data_for_small))
                                    @foreach($data_for_small as $slide)
                                        <div class="main__wrapper-content-item">
                                            <a class="d-block link_img" href="{{$slide['game']['link']}}"
                                               target="_blank">
                                                <img class="img-fluid"
                                                     src="{{asset('storage/'.$slide['game']['image_name'])}}" alt="Img">
                                                @if($slide['rate'] != "NULL")
                                                    <img class="rate img-fluid"
                                                         src="{{asset('storage/labels/'.$slide['rate'].'.png')}}"
                                                         alt="Img">
                                                @endif
                                                @if($slide['label']!= "NULL")
                                                    <img class="label img-fluid"
                                                         src="{{asset('storage/labels/'.$slide['label'].'.png')}}"
                                                         alt="Img">
                                                @endif
                                                <p class="wrapper__content-item-text">{{$slide['game']['name']}}</p>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".tab_3").owlCarousel({
            items: 4,
            responsive: {
                1024: {
                    items: 2.7
                },
            },
            dots: false,
            stagePadding: true,
            center: true,
            loop: true,
            startPosition: 0,
            autoplay: true,
            autoplayTimeout: {{$speed_for_small}},
        });
        $("#carousel").owlCarousel({
            items: 1,
            responsive: {
                0: {
                    items: 1
                },
            },
            navigation: false,
            slideSpeed: 500,
            paginationSpeed: 800,
            rewindSpeed: 1000,
            singleItem: true,
            autoPlay: true,
            stopOnHover: true,
            center: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: {{$speed_for_big}},
        });
        $("#carousel_ipad").owlCarousel({
            items: 1,
            responsive: {
                0: {
                    items: 1
                },
            },
            navigation: false,
            slideSpeed: 500,
            paginationSpeed: 800,
            rewindSpeed: 1000,
            singleItem: true,
            autoPlay: true,
            stopOnHover: true,
            center: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: {{$speed_for_big}},
        });
    });
</script>
</body>

</html>

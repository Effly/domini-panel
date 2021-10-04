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
{{--                                {{dd($data_for_)}}--}}

<div id="main">
    <div class="container-fluid">

        <!-- Section Tabs -->

        <div class="row">
            <div class="col-xl-12">
                <div class="main__wrapper">

                    <input type="radio" name="tab2" id="tab-3" checked>
                    <div class="main__wrapper-content">
                        <article class="tab-3">
                            <div id="carousel_ipad" class="owl-carousel owl-theme">
                                @foreach($data_for_big as $slide)
                                    <div class="main__wrapper-content-slider">
                                        <a href="{{$slide['game']['link']}}" target="_blank">
                                            <img id="slider3" src="{{asset('storage/'.$slide['game']['image_name'])}}"
                                                 alt="Img">
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <!-- ПЛАНШЕТ -->
{{--                            <div id="carousel_ipad" class="owl-carousel owl-theme">--}}
{{--                                <div class="main__wrapper-content-slider">--}}
{{--                                    <a href="https://app.adjust.com/7tkcakt" target="_blank">--}}
{{--                                        <img id="slider3" src="img/ipad/FE4_slider.jpg" alt="Img">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="main__wrapper-content-slider">--}}
{{--                                    <a href="https://app.adjust.com/7vwejyw" target="_blank">--}}
{{--                                        <img id="slider2" src="img/ipad/SC6_slider.jpg" alt="Img">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="main__wrapper-content-slider">--}}
{{--                                    <a href="https://app.adjust.com/q1dq7o9" target="_blank">--}}
{{--                                        <img id="slider1" src="img/ipad/DR14_slider.jpg" alt="Img"/>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </article>
                    </div>

                    <!-- РАЗДЕЛИТЕЛЬ -->
                    <div class="row">
                        <div class="col-xl-12 social">
                            <p class="social__text">{!! $data_for_separator !!}</p>
                            <div class="facebook">
                                <a href="https://www.facebook.com/dominigames/" target="_blank">
                                    <img class="social__logo img-fluid" src="img/Face.png" alt="#"/>
                                </a>
                            </div>
                            <div class="inst">
                                <a href="https://www.instagram.com/dominigames" target="_blank">
                                    <img class="social__logo img-fluid" src="img/Inst.png" alt="#"/>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="main__wrapper-content">
                        <article class="tab-3">
                            <div class="owl-carousel tab_3">
                                <!-- Top Rated -->
                                @foreach($data_for_small as $slide)
                                    <div class="main__wrapper-content-item">
                                        <a class="d-block link_img" href="{{$slide['game']['link']}}" target="_blank">
                                            <img class="img-fluid" src="{{asset('storage/'.$slide['game']['image_name'])}}" alt="Img">
                                            @if($slide['rate'] != "NULL")
                                                <img class="rate img-fluid"
                                                    src="{{asset('storage/labels/'.$slide['rate'].'/'.$slide['rate'].'.png')}}"
                                                    alt="Img">
                                            @endif
                                            @if($slide['label']!= "not selected")
                                                <img class="label img-fluid"
                                                    src="{{asset('storage/labels/'.$slide['label'].'/'.$slide['label'].'.png')}}"
                                                    alt="Img">
                                            @endif
                                            <p class="wrapper__content-item-text">{{$slide['game']['name']}}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
</body>

</html>

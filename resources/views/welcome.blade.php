@extends("layouts.guest")
@section("custum_styles")
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
@endsection
@section('title')
    جماعة حربيل- تامنصورت
@endsection
@section("template")
  <x-navbar></x-navbar>
  <div class="container-fluid">
       <h3 class="text-center">مستجدات</h3>
        <br />
        <div class="container">

                    <div
                        id="carouselExampleIndicators"
                        class="carousel slide"
                        data-ride="carousel"
                    >
                        <ol class="carousel-indicators">
                            @for($i = 0; $i<$count;$i++)
                                @if($i == 0)
                                    <li
                                        data-target="#carouselExampleIndicators"
                                        data-slide-to="0"
                                        class="active"
                                    ></li>
                                @else
                                    <li
                                        data-target="#carouselExampleIndicators"
                                        data-slide-to="{{ $i }}"
                                    ></li>
                                @endif
                            @endfor

                        </ol>
                        <div class="carousel-inner">
                            @if($posts->count() == 0)
                            <div class="carousel-item active">
                                <a href="#">
                                    <img
                                        class="d-block w-100 img-fluid"
                                        src="no_post.png"
                                        alt="صورة"
                                    />
                                    <div
                                        class="carousel-caption  d-md-block tamnsourt-color"
                                        style="color: black; opacity: 0.8"
                                    >
                                        <h5>
                                          no post yet
                                        </h5>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @if(isset($innerPost))
                            <div class="carousel-item active">
                                <a href="{{ url('post/'.$innerPost->id) }}">
                                <img
                                    class="d-block w-100 img-fluid"
                                    src="{{ url('image/'.$innerPost->id)}}"
                                    alt="صورة"
                                />
                                <div
                                    class="carousel-caption  d-md-block tamnsourt-color"
                                    style="color: white; opacity: 0.8;direction: rtl"
                                >
                                    <h5>
                                            {{ $innerPost->title }}
                                    </h5>
                                </div>
                                </a>
                            </div>
                                @endif
                                @foreach($posts as $post)
                                @if($post->id!=$innerPost->id)
                            <div class="carousel-item">
                                <a href="{{ url('post/'.$post->id) }}">
                                <img
                                    class="d-block w-100"
                                    src="{{ url('image/'.$post->id)}}"
                                    alt="صورة"
                                />
                                <div
                                    class="carousel-caption   d-md-block tamnsourt-color"
                                    style="color: white; opacity: 0.8;direction: rtl"
                                >
                                    <h5>
                                       {{ $post->title }}
                                    </h5>

                                </div>
                                </a>
                            </div>
                                @endif
                            @endforeach

                        </div>
                        <a
                            class="carousel-control-prev"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="prev"
                        >
              <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
              ></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a
                            class="carousel-control-next"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="next"
                        >
              <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
              ></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


            <br />

            <div class="row" style="text-align: center">
                <div class="col-md-5"></div>
                <div class="col-md-2"><h3>المقاطعات</h3></div>
                <div class="col-md-5"></div>
            </div>
            <hr />
            <div class="row container " style="text-align: center">
                <div class="col-md-4">
                    <div class="my-card carding shadow">الفتح</div>
                </div>
                <div class="col-md-4 mt-2 mt-md-0">
                    <div class="my-card carding shadow">الاطلس</div>
                </div>

                <div class="col-md-4 mt-2 mt-md-0">
                    <div class="my-card carding shadow">حربيل</div>
                </div>
            </div>
            <br />

            <br />

            <div class="row">
                <div class="col-lg-4 order-sm-1 order-xs-1 order-1  order-md-1 order-lg-0  order-xl-0">
                    <div class="row" style="text-align: center">
                        <div class="col-md-9"></div>
                        <div class="col-md-3"><h3> بـرامـج</h3></div>
                    </div>
                    <hr />
                    <div class="my-card test0 d-flex justify-center">
                        <div class="container_text tamnsourt-color"></div>
                        <p class="ho">برنامج عمل جماعة تامنــصــورت 2017-2022</p>
                    </div>
                    <br />
                    <hr />

                    <br />
                    <div class="my-card test d-flex justify-center">
                        <div class="container_text tamnsourt-color"></div>
                        <p class="ho">
                            طلبات العروض الخاصة بالتدبير المفوض لقطاع النظافة بالمدينة
                        </p>
                    </div>
                    <br />
                    <hr />
                    <div class="row" style="text-align: center">
                        <div class="col-md-7"></div>
                        <div class="col-md-5"><h3>فـيـديـوهـات</h3></div>
                    </div>
                    <hr />
                    <div class="row" style="text-align: right">
                        @foreach($videos as $v)
                        <div class="col-md-12">
                            <h6 class="text-right">
                                {{ $v->title }}
                            </h6>
                            <br />
                            <iframe width="350" height="200" src="{{ url($v->url) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <br />
                            <hr />
                            <br />
                        </div>
                        @endforeach

                    </div>
                    <br />
                    <div class="row" style="text-align: center">
                        <div class="col-md-3"></div>
                        <div class="col-md-9"><h3>صفحتنا على الفيسبوك</h3></div>
                    </div>
                    <!-- Script Page Facebook via API Facebook , i will do it later -->
                    <br />
                    <hr />
                    <br />
                    <div class="row" style="text-align: center">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <h3>تامنــصــورت فـي صـور</h3>

                        </div>
                    </div>
                    <div class="row no-gutters" style="height: 200px">
                        <div class="col-8 ">
                            <a href="images/tamansourt27.jpg" class="fancybox" rel="ligthbox">
                            <img src="images/tamansourt27.jpg" alt="tamansourt image" class="w-100 img-thumbnail" style="min-height: 180px">
                            </a>
                        </div>
                        <div class="col-4">
                            <div class="col-12 ">
                                <a href="images/tamansourt36.jpg?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
                                <img src="images/tamansourt36.jpg?auto=compress&cs=tinysrgb&h=650&w=940" alt="tamansourt image" class="w-100 img-thumbnail" style="max-height: 60px">
                                </a>
                            </div>
                            <div class="col-12 my-1 ">
                                <a href="images/tamansourt37.jpg" class="fancybox" rel="ligthbox">
                                <img src="images/tamansourt37.jpg" alt="tamansourt image" class="w-100 img-thumbnail" style="max-height: 60px">
                                </a>
                            </div>
                            <div class="col-12 ">
                                <a href="images/tamansourt38.jpg" class="fancybox" rel="ligthbox">
                                <img src="images/tamansourt38.jpg" alt="tamansourt image" class="w-100 img-thumbnail" style="max-height: 60px">
                                </a>
                            </div>
                        </div>
                        <div class="col-12 text-left" style="direction: rtl;font-size: 16px">
                            <a href="{{ url('ville#gallery') }}" style="color:orangered">المزيد...</a>
                        </div>
                    </div>
                    <!-- A Gallery of photos sliding to show to city beauty , i will do it later -->
                </div>
                <div class="col-lg-8 order-xs-0 order-sm-0 order-0 order-md-0 order-lg-1 order-xl-1">

                    <div class="row" style="text-align: center">
                        <div class="col-md-10"></div>
                        <div class="col-md-2"><h3>آخر الأخبار</h3></div>
                    </div>
                    <hr />
                    @if($posts->count()>0)
                    @foreach($posts as $post)
                    <div class="row" style="text-align: right">
                        <div class="col-md-11 order-0">
                            <h3 style="direction: rtl">
                                <a href="{{ url('post/'.$post->id) }}">{{ $post->title }}</a>
                            </h3>
                        </div>
                        <div class="col-md-1 my-2 order-1 text-center date" >
                            {{ App\Helpers\DateHelper::monthToArabic(date('m', strtotime($post->created_at))) }}
                            <div style="font-size: 30px;font-weight: bold;margin-top: -10px;margin-bottom: -10px">
                                {{ date('d', strtotime($post->created_at)) }}
                            </div>
                                {{ date('Y', strtotime($post->created_at)) }}
                        </div>
                        <br />
                        <br />
                        <div class="col-md-8 order-xl-3 order-md-3 order-4">
                            <p>
                                {!! \Illuminate\Support\Str::limit($post->content,300) !!}...
                                <a
                                    href="{{ url('post/'.$post->id) }}"
                                    style="color: blue; font-weight: bold"
                                >
                                    <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
                                    لقراءة المزيد
                                </a>
                            </p>
                        </div>
                        <div class="col-md-4 order-xl-4 order-md-4 order-3">
                            <img src="{{ url('image/'.$post->id) }}" width="100%" alt="image" />
                            <br />
                            @foreach($post->categories as $pc)
                            <a href="{{ url('categorie?c='.$pc->libelle) }}" class="badge badge-dark">{{ $pc->libelle }}</a>
                            @endforeach

                        </div>
                    </div>
                            <hr />
                    @endforeach
                        <div class="d-flex justify-content-center">
                            {{ $posts->render('vendor.pagination.bootstrap-4') }}
                        </div>
                    @endif
                    <div class="row" style="text-align: center">
                        <div class="col-md-10"></div>
                        <div class="col-md-2"><h3>أخبار مختلفة</h3></div>
                    </div>
                    <hr />
                    <div id="mixedSlider" class="my-3">
                        <div class="MS-content">
                            @foreach($posts as $post)
                                <div class="item">
                                    <div class="card post border-0 bg-transparent" >
                                        <div class="card_after text-center ">
                                            <a href="{{ url('post/'.$post->id) }}" class=" shadow post_btn">لقراءة المزيد</a>
                                        </div>
                                        <img src="{{ url('image/'.$post->id) }}" alt="image" class="card-img" style="height: 200px">
                                        <div class="card-img-overlay my-1 p-0">
                                            @foreach($post->categories as $pc)
                                                <a href="{{ url('categorie?c='.$pc->libelle) }}" class="badge badge-light mx-1" >{{ $pc->libelle }}</a>
                                            @endforeach

                                        </div>
                                        <div class="card-text text-right" style="direction: rtl">
                                            <h6>{{ $post->title }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="MS-controls">
                            <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                            <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </div>

                    </div>
                </div>
            </div>
            <br />
                <h3 class="text-center">مدينة تامنــصــورت</h3>
            <iframe class="shadow" width="100%" height="399" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=1023&amp;height=399&amp;hl=en&amp;q=Tamansourt%20Tamansourt+(Tamansourt%20Jama3a)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>



        </div>
  </div>

    </div>

        <!-- Footer Bar -->
  <x-footer></x-footer>

    </body>

@endsection
@section("custum_scripts")

    <script src="{{ asset("js/main.js") }}"></script>
    <script src="{{ asset("js/scroll.js") }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="{{ asset("js/Multi-slide-Carousel/js/multislider.js") }}"></script>
    <script>
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function(){

                $(this).addClass('transition');
            }, function(){

                $(this).removeClass('transition');
            });
            $('#mixedSlider').multislider({
                duration: 750,
                interval: 3000
            });
        });
    </script>
@endsection

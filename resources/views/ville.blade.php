@extends('layouts.guest')
@section("custum_styles")

    <link rel="stylesheet" href="{{ asset("css/ville.css") }}">
    <link rel="stylesheet" href="{{ asset("css/gallery.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

@endsection

@section('title')
    مدينة تامنصورت
@endsection
@section('template')
    <x-navbar></x-navbar>
    <h1 style="text-align: center;">مدينة تامنصورت</h1>
    <div class="container">
                <iframe width="100%" height="399" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=1023&amp;height=399&amp;hl=en&amp;q=Tamansourt%20Tamansourt+(Tamansourt%20Jama3a)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </div>
    <div class="container my-4">
        <div class="accordion-item">
            <div class="accordion-title" data-tab="item1">
                <h2>النشأة والموقع <i class="fa fa-chevron-down"></i></h2>
            </div>
            <div class="accordion-content text-right" style="direction: rtl;font-size: 18px" id="item1">
                <p>
                    تعتبر مدينة تامنصورت من مدن المملكة المغربية الحديثة النشأة، حيث بدأ العمل على تأسيسها منذ عام 2004، بهدف تقليل الأزمة السكانية في مدينة مراكش، وتوفير مدينة بديلة ذات تنظيم حديث، ومزودة بكافة الاحتياجات، وبنية تحتية محلية جيدة، وبهدف منع الامتداد السكاني في مراكش على حساب المعالم التاريخية، والثقافية، والسياحية، حيث أن مدينة مراكش مصنفة من قائمة التراث العالمي، وتقع تحديدًا على سفح جبل الأطلس، في حربيل، بالقرب من مدينة مراكش؛ حيث تبعد عنها باتجاه الشمال الغربي مسافة 10كم فقط، أي ما يقارب 15 دقيقة، ويؤدي إليها الطريق من آسفي، وبالجديدة، وتبلغ مساحة المدينة ما يقارب 1930 متر      </p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-title" data-tab="item2">
                <h2>السكان <i class="fa fa-chevron-down"></i></h2>
            </div>
            <div class="accordion-content text-right" style="direction: rtl;font-size: 18px" id="item2">
                <p>
                    بلغ عدد سكان مدينة تامنصورت ما يقارب التسعين ألف نسمة، وذلك حسب إحصائيات أجريت عام 2014، وأغلب سكانها هم من سكان مدينة مراكش في الأصل.      </p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-title" data-tab="item3">
                <h2>العمران <i class="fa fa-chevron-down"></i></h2>
            </div>
            <div class="accordion-content text-right" style="direction: rtl;font-size: 18px" id="item3">
                <p>
                    خلال فترة قياسية تم بناء مدينة كاملة قادرة على استيعاب أعداد هائلة من المواطنين؛ فخلال 8 سنوات فقط، وبمساعدة السلطات المحلية، والمسؤولين، والجهات الخاصة المعنية في المملكة المغربية، أُنشأت مدينة قادرة على استيعاب ما يقارب 51.000 نسمة، من خلال تأمين ما يقارب 16.000 وحدة سكنية، بالإضافة إلى أن المدينة مزودة بمرافق متنوعة، كحدائق للأطفال، ومساجد، ووسائل نقل، ومستوصف، ومدارس، ناهيك عن وجود جسور وطرق معبدة وواسعة، مساحات خضراء حيث تم زرع ما يقارب 14.000 شجرة      </p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-title" data-tab="item4">
                <h2>مشاريع مستقبلية <i class="fa fa-chevron-down"></i></h2>
            </div>
            <div class="accordion-content text-right" style="direction: rtl;font-size: 18px" id="item4">
                <p>
                    تتوعد الجهات المسؤولة في المغرب بإنجاز الكثير من الخدمات، والمرافق، والمشاريع الجديدة، والتي من شأنها أن تضمن استمرارية المدينة الجديدة، ومن هذه المشاريع إقامة مستشفى محلي، وبناء مجموعة من القاعات المغطاة للرياضة، بالإضافة إلى إنشاء مراكز ثقافية، ناهيك عن إيجاد مناطق للأنشطة الاقتصادية، ومناطق للأنشطة الصناعية، وتتوعد أيضًا ببناء 3 دور للشباب، ودار واحدة للنساء، بالإضافة إلى استحداث ثلاثة مراكز صحية، وعشرة ملاعب للرياضة، وستهتمّ ببناء ثلاثة مساجد، بالإضافة إلى مصلى، وأخيرًا مجموعة من القاعات للاستعمالات المختلفة، كالأفراح، والاجتماعات، وغيرها    </div>
        </div>
        <!-- Header -->
        <div class="header" id="gallery">
            <h1>تامنــصــورت في صور</h1>
        </div>
        <!-- Photo Grid -->
        <div class="row">
            <div class="column">
                <a href="images/tamansourt20.jpg" class="fancybox  " rel="ligthbox"><img src="images/tamansourt20.jpg" class=" img-fluid img-thumbnail"></a>
                <a href="images/tamansourt21.jpg" class="fancybox " rel="ligthbox"><img src="images/tamansourt21.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt23.jpg" class="fancybox " rel="ligthbox"><img src="images/tamansourt23.jpg" class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt24.jpg" class="fancybox " rel="ligthbox"><img src="images/tamansourt24.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt25.jpg" class="fancybox " rel="ligthbox"><img src="images/tamansourt25.jpg"  class=" img-fluid img-thumbnail" ></a>
            </div>
            <div class="column">
                <a href="images/tamansourt27.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt27.jpg" class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt28.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt28.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt29.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt29.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt30.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt30.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt31.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt31.jpg"  class=" img-fluid img-thumbnail" ></a>
            </div>
            <div class="column">
                <a href="images/tamansourt33.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt33.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt35.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt35.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt34.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt34.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt36.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt36.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt37.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt37.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt38.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt38.jpg"  class=" img-fluid img-thumbnail" ></a>
            </div>
            <div class="column">
                <a href="images/tamansourt40.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt40.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt41.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt41.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt42.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt42.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt32.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt32.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt39.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt39.jpg"  class=" img-fluid img-thumbnail" ></a>
                <a href="images/tamansourt26.jpg" class="fancybox" rel="ligthbox"><img src="images/tamansourt26.jpg"  class="zoom img-fluid img-thumbnail" ></a>
            </div>
    </div>
    </div>
    <x-footer></x-footer>
@endsection
@section("custum_scripts")
    <script src="{{ asset("js/ville.js") }}"></script>
    <script src="{{ asset("js/scroll.js") }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
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
        });
    </script>
@endsection

<header>
    <nav class="navbar navbar-expand-lg navbar-light  shadow-sm fixed-top" style="font-size: 16px;background-color: #fffaf7">

        <button
            class="navbar-toggler border-0 "
            type="button"

        >
            <i class="fa fa-bars" style="font-size: 30px" id="toggler"></i>
        </button>
        <span style="float: right">
            <a class="padd facebook" href="#" target="_blank"
            ><i class="fa fa-facebook" aria-hidden="true"></i
                ></a>
            <a class="padd youtube" href="#" target="_blank">
              <i class="fa fa-youtube" aria-hidden="true"></i
              ></a>
              <span class="padd search cursor" id="search-start" >
              <i class="fa fa-search" aria-hidden="true"></i
              ></span>
            <!--
            <a class="padd instagram" href="#" target="_blank"
            ><i class="fa fa-instagram" aria-hidden="true"></i
                ></a>
            <a class="padd twitter" href="#" target="_blank"
            ><i class="fa fa-twitter" aria-hidden="true"></i
                ></a>
                -->
          </span>
        <a href="{{ route('/') }}" class="navbar-brand d-md-inline-block d-lg-none  text-right ">الرئيسية</a>
        <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo02">
            <ul
                class="navbar-nav  ml-auto mt-2 mt-lg-0 mx-5"
                style="text-align: center"
            >
                <li class="nav-item cool-link mx-2">
                    <a class="nav-link" href="{{ route("contact") }}">اتـصـل بـنـا</a>
                </li>
                <li class="nav-item cool-link mx-2">
                    <a class="nav-link" href="{{ route('ville') }}">زيارة تامنصورت</a>
                </li>

                <li class="nav-item dropdown cool-link mx-2">
                    <a
                        class="nav-link dropdown-toggle "
                        href="#"
                        id="navbarDropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        الجماعة
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <a class="dropdown-item text-right py-2"  href="#">جماعة حربيل- تامنصورت</a>

                        <a class="dropdown-item text-right py-2" href="#">الإدارة الجماعية</a>

                        <a class="dropdown-item text-right py-2" href="#">المقاطعات</a>
                        <a class="dropdown-item text-right py-2" href="{{ route('specialite') }}">اختصاصات الجماعة</a>
                    </div>
                </li>
                <li class="nav-item dropdown cool-link mx-2">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        الحياة السياسية
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <a class="dropdown-item text-right py-2" href="#">العمدة</a>

                        <a class="dropdown-item text-right py-2" href="#">المكتب</a>

                        <a class="dropdown-item text-right py-2" href="#">المجلس الجماعي</a>

                        <a class="dropdown-item text-right py-2" href="#">مجالس المقاطعات</a>
                    </div>
                </li>

                <li class="nav-item active cool-link mx-2 d-md-inline-block d-sm-none">
                    <a class="nav-link" href="{{ route('/') }}"
                    >الرئيسية<span class="sr-only">(current)</span></a
                    >
                </li>
            </ul>
        </div>
        <div class="mobile d-none">
            <div class="close"><span class="cursor text-white">x</span></div>
            <ul
                class="mt-4"
                style="text-align: center"
            >
                <li class="nav-item active cool-link mx-2 d-md-inline-block d-sm-none">
                    <a class="nav-link" href="{{ route('/') }}"
                    >الرئيسية<span class="sr-only">(current)</span></a
                    >
                </li>
                <li class="nav-item dropdown cool-link mx-2">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        الحياة السياسية
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right w-100"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <a class="dropdown-item text-right py-2" href="#">العمدة</a>

                        <a class="dropdown-item text-right py-2" href="#">المكتب</a>

                        <a class="dropdown-item text-right py-2" href="#">المجلس الجماعي</a>

                        <a class="dropdown-item text-right py-2" href="#">مجالس المقاطعات</a>
                    </div>
                </li>

                <li class="nav-item dropdown cool-link mx-2">
                    <a
                        class="nav-link dropdown-toggle "
                        href="#"
                        id="navbarDropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        الجماعة
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right w-100"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <a class="dropdown-item text-right py-2"  href="#">جماعة حربيل- تامنصورت</a>

                        <a class="dropdown-item text-right py-2" href="#">الإدارة الجماعية</a>

                        <a class="dropdown-item text-right py-2" href="#">المقاطعات</a>
                    </div>
                </li>

                <li class="nav-item cool-link mx-2">
                    <a class="nav-link" href="{{ route('ville') }}">زيارة تامنصورت</a>
                </li>


                <li class="nav-item cool-link mx-2">
                    <a class="nav-link" href="{{ route("contact") }}">اتـصـل بـنـا</a>
                </li>
            </ul>
        </div>

    </nav>

</header>
<!-- <div id="loading"></div> page -->

<br />
<div class="container-fluid" style="margin-top: 25px">
    <div class="row tam d-flex justify-content-center text-center" >

            <span id="definition">
            </span>
        <span id="def-content">
          <i
              class="fa fa-building"
              aria-hidden="true"
              style="font-size: 60px"
          ></i>
          <h1>جماعة حربيل</h1>
          <p>الموقع الرسمي لجماعة حربيل- تامنصورت</p></span
        >
    </div>
    <br>
    <div class="row" style="text-align: center">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <a  href="{{ route('/') }}"> <h5 class="dash shadow-sm">مذكرة</h5></a> <br><br>
        </div>

        <div class="col-md-2">
            <a  href="{{ route('news') }}"><h5 class="dash shadow-sm">صحافة</h5> </a><br><br>
        </div>
        <div class="col-md-2">
            <a  href="{{ route('news') }}"><h5 class="dash shadow-sm">أخبار</h5></a> <br><br>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>

<div class="search-container d-none">
    <span id="search-close" class="cursor">x</span>
    <form action="{{ url('chercher') }}" method="GET">
    <div class="row search-content no-gutters mx-1">

        <div class="col-1">
            <button type="submit" class="bg-transparent border-0"><span class="fa fa-search text-white float-right cursor" style="font-size: 30px"></span></button>
        </div>
        <div class="col-9">
                <input type="text"  name="m" id="search" >
        </div>
        <div class="col-2  text-white text-left" style="font-size: 26px">
            البحث
        </div>

    </div></form>

</div>



<div class="col-xl-2 col-md-3 col-sm-12 " id="side-bar" >
    <ul class="list-group list-group-flush  shadow-sm" >
        <li class="list-group-item bg-indigo "><a href="#" class="nav-link  text-center">
                <img src="{{asset("images/user.png")}}" class="shadow" style="height: 60px; width: 60px;border-radius: 50%;margin: auto">
                <h5>الأدمن</h5>
                <div class="small"><em>ADMIN</em></div>
            </a></li>
        <li class="list-group-item bg-indigo text-right"><a href="{{ url("admin") }}" class="nav-link float-right w-100"><span class="fa fa-home"></span> الرئيسية  </a> </li>
        <li class="list-group-item bg-indigo text-right"><a href="{{ url("admin/posts_table") }}" class="nav-link float-right w-100"><span class="fa fa-file"></span> المقالات </a></li>
        <li class="list-group-item bg-indigo text-right"><a href="{{ url("admin/videos_table") }}" class="nav-link float-right w-100"><span class="fa fa-youtube"></span> الفيديوهات </a></li>
        <li class="list-group-item bg-indigo text-right"><a href="{{ url("contact/all") }}" class="nav-link float-right w-100"><span class="fa fa-envelope"></span> الرسائل </a></li>
        <li class="list-group-item bg-indigo text-right"><a href="#" class="nav-link float-right w-100"><span class="fa fa-columns"></span> الصور </a></li>
        <li class="list-group-item bg-indigo text-right"><a href="{{ url('cat/create') }}" class="nav-link float-right w-100"><span class="fa fa-cogs"></span> إعدادات </a></li>
        <li class="list-group-item bg-indigo text-right"><a href="{{ url('profile') }}" class="nav-link float-right w-100"><span class="fa fa-user"></span> معلوماتي </a></li>
        <li class="list-group-item bg-indigo text-right"><a href="{{ url("logout") }}" class="nav-link float-right w-100"><span class="fa fa-sign-out"></span> الخروج </a></li>
    </ul>
</div>

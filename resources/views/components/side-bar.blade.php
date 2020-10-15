<div class="col-xl-2 col-md-3 col-sm-12 " id="side-bar" >
    <ul class="list-group list-group-flush  shadow-sm" >
        <li class="list-group-item bg-indigo "><a href="#" class="nav-link  text-center">
                <img src="{{asset("images/user.png")}}" class="shadow" style="height: 60px; width: 60px;border-radius: 50%;margin: auto">
                <h5>الأدمن</h5>
                <div class="small"><em>ADMIN</em></div>
            </a></li>
        <li class="list-group-item bg-indigo "><a href="{{ url("admin") }}" class="nav-link float-right"> الرئيسية <span class="fa fa-home"></span> </a> </li>
        <li class="list-group-item bg-indigo "><a href="{{ url("admin/posts_table") }}" class="nav-link float-right"> المقالات <span class="fa fa-file"></span></a></li>
        <li class="list-group-item bg-indigo "><a href="{{ url("admin/videos_table") }}" class="nav-link float-right"> الفيديوهات <span class="fa fa-youtube"></span></a></li>
        <li class="list-group-item bg-indigo "><a href="{{ url("contact/all") }}" class="nav-link float-right"> الرسائل <span class="fa fa-envelope"></span></a></li>
        <li class="list-group-item bg-indigo "><a href="#" class="nav-link float-right"> الصور <span class="fa fa-columns"></span></a></li>
        <li class="list-group-item bg-indigo "><a href="{{ url('cat/create') }}" class="nav-link float-right"> إعدادات <span class="fa fa-cogs"></span></a></li>
        <li class="list-group-item bg-indigo "><a href="{{ url("logout") }}" class="nav-link float-right"> الخروج <span class="fa fa-sign-out"></span></a></li>
    </ul>
</div>

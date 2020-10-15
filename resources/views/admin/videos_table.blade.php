@extends("admin.template")
@section("admin")
<div class="card p-4 shadow-sm mx-5 my-3">
    <table class="table">
        <thead class="bg-light ">
            <tr class="text-right">
                <td>التحكم</td>
                <td>تاريخ النشر</td>
                <td>المصدر</td>
                <td>العنوان</td>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $v)
                <tr class="text-right">
                    <td>
                        <div class="btn-group btn-group-sm">
                            <form action="{{ url('video_delete',$v->id  ) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-sm border-0 btn-danger shadow-sm text-center"> حذف <span class="fa fa-trash"></span></button>
                            </form>
                            <a href="{{ url("video/edit/".$v->id) }}" class="btn-sm border-0 btn-primary shadow-sm text-center"> تعديل <span class="fa fa-edit"></span></a>
                        </div>
                    </td>
                    <td>{{date('m-d-Y', strtotime($v->created_at))}}</td>
                    <td><a href="{{ url($v->url) }}">{{ $v->url }}</a></td>
                    <td>{{ $v->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer bg-white d-flex justify-content-center">
        <div class="pagination_rounded">
            <ul>
                @if ($videos->onFirstPage())
                @else
                    <li> <a href="{{ $videos->previousPageUrl() }}" class="prev text-left"> <i class="fa fa-angle-left" aria-hidden="true"></i> السابق </a> </li>
                @endif
                @if($videos->lastPage()<=6)
                    @for($i = 1;$i<=$videos->lastPage();$i++)
                        @if($i == $videos->currentPage())
                            <li class="hidden-xs"><a href="{{ url('admin/videos_table?page='.$i) }}" class="active text-white">{{ $i }}</a> </li>
                        @else
                            <li class="hidden-xs"><a href="{{ url('admin/videos_table?page='.$i) }}">{{ $i }}</a> </li>
                        @endif
                    @endfor
                @else
                    @for($i = 1;$i<=$videos->lastPage();$i++)
                        @if($i == $videos->currentPage())
                            <li><a href="{{ url('admin/videos_table?page='.$i) }}" class="active text-white">{{ $i }}</a> </li>
                        @else
                            <li class="hidden-xs"><a href="{{ url('admin/videos_table?page='.$i) }}">{{ $i }}</a> </li>
                        @endif
                    @endfor
                    @if($posts->lastPage()-1>7)
                        <li><a>...</a> </li>
                    @endif
                    @if($videos->lastPage() == $videos->currentPage())
                        <li><a href="{{ url('admin/videos_table?page='.$videos->lastPage()) }}" class="active text-white">{{ $videos->lastPage() }}</a> </li>
                    @else
                        <li><a href="{{ url('admin/videos_table?page='.$videos->lastPage()) }}">{{ $videos->lastPage() }}</a> </li>
                    @endif
                @endif
                @if ($videos->hasMorePages())
                    <li><a href="{{ $videos->nextPageUrl() }}" class="next text-right"> التالي <i class="fa fa-angle-right" aria-hidden="true"></i></a> </li>
                @else
                @endif
            </ul>

        </div>
    </div>
</div>
@endsection


@extends("admin.template")
@auth
@section('custum_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('custum_styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section("admin")
    @if(session("success"))
        <div class="alert alert-success shadow text-right my-2 mx-5" >{{ session("success") }}</div>
    @endif
    @if(session("error"))
        <div class="alert alert-danger shadow text-right my-2 mx-5">{{ session("error") }}</div>
    @endif
    <div class="card shadow-sm mx-3 my-3">
        <div class="card-body p-2">
            <div class="table-responsive-md ">
                <table class="table ">
                    <thead class="bg-dark text-white">
                    <tr class="text-right">
                        <td>التحكم</td>
                        <td>الحالة</td>
                        <td>الملحقات</td>
                        <td>النوع</td>
                        <td>العنوان</td>
                        <td><input type="checkbox" class="form-control-sm" id="allPosts"></td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($posts as $post)
                        <tr class="text-right">
                            <td>
                                <div class="btn-group btn-group-sm">
                                        <button class="btn-sm border-0 btn-danger shadow-sm text-center deleteBtn" post-title="{{ $post->title }}" post-id="{{ $post->id }}" > حذف <span class="fa fa-trash"></span></button>
                                    <a href="{{ url("post/edit/".$post->id) }}" class="btn-sm border-0 btn-primary shadow-sm text-center"> تعديل <span class="fa fa-edit"></span></a>
                                </div>
                            </td>
                            <td>
                                @if($post->status)
                                    <span class="badge badge-success">مرئي</span>
                                @else
                                    <span class="badge badge-warning">غير مرئى</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($post->attachement))
                                <a href="{{ url("files/attachement/".$post->attachement) }}"><span class="fa fa-file-pdf"></span> {{ $post->attachement }}</a></td>
                            @else
                                    <span class="text-danger">لا يوجد</span>
                            @endif
                            <td>
                                @foreach($post->categories as $c)
                                    <span class="badge badge-dark">{{ $c->libelle }}</span>
                                @endforeach
                            </td>
                            <td>{{ $post->title }}</td>
                            <td><input type="checkbox" class="form-control-sm postItem" ></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <x-delete-modal></x-delete-modal>
                <div id="chooseAction" class="hide w-25">
                            <select  id="chooseAction" class="form-control text-center" style="direction: rtl">
                                <option value="default" selected disabled>--إختر--</option>
                                <option value="disable" class="text-right">حجب</option>
                                <option value="delete" class="text-right">حذف</option>
                            </select>
                </div>
                <div class="alert alert-danger text-right hide" id="delete_error">وقع خطأ !</div>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-center">

            <div class="pagination_rounded">
                <ul>
                    @if ($posts->onFirstPage())
                    @else
                        <li> <a href="{{ $posts->previousPageUrl() }}" class="prev text-left"> <i class="fa fa-angle-left" aria-hidden="true"></i> السابق </a> </li>
                    @endif
                    @if($posts->lastPage()<=6)
                        @for($i = 1;$i<=$posts->lastPage();$i++)
                            @if($i == $posts->currentPage())
                                    <li class="hidden-xs"><a href="{{ url('admin/posts_table?page='.$i) }}" class="active text-white">{{ $i }}</a> </li>
                                @else
                                    <li class="hidden-xs"><a href="{{ url('admin/posts_table?page='.$i) }}">{{ $i }}</a> </li>
                                @endif
                            @endfor
                        @else
                            @for($i = 1;$i<=$posts->lastPage();$i++)
                                @if($i == $posts->currentPage())
                                    <li><a href="{{ url('admin/posts_table?page='.$i) }}" class="active text-white">{{ $i }}</a> </li>
                                @else
                                    <li class="hidden-xs"><a href="{{ secure_url('admin/posts_table?page='.$i) }}">{{ $i }}</a> </li>
                                @endif
                            @endfor
                            @if($posts->lastPage()-1>7)
                                <li><a>...</a> </li>
                                @endif
                            @if($posts->lastPage() == $posts->currentPage())
                                    <li><a href="{{ url('admin/posts_table?page='.$posts->lastPage()) }}" class="active text-white">{{ $posts->lastPage() }}</a> </li>
                                @else
                                    <li><a href="{{ url('admin/posts_table?page='.$posts->lastPage()) }}">{{ $posts->lastPage() }}</a> </li>
                                @endif
                        @endif
                        @if ($posts->hasMorePages())
                            <li><a href="{{ $posts->nextPageUrl() }}" class="next text-right"> التالي <i class="fa fa-angle-right" aria-hidden="true"></i></a> </li>
                        @else
                        @endif
                </ul>

            </div>
        </div>
    </div>


@endsection
@section('custum_scripts')
    <script src="{{asset("js/admin.js")}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var postId;
        $(document).ready(function (){

            $("#allPosts").click(function (){
                $("#chooseAction").toggleClass('hide');
                if($(this).is(':checked')){
                    $(".postItem").each((index)=>{
                        $(".postItem")[index].checked = true;
                    });
                }else{
                    $(".postItem").each((index)=>{
                        $(".postItem")[index].checked = false;
                    });
                }
            });

            $('.postItem').click(function (){
                let allUncheck = true;
                let numberOfChecked = 0;
                $('.postItem').each((index)=>{
                    if($(".postItem")[index].checked == true){
                        allUncheck = false;
                        numberOfChecked++;
                    }
                })
                if(numberOfChecked>1){
                    $("#chooseAction").removeClass('hide');
                }
                if(allUncheck){
                    $("#chooseAction").addClass('hide');
                    $("#allPosts").prop('checked',false);
                }
            });
            $(".deleteBtn").click(function (){
                postId = $(this).attr('post-id');
                $("#deleteModalLabel").text($(this).attr('post-title'));
                $('#deleteModal').modal('show');
            });
        $('#deleteThePost').click(function (){

             $.ajax({
               url:'{{url('post_delete')}}/'+postId,
                type:'DELETE',
               success:function (){
                   $('#deleteModal').modal('hide');
                   location.reload();
               },
                 error:function (){
                     $('#deleteModal').modal('hide');
                     $("#delete_error").removeClass('hide');
                 }
            });
        });
        })


    </script>
@endsection
@endauth

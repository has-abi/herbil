@extends('admin.template')
@section('admin')
    <div class="card p-4 shadow-sm mx-5 my-3">
        <table class="table">
            <thead class="bg-light ">
            <tr class="text-right">
                <td>التحكم</td>
                <td>التاريخ</td>
                <td>الملحقات</td>
                <td>الموضوع</td>
                <td>البريد الإلكتروني</td>
                <td>الهاتف</td>
                <td>المرسل إليه</td>
            </tr>
            </thead>
            <tbody>
            @foreach($responses as $r)
                <tr>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <form action="{{ url('res_delete',$r->id  ) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-sm border-0 btn-danger shadow-sm text-center"> حذف <span class="fa fa-trash"></span></button>
                            </form>
                            <a href="#" class="btn-sm border-0 btn-primary show_content" data="{!! $r->content  !!} ">مشاهدة</a>
                        </div>
                    </td>
                    <td>{{date('m-d-Y', strtotime($r->created_at))}}</td>
                    <td>
                        @foreach($r->attachements as $ra)
                        <a href="{{ url('/att/'.$r->id) }}"><span class="fa fa-file"></span></a></td>
                        @endforeach
                    <td>{{ $r->contact->subject }}</td>
                    <td>{{ $r->contact->phone}}</td>
                    <td>{{ $r->contact->email }}</td>
                    <td>{{ $r->contact->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer d-flex justify-content-center bg-white">
            {{ $responses->render('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light ">
                    <h5 class="modal-title "  style="direction: rtl" id="showModalLabel">جواب الرسالة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right" style="direction: rtl" id="modal_content">

                </div>
            </div>
        </div>
    </div>
    <div>
    </div>
@endsection
@section('custum_scripts')
    <script src="{{asset("js/admin.js")}}"></script>
    <script>
        $(".show_content").click(function (){
            $("#modal_content").html($(this).attr('data'));
            $('#showModal').modal('show');
        })

    </script>
@endsection

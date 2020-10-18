@auth
@extends("admin.template")
@section("admin")
    <div class="card p-4 shadow-sm mx-5 my-3">
        <table class="table">
            <thead class="bg-light ">
                <tr class="text-right">
                    <td>التحكم</td>
                    <td>الإجابة</td>
                    <td>التاريخ</td>
                    <td>الموضوع</td>
                    <td>البريد الإلكتروني</td>
                    <td>الهاتف</td>
                    <td>المرسل</td>
                </tr>
            </thead>
            <tbody>
            @foreach($contacts as $c)
                <tr>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <form action="{{ url('contact_delete',$c->id  ) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-sm border-0 btn-danger shadow-sm text-center"> حذف <span class="fa fa-trash"></span></button>
                            </form>
                            @if(!$c->respond)
                            <a href="{{ url("contact/respond/".$c->id) }}" class="btn-sm border-0 btn-primary shadow-sm text-center"> أجب <span class="fa fa-send"></span></a>
                            @endif
                        </div>
                    </td>

                    <td>
                        @if($c->respond)
                            <span class="badge badge-success">تمت الإجابة </span>
                        @else
                            <span class="badge badge-warning">لم تتم الإجابة بعد</span>
                        @endif
                    </td>
                    <td>{{date('m-d-Y', strtotime($c->created_at))}}</td>
                    <td>{{ $c->subject }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->phone }}</td>
                    <td>{{ $c->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer d-flex justify-content-center bg-white">
            {{ $contacts->render('vendor.pagination.bootstrap-4') }}
        </div>
        <a href="{{ url('responses') }}" class="btn btn-info">الأجوبة</a>
    </div>
@endsection

@endauth



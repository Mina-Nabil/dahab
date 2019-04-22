@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">الموديلات</h4>
                <h6 class="card-subtitle">عرض بيانات الموديلات</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table color-bordered-table table-striped full-color-table full-dark-table hover-table" data-display-length='-1' data-order="[]" >
                        <thead>
                            <tr>
                                <th>رقم الموديل</th>
                                <th>وصف الموديل</th>
                                <th>نوع الموديل</th>
                                <th>صوره</th>
                                <th>تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Models as $model)
                            <tr>
                                <td>{{$model->MODL_SRNO}}</td>
                                <td>{{$model->MODL_DESC}}</td>
                                <td>{{$model->MDTP_NAME}}</td>
                                <td>
                                  @if(isset($model->MODL_IMGE))
                                  <img src="{{ asset('storage/' . $model->MODL_IMGE) }}" width=50 height=50></img>
                                  @endif
                                </td>
                                <td><a href="{{ url('models/edit/' . $model->id) }}"><img src="{{ asset('images/edit.png') }}" width=25 height=25></img></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

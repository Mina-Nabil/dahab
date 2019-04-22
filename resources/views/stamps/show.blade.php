@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">الاسطمبات</h4>
                <h6 class="card-subtitle">عرض بيانات الاسطمبات</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table color-bordered-table table-striped full-color-table full-dark-table hover-table" data-display-length='50' data-order="[]" >
                        <thead>
                            <tr>
                                <th>رقم الاسطمبات</th>
                                <th>وصف الاسطمبات</th>
                                <th>صوره</th>
                                <th>تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Stamps as $stamp)
                            <tr>
                                <td>{{$stamp->STMP_SRNO}}</td>
                                <td>{{$stamp->STMP_DESC}}</td>
                                <td>
                                  @if(isset($stamp->STMP_IMGE))
                                  <img src="{{ asset('storage/' . $stamp->STMP_IMGE) }}" width=50 height=50></img>
                                  @endif
                                </td>
                                <td><a href="{{ url('stamps/edit/' . $stamp->id) }}"><img src="{{ asset('images/edit.png') }}" width=25 height=25></img></a></td>
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

@extends('layouts.app')

@section('content')

<script>

function cancel(id){


  swal({
    title: "تأكيد الغاء طلب",
    text: "سوف يتم الغاء الطلب ، هل تريد الاستمرار ؟",
    buttons: true,
    icon: "warning"})
.then((value) => {
  if(value){
    window.location.replace('{{url("orders/cancel/")}}' + '/' +id)

    }
});




}

</script>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تاريخ الطلبات</h4>
                <h6 class="card-subtitle">عرض بيانات الطلبات</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table color-bordered-table table-striped full-color-table full-dark-table hover-table" data-display-length='-1' data-order="[]" >
                        <thead>
                            <tr>
                              <th>تاريخ الطلب</th>
                                <th>اسم المستخدم</th>
                                <th>مجموع اللون الاصفر</th>
                                <th>مجموع اللون الابيض</th>
                                <th>مجموع اللون الاحمر</th>
                                <th>تفاصيل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Orders as $order)
                            <tr title="{{$order->ORDR_CMNT}}" >
                                <td>{{$order->ORDR_DATE}}</td>
                                <td>{{$order->ORDR_CLNT}}</td>
                                <td>{{$order->ORDR_TOTL_YELW}}</td>
                                <td>{{$order->ORDR_TOTL_WHTE}}</td>
                                <td>{{$order->ORDR_TOTL_RED}}</td>
                                <td>
                                  <a href="{{ url('orders/profile/' . $order->id) }}"><i class="m-l-10 fas fa-search" style="color:#00c292; font-size: 20px;"></i></a>
                                  @if($order->ORDR_STTS == 1)
                                  <a href="{{ url('orders/modify/' . $order->id) }}"><i class="m-l-10  fas fa-edit" style="color:#343a40; font-size: 20px;"></i></a>
                                  <button class="btn" onclick="cancel({{$order->id}})"><i class="m-l-10 fas fa-window-close" style="color:#e46a76; font-size: 20px;"></i></button>
                                  @endif
                                </td>
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

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

function confirm(id){


  swal({
    title: "تأكيد طلب",
    text: "سوف يتم تأكيد الطلب ، هل تريد الاستمرار ؟",
    buttons: true,
    icon: "success"})
.then((value) => {
  if(value){
    window.location.replace('{{url("orders/confirm/")}}' + '/' +id)

    }
});

}

</script>


<div class="row">


  <div class="col-md-12">
      <div class="card">
          <div class="card-body">
              <h3 class="card-title">رقم الطلب : {{$order->ORDR_SRNO}} اسم المستخدم : {{$order->ORDR_CLNT}}</h3>
              <p class="card-text">تاريخ اصدار الطلب: {{$order->ORDR_DATE}}</p>
              @if(isset($order->ORDR_CMNT))
              <p class="card-text">{{$order->ORDR_CMNT}}</p>
              @endif
              @if($order->ORDR_STTS == 1)
              <button onclick="confirm({{$order->id}})" class="btn btn-success">تأكيد الطلب</button>
              <a href="{{url('orders/modify/'. $order->id) }}" class="btn btn-info">تعديل الطلب</a>
              <button onclick="cancel({{$order->id}})" class="btn btn-dark">إلغاء الطلب</button>
              @endif
          </div>
      </div>
  </div>


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تفاصيل الموديلات</h4>
                <h6 class="card-subtitle">عرض بيانات الطلب</h6>
                <div class="table-responsive m-t-40">

                  <input type=hidden  id="dt-header" value="
                        <th>اسم المستخدم</td>
                        <th > {{ $order->ORDR_CLNT}}</th><th></th>
                        <th>تاريخ الطلب</th>
                        <th >{{ $order->ORDR_DATE }}</th>
                   ">

                  <input type=hidden  id="dt-stamp-header" value="

                  ">

                    <table
                    @if($order->ORDR_STTS == 2)
                    id="example23"
                    @else
                    id="myTable"
                    @endif
                     class="table color-bordered-table table-striped full-color-table full-dark-table hover-table" data-display-length='-1' data-order="[]" >


                        <thead>

                            <tr>
                              <th >رقم الموديل</th>
                              <th></th>
                              <th></th>
                              <th >عدد</th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($items as $key => $item)
                          @if(isset($items[$key+1]))
                          <tr>
                          @else
                          <tr  >
                          @endif
                            <td >{{$item->MODL_SRNO}}</td>
                            <td>
                            <td></td>
                            <td >{{$item->ORIT_CONT}}</td>

                            <td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">تفاصيل الاسطمبات</h4>
                              <h6 class="card-subtitle">عرض بيانات الاسطمبات</h6>
                              <div class="table-responsive m-t-40">

                                <input type=hidden  id="dt-header" value="
                                      <th>اسم المستخدم</td>
                                      <th > {{ $order->ORDR_CLNT}}</th><th></th>
                                      <th>تاريخ الطلب</th>
                                      <th >{{ $order->ORDR_DATE }}</th>
                                 ">


                   <table
                   @if($order->ORDR_STTS == 2)
                   id="example233"
                   @else
                   id="myTable2"
                   @endif
                    class="table color-bordered-table table-striped full-color-table full-dark-table hover-table" data-display-length='-1' data-order="[]" >


                       <thead>
                        <tr>
                          <th>رقم الاسطمبه</th>
                          <th>عدد</th>
                          <th>اصفر</th>
                          <th>ابيض</th>
                          <th>احمر</th>
                        </tr>
                      </thead>

                      <tbody>
                          @foreach($stamps as $stamp)
                          <tr>
                            <td>{{$stamp->STMP_SRNO}}</td>
                            <td>{{$stamp->STMP_CONT}}</td>
                            <td>{{$stamp->STMP_YELW}}</td>
                            <td>{{$stamp->STMP_WHTE}}</td>
                            <td>{{$stamp->STMP_RED}}</td>
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

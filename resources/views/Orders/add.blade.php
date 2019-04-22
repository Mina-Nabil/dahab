@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $pageTitle }}</h4>
                <h5 class="card-subtitle">{{ $pageDescription }}</h5>
                <form class="form pt-3" method="post" action="{{ $formURL }}" enctype="multipart/form-data" >
                @csrf
                    <div class="form-group">
                        <label>اسم المستخدم*</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" list="users" class="form-control" placeholder="User Name" name=clientName aria-label="User Name" aria-describedby="basic-addon11" value="{{ (isset($order)) ? $order->ORDR_CLNT : old('clientName')}}" required>
                            <datalist id=users>
                              <option>كلارك</option>
                              <option>بولا</option>
                              <option>روماني</option>
                            </datalist>
                        </div>
                        <small> {{$errors->first('clientName')}} </small>
                    </div>

                    <div class="form-group">
                        <label>رقم الطلب</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="mdi mdi-barcode-scan"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Order Serial Number" name=serialNumber aria-label="Order Serial Number" aria-describedby="basic-addon11" value="{{ (isset($order)) ? $order->ORDR_SRNO : old('serialNumber')}}" >
                        </div>
                        <small> {{$errors->first('serialNumber')}} </small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> معلومات اضافيه</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon22"><i class="fas fa-list-ul"></i></span>
                            </div>
                            <input type="text" class="form-control" name=comment placeholder="Order Comment" aria-label="Order comment" aria-describedby="basic-addon22" value="{{ (isset($order)) ? $order->ORDR_CMNT : old('comment')}}" >
                        </div>
                    </div>


                    @if(isset($orderItems) && count($orderItems) > 0)

                    <div class="row ">
                      <label class="col-sm-12 nopadding" for="input-file-now-custom-1">تفاصيل الطلب</label>
                      <div class="col-lg-12" id="dynamicContainer"></div>
                      @foreach($orderItems as $key => $item)

                      <div class="form-group row col-lg-8 removeclass{{$key+1}}">
                      <div class="col-sm-12 nopadding">
                        <div class="form-group">

                          <select class="select2 form-control  custom-select" style="height:50px;"  name="MODL_ID[]">
                            @foreach($models as $model)
                            <option value="{{ $model->id }}"
                              @if($model->id == $item->ORIT_MODL_ID)
                              selected
                              @endif
                               >{{$model->MODL_SRNO}}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>

                        </div>
                        <div class="col-sm-4 nopadding">
                          <div class="form-group">
                          <div class="input-group">
                                <input type="number" step="1" class="form-control" id="count" name="ORIT_CONT[]" value="{{$item->ORIT_CONT}}" placeholder="Item Count">
                            <div class="input-group-append">
                              @if(isset($orderItems[$key+1]))
                              <button class="btn btn-danger" type="button" min=0 onclick="remove_education_fields({{$key+1}});"> <i class="fa fa-minus"></i> </button>
                              @else
                              <button class="btn btn-success" id="dynamicAddButton" type="button" onclick="education_fields();"><i class="fa fa-plus"></i></button>
                              @endif
                            </div>
                          </div>
                          </div>
                        </div>


                    @endforeach
                    </div>

                    @else
                    <div class="row">
                      <label class="col-sm-12 nopadding" for="input-file-now-custom-1">تفاصيل الطلب</label>
                      <div class="col-lg-12" id="dynamicContainer"></div>
                      <div class="col-lg-8 ">
                        <div class="form-group">

                          <select class="select2 form-control  custom-select" style="height:50px;" id="modl" name="MODL_ID[]">
                            @foreach($models as $model)
                            <option value="{{ $model->id }}">{{$model->MODL_SRNO}}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>

                        <div class="col-sm-4 nopadding">
                          <div class="form-group">
                          <div class="input-group">
                                <input type="number" step="1" min=0 class="form-control" id="count" name="ORIT_CONT[]"  placeholder="Model Count">
                            <div class="input-group-append">
                              <button class="btn btn-success" id="dynamicAddButton" type="button" onclick="education_fields();"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>
                          </div>
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{route('home') }}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

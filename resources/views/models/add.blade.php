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
                        <label>اسم الموديل*</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="mdi mdi-barcode-scan"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Model Serial Number" name=model_serial aria-label="Model Serial Number" aria-describedby="basic-addon11" value="{{ (isset($model)) ? $model->MODL_SRNO : old('model_serial')}}" required>
                        </div>
                        <small> {{$errors->first('model_serial')}} </small>
                    </div>
                    <div class="form-group">
                        <label>نوع الموديل</label>
                        <div class="input-group mb-3">
                            <select name=MODL_MDTP_ID class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                <option disabled>اختر نوع الموديل</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                @if(isset($model) && ($type->id == $model->MODL_MDTP_ID))
                                    selected
                                @endif
                                >{{$type->MDTP_NAME}}</option>
                                @endforeach
                            </select>
                        </div>
                        <small>{{$errors->first('MODL_MDTP_ID')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">وصف الموديل</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon22"><i class="fas fa-list-ul"></i></span>
                            </div>
                            <input type="text" class="form-control" name=MODL_DESC placeholder="Model Description" aria-label="Model Description" aria-describedby="basic-addon22" value="{{ (isset($model)) ? $model->MODL_DESC : old('MODL_DESC')}}" >
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="input-file-now-custom-1">صوره الموديل</label>
                        <div class="input-group mb-3">
                            <input type="file" id="input-file-now-custom-1" name=photo class="dropify" data-default-file="{{ (isset($model->MODL_IMGE)) ? asset( 'storage/'. $model->MODL_IMGE ) : old('photo') }}" />
                        </div>
                    </div>
                    @if(isset($ModelStamps) && count($ModelStamps) > 0)

                    <div class="row ">
                      <label class="col-sm-12 nopadding" for="input-file-now-custom-1">اسطمبات الموديل</label>
                      <div class="col-lg-12" id="dynamicContainer"></div>
                      @foreach($ModelStamps as $key => $modlstmp)

                      <div class="form-group row col-lg-12 removeclass{{$key+1}}">
                      <div class="col-sm-2 nopadding">
                        <div class="form-group">

                          <select class="select2 form-control  custom-select" style="height:50px;"  name="stamp[]">
                            @foreach($Stamps as $stamp)
                            <option value="{{ $stamp->id }}"
                              @if($stamp->id == $modlstmp->MDST_STMP_ID)
                              selected
                              @endif
                               >{{$stamp->STMP_SRNO}}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>
                        <div class="col-sm-2 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="red" name="red[]" value="{{$modlstmp->MDST_RED}}" placeholder="اللون الاحمر">
                            </div>
                        </div>
                        <div class="col-sm-1 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="red" name="rdmm[]" value="{{$modlstmp->MDST_RDMM}}" placeholder="اللون الاحمر">
                            </div>
                        </div>

                        <div class="col-sm-2 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="yellow" name="yellow[]" value="{{$modlstmp->MDST_YELW}}" placeholder="اللون الاصفر">
                            </div>
                        </div>

                        <div class="col-sm-1 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="yellow" name="ylmm[]" value="{{$modlstmp->MDST_YLMM}}" placeholder="اللون الاصفر">
                            </div>
                        </div>

                        <div class="col-sm-2 nopadding">
                          <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="white" name="white[]" value="{{$modlstmp->MDST_WHTE}}" placeholder="اللون الابيض">
                              </div>
                            </div>

                            <div class="col-sm-2 nopadding">
                              <div class="form-group">
                                <div class="input-group">
                                  <input type="number" step="0.01" class="form-control" id="white" name="whmm[]" value="{{$modlstmp->MDST_WHMM}}" placeholder="اللون الابيض">

                                  <div class="input-group-append">
                                    @if(isset($ModelStamps[$key+1]))
                                    <button class="btn btn-danger" type="button" onclick="remove_education_fields({{$key+1}});"> <i class="fa fa-minus"></i> </button>
                                    @else
                                    <button class="btn btn-success" id="dynamicAddButton" type="button" onclick="education_fields();"><i class="fa fa-plus"></i></button>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                    @endforeach
                    </div>

                    @else
                    <div class="row">
                      <label class="col-sm-12 nopadding" for="input-file-now-custom-1">اسطمبات الموديل</label>
                      <div class="col-lg-12" id="dynamicContainer"></div>
                      <div class="col-lg-2 ">
                        <div class="form-group">

                          <select class="select2 form-control  custom-select" style="height:50px;" id="stamp" name="stamp[]">
                            @foreach($Stamps as $stamp)
                            <option value="{{ $stamp->id }}">{{$stamp->STMP_SRNO}}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>
                        <div class="col-sm-2 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="red" name="red[]" placeholder="اللون الاحمر">
                            </div>
                        </div>

                        <div class="col-sm-1 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="red" name="rdmm[]" placeholder="مللي">
                            </div>
                        </div>

                        <div class="col-sm-2 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="yellow" name="yellow[]" placeholder="اللون الاصفر">
                            </div>
                        </div>

                        <div class="col-sm-1 nopadding">
                            <div class="form-group">
                                <input type="number" step="0.01" class="form-control" id="yellow" name="ylmm[]" placeholder="مللي">
                            </div>
                        </div>

                        <div class="col-sm-2 nopadding">
                            <div class="form-group">
                              <input type="number" step="0.01" class="form-control" id="white" name="white[]"  placeholder="اللون الابيض">
                            </div>
                        </div>

                        <div class="col-sm-2 nopadding">
                          <div class="form-group">
                          <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="yellow" name="whmm[]" placeholder="مللي">

                            <div class="input-group-append">
                              <button class="btn btn-success" id="dynamicAddButton" type="button" onclick="education_fields();"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>
                          </div>
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{url('models/show') }}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

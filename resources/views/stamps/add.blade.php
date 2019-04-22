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
                        <label>رقم الاسطمبة*</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="mdi mdi-barcode-scan"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Stamp Serial Number" name=stamp_serial aria-label="Stamp Serial Number" aria-describedby="basic-addon11" value="{{ (isset($stamp)) ? $stamp->STMP_SRNO : old('stamp_serial')}}" required>
                        </div>
                        <small> {{$errors->first('stamp_serial')}} </small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">وصف الاسطمبة</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon22"><i class="fas fa-list-ul"></i></span>
                            </div>
                            <input type="text" class="form-control" name=STMP_DESC placeholder="Stamp Description" aria-label="Stamp Description" aria-describedby="basic-addon22" value="{{ (isset($stamp)) ? $stamp->STMP_DESC : old('STMP_DESC')}}" >
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="input-file-now-custom-1">صوره الاسطمبة</label>
                        <div class="input-group mb-3">
                            <input type="file" id="input-file-now-custom-1" name=photo class="dropify" data-default-file="{{ (isset($stamp->STMP_IMGE)) ? asset( 'storage/'. $stamp->STMP_IMGE ) : old('photo') }}" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{url('stamps/show') }}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

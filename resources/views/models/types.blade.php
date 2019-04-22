@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">انواع الموديلات</h4>
                <h6 class="card-subtitle">عرض كل انواع الموديلات</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table color-bordered-table table-striped full-color-table full-dark-table hover-table" data-display-length='-1' data-order="[]" >
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Types as $type)
                            <tr>
                                <td>{{$type->MDTP_NAME}}</td>
                                <td><a href="{{ url('models/types/' . $type->id) }}"><img src="{{ asset('images/edit.png') }}" width=25 height=25></img></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
      <div class=card>
        <div class="card-body">
            <h4 class="card-title">{{$formTitle}}</h4>
            <form class="form pt-3" method="post" action="{{ $formURL }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">اسم نوع الموديل</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon22"><i class="ti-pallete"></i></span>
                    </div>
                    <input type="text" class="form-control" name=typeName placeholder="Model Type Name" aria-label="Model Type Name" aria-describedby="basic-addon22" value="{{ (isset($selectedType)) ? $selectedType->MDTP_NAME : old('typeName')}}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2">{{$buttonText}}</button>
            </form>
          </div>
      </div>
    </div>
</div>

@endsection

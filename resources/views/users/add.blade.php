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
                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" name=username aria-label="Username" aria-describedby="basic-addon11" value="{{ (isset($user)) ? $user->username : old('username')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>نوع المستخدم</label>
                        <div class="input-group mb-3">
                            <select name=typeID class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option disabled>اختر نوع المستخدم</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                @if(isset($user) && $type->id == $user->typeID)
                                    selected
                                @endif
                                >{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">الاسم الكامل</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon22"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name=fullname placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon22" value="{{ (isset($user)) ? $user->fullname : old('fullname')}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">رقم التليفون</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon22"><i class="mdi mdi-cellphone-iphone"></i></span>
                            </div>
                            <input type="text" class="form-control" name=mobNumber placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="basic-addon22" value="{{ (isset($user)) ? $user->mobNumber : old('mobNumber')}}" >
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="input-file-now-custom-1">صوره المستخدم</label>
                        <div class="input-group mb-3">
                            <input type="file" id="input-file-now-custom-1" name=photo class="dropify" data-default-file="{{ (isset($user->image)) ? asset( 'storage/'. $user->image ) : old('photo') }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>كلمه السر*</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                            </div>
                            <input type="text" class="form-control" name=password placeholder="Password" aria-label="Password" aria-describedby="basic-addon33"
                            @if($isPassNeeded)
                            required
                            @endif
                            >
                            <small>{{$errors->first('password')}}</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a href="{{route('users/show') }}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

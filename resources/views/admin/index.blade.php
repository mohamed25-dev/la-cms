@extends('admin.app')

@section('breadcrumb')
        الإحصائيات
@endsection

@section('content')
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fas fa-fw fa-th-list"></i>
              </div>
              <div class="mr-5">المنشورات {{$postsCount}} </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('posts.index') }}">
              <span class="float-left">المزيد</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">التصنيفات {{$categoriesCount}}  </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
            <a class="card-footer text-white clearfix small z-1" href="{{ route('categories.index') }}">
              <span class="float-left">المزيد</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">الأعضاء {{$usersCount}} </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('users.index') }}">
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">المزيد</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"> التعليقات {{$commentsCount}}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">المزيد</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
 
@endsection

@section('script')

@endsection
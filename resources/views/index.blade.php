@extends('layouts.app')

@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">
    <h2 class="my-4">
        المنشورات
    </h2>

    {{-- @includewhen(!count($posts),'alerts.empty',['msg'=>'لا توجد منشورات']) --}}

    {{-- @foreach($posts as $post)
    <!-- Blog Post -->
    <div class="card mb-4">
        <img class="card-img-top" src="{{ $post->image_path }}" alt="">
        <div class="card-body">
          <h3 class="card-title">{{$post->title}}</h3>
          <p class="card-text">{{ str_limit($post->body , 200) }}</p>
          <a href="{{ route('post.show',$post->id)}}" class="btn btn-primary">المزيد </a>
        </div>
        <div class="card-footer text-muted">
          نشر  {{$post->created_at->diffForHumans() }}
          بواسطة<a href="{{ route('profile',$post->user->id) }}"> {{$post->user->name}}</a>
        </div>
    </div>
    @endforeach --}}

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
         {{-- {{ $posts->links() }} --}}
    </ul>
</div>

@include('partials.sidebar')

@endsection
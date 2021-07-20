<!-- Sidebar Widgets Column -->
<div class="col-md-4">
  <!-- Categories Widget -->
  <div class="card">
      <h5 class="card-header">التصنيفات</h5>
      <div class="card-body">
          <ul class="nav flex-column">
              @foreach($categories as $cat)
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('category',[$cat->id,$cat->slug]) }}">{{$cat->title}}</a>
              </li>
              @endforeach
          </ul>
      </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4 text-right">
      <h5 class="card-header">آخر التعليقات</h5>
          <ul class="list-group p-0">
          @foreach($recentComments as $comment)
              <li class="list-group-item">
                  <img class="avatar" src="{{ asset($comment->user->profile->avatar) }}" alt="">
                  <a href="{{route('posts.show',$comment->post->id)}}">{{ Str::limit($comment->body,30) }}</a>
              </li>
          @endforeach
          </ul>
  </div>
</div>
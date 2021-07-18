@foreach ($post->comments as $comment)
    <!-- Blog Post -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-1 p-3">
                    <img class="avatar" src="{{ asset('/storage/avatars/avatar.png') }}" alt="">
                </div>
                <p class="card-text">{{ $comment->body }}</p>
            </div>
        </div>

        <div class="card-footer text-muted">
            نشر {{ $comment->created_at->diffForHumans() }}
            {{-- بواسطة<a href="{{ route('profile',$comment->user->id) }}"> {{$comment->user->name}}</a> --}}
            بواسطة<a href="#"> {{ $comment->user->name }}</a>
        </div>
    </div>
@endforeach

@includewhen(!count($data->comments) ,'alerts.empty', ['msg'=>'لا توجد أي تعليقات بعد'])

@foreach ($data->comments as $comment)
    <div class="row bg-white mb-2 p-3">
        <div class="col-lg-12 border-bottom p-2 text-wrap">
            <a href="{{ route('posts.show', $comment->post->id) }}#comments">
                <p class="card-text">{{ Str::limit($comment->body, 70) }}</p>
            </a>
        </div>
        <div class="mt-2">
            <h6><small>{{ Str::limit($comment->post->title, 50) }}</small></h6>
        </div>
    </div>
@endforeach

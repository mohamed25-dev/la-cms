@extends('layouts.app')

@section('content')
    <div class="container text-muted">
        <div class="row  bg-white p-3 mb-4">
            <div class="col-md-3 text-center">
                <img class="profile mb-2" src="{{ optional($data->profile)->avatar }}" alt="" />
            </div>

            <div class="col-md-9 text-md-right text-center">
                <h2>{{ $data->name }}</h2>
                <p class="word-break">{{ optional($data->profile)->bio }}</p>
                <a href="{{ optional($data->profile)->website }}"> {{ optional($data->profile)->website }}</a>
            </div>
        </div>

        <div class="row p-3">
            <div class="col-md-12">
                <ul class="nav nav-tabs mb-3">
                    @php
                        $user_id = $data->id;
                        $comments = Route::current()->getName() == 'userComments';
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ $comments ? '' : 'active' }}"
                            href="{{ route('profile', $user_id) }}">المشاركات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $comments ? 'active' : '' }}"
                            href="{{ route('userComments', $user_id) }}">التعليقات</a>
                    </li>
                </ul>

                @if ($comments)
                    @include('users.comments_section')
                @else
                    @include('users.posts_section')
                @endif
            </div>
        </div>
    </div>
@endsection

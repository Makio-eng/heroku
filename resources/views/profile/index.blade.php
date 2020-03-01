@extends('layouts.front')
@section('title', 'Profile')

@section('content')
    <img src="{{ asset('storage/image/Breaking-News-Logo.png') }}">
    <h1 class="profile-logo">ユーザー 一覧</h1>
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                  氏名：{{ str_limit($post->name, 150) }}
                                </div>
                                <div class="body">
                                  性別：{{ str_limit($post->gender, 1500) }}
                                </div>
                                <div class="body">
                                  趣味：{{ str_limit($post->hobby, 1500) }}
                                </div>
                                <div class="body">
                                  自己紹介：{{ str_limit($post->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
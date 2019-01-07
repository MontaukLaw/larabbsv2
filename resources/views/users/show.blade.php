@extends('layouts.default')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            {{-- 用户信息 --}}
            <section class="user_info">
                @include('shared._user_info', ['user' => $user])
            </section>

            {{-- 关注或者取关 --}}
            @if (Auth::check())
                @include('users._follow_form')
            @endif

            {{-- 社交状态, 例如多少粉丝, 多少微博, 关注多少人之类 --}}
            <section class="stats mt-2">
                @include('shared._stats', ['user' => $user])
            </section>
            <hr>
            {{-- 文章详情 --}}
            <section class="status">
                @if ($articles->count() > 0)
                    <ul class="list-unstyled">
                        @foreach ($articles as $article)
                            {{--{{ $article->content }}--}}
                            @include('articles._article', ['user' => $user])
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        {!! $articles->render() !!}
                    </div>
                @else
                    <p>没有数据！</p>
                @endif
            </section>
        </div>
    </div>
@stop
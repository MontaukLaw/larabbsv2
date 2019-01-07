@extends('layouts.default')
@if($type=='followers')
    @section('title', $user->name.' 的粉丝们')
@else
    @section('title', $user->name.' 都粉了谁')
@endif

@section('content')
    <div class="offset-md-2 col-md-8">
        @if($type=='followers')
            <h2 class="mb-4 text-center">{{$user->name.' 的粉丝们'}}</h2>
        @else
            <h2 class="mb-4 text-center">{{$user->name.' 都粉了谁'}}</h2>
        @endif
        <div class="list-group list-group-flush">
            @foreach ($users as $user)
                <div class="list-group-item">
                    <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32>
                    <a href="{{ route('users.show', $user) }}">
                        {{ $user->name }}
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            {!! $users->render() !!}
        </div>
    </div>
@stop


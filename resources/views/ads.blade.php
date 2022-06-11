@extends('layout')

@section('content')
    <h2>Аdvertisement</h2>
@forelse($ads as $ad)
    {{$ad->name}}
    <br> Author: {{$ad->user->name}} <br>
    Tags:
    @foreach($ad->tags as $tag)
         {{$tag->name}}
    @endforeach
    <br>
    <h3>Comments</h3>
    @foreach($ad->comments as $comment)
       <p>{{$comment->feedback}} Author: {{$comment->user->name}}</p>
    @endforeach
    <hr>
@empty
    <p>no advertisement</p>
@endforelse
{{ $ads->links() }}
@endsection

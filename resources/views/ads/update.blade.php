@extends('layout')

@section('content')
    <form method="post" action="{{ route('ads.update', ['ads' => $ads->id]) }}">
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Steve Rogers" value="{{old('name', $ads->user->name)}}">

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
            <div class="mb-3">
                <label for="body" class="form-label">Discription</label>
                <textarea type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body" placeholder="text" value="{{old('body', $ads->body)}}" rows="3"></textarea>
                @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Update" />
            </div>
        @csrf
    </form>
    @csrf
@endsection

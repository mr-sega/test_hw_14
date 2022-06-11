@extends('layout')

@section('content')
    <a href="{{route('ads.create')}}" type="button" class="btn btn-primary">Add</a>
    <hr>
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Body</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($ads as $ad)
            <tr>
                <th scope="row">{{$ad->id}}</th>
                <td>{{$ad->name}}</td>
                <td>{{$ad->body }}</td>
                <td>{{$ad->created_at->diffForHumans() }}</td>
                <td>{{$ad->updated_at->diffForHumans() }}</td>
                <td>
                    @can('update', $ad)
                    <a href="/ads/{{$ad->id}}/edit" type="button" class="btn btn-primary">Edit</a>
                    @endcan
                        <hr>
                        @can('delete', $ad)
                        <form action="/ads/{{$ad->id}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="delete" />
                    </form>
                        @endcan
                </td>
            </tr>
        @empty
            <p>No ads</p>
            <tr>
                <td colspan="6">No users</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div>
        {{ $ads->links() }}
    </div>
@endsection

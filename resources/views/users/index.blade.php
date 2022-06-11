@extends('layout')

@section('content')
    <a href="{{route('users.create')}}" type="button" class="btn btn-primary">Add</a>
    <hr>
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name }}</td>
            <td>{{$user->email }}</td>
            <td>{{$user->created_at->diffForHumans() }}</td>
            <td>{{$user->updated_at->diffForHumans() }}</td>
            <td>
                <a href="{{route('users.edit', ['user' => $user->id] )}}" type="button" class="btn btn-primary">Edit</a>
                <hr>
                <form action="{{route('users.destroy', ['user' => $user->id] )}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="delete" />
                </form>
            </td>
        </tr>
        @empty
            <p>No users</p>
        <tr>
            <td colspan="6">No users</td>
        </tr>
        @endforelse
        </tbody>
    </table>
@endsection

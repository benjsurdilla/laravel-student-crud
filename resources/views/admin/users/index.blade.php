@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Users</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <label>Roles</label><br />
                                    <input type="checkbox" value="admin" id="admin" name="admin">
                                    <label for="red">Admin</label>
                                    <input type="checkbox" value="author" id="author" name="author">
                                    <label for="yellow">Author</label>
                                    <input type="checkbox" value="user" id="user" name="user">
                                    <label for="green">User</label> 
                        @foreach($users as $user)
                            <tr>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</th>
                                <th>
                                    
                                    
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                    </a>
                                    <a href="{{ route('admin.impersonate', $user->id) }}" class="float-left">
                                        <button type="button" class="btn btn-success btn-sm">Impersonate User</button>
                                    </a>
                                    <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </th>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

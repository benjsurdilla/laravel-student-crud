@extends('layouts.app')


@section('content')

@if($message = Session::get('sucess'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

@endif

<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <marquee behavior="" direction="">Laravel 5.8 Student Tutorial</marquee>
        </div>
        <div class="pull-right">
            <a href="{{ route('students.create') }} " class="btn btn-lg btn-success">Register New Student</a>
        </div>
    </div>
</div>
<br/>

<table class="table table-bordered table-dark">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Country</th>
        <th>City</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    @foreach($students as $key => $student) 
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $student->first_name }}</td>
        <td>{{ $student->last_name }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->country }}</td>
        <td>{{ $student->city }}</td>
        <td>{{ $student->address }}</td>
        <td>
            <form action="{{ route('students.destroy', $student->id) }}" method="post">
               <br><br>
                @method('DELETE')
                @csrf

                <button typ="submit" class="btn btn-danger">Delete</button>

                <a href=" {{route('students.show', $student->id)}} " class="btn btn-warning">Show</a>

                <a href="{{ route('students.edit',$student->id) }}" class="btn btn-info">Edit</a>

            </form>
        </td>
    </tr>
    @endforeach

</table>










@endsection
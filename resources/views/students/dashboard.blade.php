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

        <!-- <label>Gender</label><br />
         <input type="checkbox" value="Male" id="male" name="male">
         <label for="red">Male</label>
         <input type="checkbox" value="Female" id="female" name="female">
         <label for="yellow">Female</label> -->

        <div class="pull-right">
        @hasrole('admin')
            <a href="{{ route('students.create') }} " class="btn btn-lg btn-success">Register New Student</a>
        @endhasrole
        @hasrole('author')
            <a href="{{ route('students.create') }} " class="btn btn-lg btn-success">Register New Student</a>
        @endhasrole
        </div>
    </div>
</div>
<br/>
 <form method="GET" action="{{ route('students.index')  }}">
@csrf

<div class="form-group col-md-6 row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-8">
                                    <input type="radio" value="Male" id="male" name="gender">
                                    <label for="male">Male</label>
                                    <input type="radio" value="Female" id="female" name="gender">
                                    <label for="female">Female</label>
 </div>
     
 </div>

 <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('View') }}
                                </button>
                            </div>
</div>

<table class="table table-bordered table-dark">
    <tr>
        <th>#</th>
        <!-- <th>Image</th> -->
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
        <!-- <td>{{ $student->images }}</td> -->
        <td>{{ $student->first_name }}</td>
        <td>{{ $student->last_name }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->country }}</td>
        <td>{{ $student->city }}</td>
        <td>{{ $student->address }}</td>
        </form>
        <td>
        
            <form action="{{ route('students.destroy', $student->id) }}" method="post">
               <br><br>
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger">Delete</button>

                <a href=" {{route('students.show', $student->id)}} " class="btn btn-warning">Show</a>

                <a href="{{ route('students.edit',$student->id) }}" class="btn btn-info">Edit</a>

            </form>
        </td>
    </tr>
    @endforeach

</table>

<!-- <form method="GET" action="{{ route('students.index') }}">
@csrf
                    <div class="form-group col-md-6 row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-8">
                                    <input type="checkbox" value="Male" id="male" name="gender">
                                    <label for="male">Male</label>
                                    <input type="checkbox" value="Female" id="female" name="gender">
                                    <label for="female">Female</label>
                        </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('View') }}
                                </button>
                            </div>
                        </div>-->

{{ $students->links() }}












@endsection

@section('scripts')
<!-- <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script> -->


@endsection
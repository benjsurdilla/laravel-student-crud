@extends('layouts.app')

@section('content')


@if($errors->any())

<div class="alert alert-danger">
    <strong>Sorry please check your input field!</strong> process failed please try again! <br><br>

    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>

@endif







<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Student') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.update', $students->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-md-6 row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <input  type="text" class="form-control" name="first_name" value="{{ $students->first_name }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="last_name" value="{{ $students->last_name }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-8">
                                <input  type="text" class="form-control" name="gender" value="{{ $students->gender }}" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="country" value="{{ $students->country }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="city" value="{{ $students->city }}">
                            </div>
                        </div>
 
                        <div class="form-group col-md-6 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="address" style="height:100px;" >{{ $students->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('students.index') }}" class="btn btn-lg btn-warning">Return</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

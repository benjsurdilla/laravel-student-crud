@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Profile') }}</div>

                <div class="card-body">
                    

                        <div class="form-group col-md-6 row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <strong> {{ $students->first_name }}</strong>
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <strong> {{ $students->last_name }}</strong>
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-8">
                                <strong> {{ $students->gender }}</strong>
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-8">
                                <strong> {{ $students->country }}</strong>
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                            <div class="col-md-8">
                                <strong> {{ $students->city }}</strong>
                            </div>
                            
                        </div>
 
                        <div class="form-group col-md-6 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        
                            <div class="col-md-8">
                                <strong> {{ $students->address }}</strong>
                            </div>
                        
                        </div>

                        <div class="form-group">
                           
                                <a href="{{ route('students.index') }}" class="btn btn-lg btn-warning">Return</a>
                        </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

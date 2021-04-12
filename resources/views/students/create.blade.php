@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Student') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf

                        <div class="form-group col-md-6 row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <input  type="text" class="form-control" name="first_name">
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="last_name">
                            </div>
                        </div>

                        <!-- <div class="form-group col-md-6 row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-8">
                                <input  type="text" class="form-control" name="gender" required>
                            </div>
                        </div> -->
                        <!-- <div class="form-group col-md-6 row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="col-md-8">
                                <select class="form-control" name="gender" required="required">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                </select>
                            </div>
                            
                        </div> -->
                        <div class="form-group col-md-6 row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-8">
                                    <input type="checkbox" value="Male" id="male" name="gender">
                                    <label for="red">Male</label>
                                    <input type="checkbox" value="Female" id="female" name="gender">
                                    <label for="yellow">Female</label>
                        </div>
                            
                        </div>
                        <div class="form-group col-md-6 row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="country">
                            </div>
                        </div>

                        <div class="form-group col-md-6 row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="city">
                            </div>
                        </div>
 
                        <div class="form-group col-md-6 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="address" style="height:100px;"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Register') }}
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

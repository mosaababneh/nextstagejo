@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">

            <a href="/companies/{{$id}}" class="btn btn-secondary">Back</a>    <br>   <br>
                {!! Form::open([ 'action' => ['App\Http\Controllers\EmployeesController@store',$id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                    <div class="form-group">
                        {{Form::label('title', 'First name')}}
                        {{Form::text('First_name', '', ['class' => 'form-control', 'placeholder' => 'First name ...'])}}
                        @error('First_name')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{Form::label('title', 'last name')}}
                        {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'last name ...'])}}
                        @error('last_name')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        {{Form::label('title', 'Email')}}
                        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => '...@gmail.com'])}}
                        @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        {{Form::label('', 'phone')}}
                        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => '0790000000'])}}
                        @error('phone')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        </div>
 
                    <br>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
               

                
              
            </div>
        </div>
    </div>

@endsection

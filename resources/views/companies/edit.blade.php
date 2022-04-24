@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">

            <a href="/companies" class="btn btn-secondary">Back</a>    <br>   <br>
            {!! Form::open(['action' => ['App\Http\Controllers\CompaniesController@update', $company->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                    <div class="form-group">
                        {{Form::label('title', 'Name')}}
                        {{Form::text('Name', $company->Name, ['class' => 'form-control', 'placeholder' => 'Name ...'])}}
                        @error('Name')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        {{Form::label('title', 'Email')}}
                        {{Form::text('email', $company->email, ['class' => 'form-control', 'placeholder' => '...@gmail.com'])}}
                        @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        {{Form::label('', 'website')}}
                        {{Form::text('website', $company->website, ['class' => 'form-control', 'placeholder' => 'https://www.nextstagejo.com/'])}}
                        @error('website')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        </div>

                   
                    <br>

                    <div class="form-group">
                        {{Form::label('', 'Add logo File jpg')}}
                        {{Form::file('logo')}}
                        @error('logo')
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

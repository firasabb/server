@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <table class="table">
                        <tr>
                            <th scope="col">
                                ID
                            </th>
                            <th scope="col">
                                Language
                            </th>
                            <th scope="col">
                                Date Created
                            </th>
                            <th scope="col">
                                Date Updated
                            </th>
                            <th scope="col">
                                Actions
                            </th>   
                        </tr>
                        @foreach ($languages as $language)
                            <tr>
                                <td>
                                    {{$language->id}}
                                </td>
                                <td>
                                    {{$language->language}}
                                </td>
                                <td>
                                    {{$language->created_at}}
                                </td>
                                <td>
                                    {{$language->updated_at}}
                                </td>
                                <td>
                                    <a href="{{ url('/panel/languages/show/' . $language->id) }}" class="btn btn-success">Show/Edit</a>

                                    {!! Form::open(['url' => url('/panel/languages/show/' . $language->id), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>

            </div>
            <div class="card">
                {!! Form::open(['url' => url('/panel/languages/create'), 'class' => 'form-group', 'enctype' => 'multipart/form-data']) !!}
                    {{ Form::label('language', 'Language') }}
                    {{ Form::text('language', '', ['class' => 'form-control']) }}

                    {{ Form::label('photo-link', 'Photo Link') }}
                    {{ Form::text('photo_link', '', ['class' => 'form-control']) }}

                    {{ Form::file('photo', ['class' => 'form-control']) }}

                    {{ Form::submit('Add a language', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
        </div>
    </div>
</div>
@endsection

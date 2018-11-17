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

                                    {!! Form::open(['url' => url('/panel/languages/show/' . $language->id), 'class' => 'form-group', 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) !!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                    </table>

            </div>
            <div class="card">
                {!! Form::open(['url' => url('/panel/languages/show/' . $language->id), 'class' => 'form-group', 'method' => 'PUT']) !!}
                    {{ Form::label('language', 'Language') }}
                    {{ Form::text('language', $language->language, ['class' => 'form-control']) }}

                    {{ Form::label('photo-link', 'Photo Link') }}
                    {{ Form::text('photo_link', $language->photo, ['class' => 'form-control']) }}

                    {{ Form::file('photo', ['class' => 'form-control']) }}
                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
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

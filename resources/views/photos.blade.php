@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <table class="table">
                        <tr>
                            <th scope="col">
                                Name
                            </th>
                            <th scope="col">
                                Photo
                            </th>
                            <th scope="col">
                                Actions
                            </th>   
                        </tr>
                        @foreach ($photos as $photo)
                        @if ($photo == ".gitignore")
                            @else
                                <tr>
                                    <td>
                                        {{$photo}}
                                    </td>
                                    <td>
                                        <img src='{{ Storage::url($photo) }}' class="img-fluid">
                                    </td>
                                    <td>
                                        {!! Form::open(['url' => url('/panel/photos/' . $photo), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                            {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>

            </div>
            <div class="card">
                {!! Form::open(['url' => url('/panel/photos/upload'), 'class' => 'form-group', 'enctype' => 'multipart/form-data']) !!}
                    {{ Form::label('photo', 'Photo') }}
                    {{ Form::file('photo', ['class' => 'form-control']) }}
                    {{ Form::submit('Upload Photo', ['class' => 'btn btn-primary']) }}
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

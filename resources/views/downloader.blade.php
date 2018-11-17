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
                                Email
                            </th>
                            <th scope="col">
                                Name
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
                                {{$downloader->id}}
                            </td>
                            <td>
                                {{$downloader->email}}
                            </td>
                            <td>
                                {{$downloader->name}}
                            </td>
                            <td>
                                {{$downloader->created_at}}
                            </td>
                            <td>
                                {{$downloader->updated_at}}
                            </td>
                            <td>
                                {!! Form::open(['url' => url('/panel/downloader/' . $downloader->email), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                    {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    </table>

            </div>
            <div class="card">
                {!! Form::open(['url' => url('/panel/downloader/' . $downloader->email), 'class' => 'form-group', 'method' => 'PUT']) !!}
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', $downloader->email, ['class' => 'form-control']) }}
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', $downloader->name, ['class' => 'form-control']) }}
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

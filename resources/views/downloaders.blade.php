@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
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
                        @foreach ($downloaders as $downloader)
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
                                    <a href="{{ url('/panel/downloader/' . $downloader->email) }}" class="btn btn-success">Show/Edit</a>
                                    {!! Form::open(['url' => url('/panel/downloader/' . $downloader->email), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach                        
                    </table>
                    {{ $downloaders->links() }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                {!! Form::open(['url' => url('/panel/downloaders/create'), 'class' => 'form-group', 'enctype' => 'multipart/form-data']) !!}
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', '', ['class' => 'form-control']) }}

                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control']) }}

                    {{ Form::submit('Add a word', ['class' => 'btn btn-primary']) }}
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

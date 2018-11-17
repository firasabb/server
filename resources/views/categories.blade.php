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
                                Category
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{$category->id}}
                                </td>
                                <td>
                                    {{$category->category}}
                                </td>
                                <td>
                                    {{$category->language->language}}
                                </td>
                                <td>
                                    {{$category->created_at}}
                                </td>
                                <td>
                                    {{$category->updated_at}}
                                </td>
                                <td>
                                    <a href="{{ url('/panel/categories/show/' . $category->id) }}" class="btn btn-success">Show/Edit</a>
                                    {!! Form::open(['url' => url('/panel/categories/show/' . $category->id), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $categories->links() }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                {!! Form::open(['url' => url('/panel/categories/create'), 'class' => 'form-group']) !!}
                    {{ Form::label('category', 'Category') }}
                    {{ Form::text('category', '', ['class' => 'form-control']) }}

                    {{ Form::select('language', $languagesArr) }}

                    {{ Form::submit('Add a category', ['class' => 'btn btn-primary']) }}
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

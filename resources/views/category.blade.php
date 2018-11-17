@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div style="overflow-wrap:break-word; word-wrap: break-word; word-break: break-all; word-break: break-word; hyphens: auto;">
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
                                    {!! Form::open(['url' => url('/panel/categories/show/' . $category->id), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div style="overflow-wrap:break-word; word-wrap: break-word; word-break: break-all; word-break: break-word; hyphens: auto;">
        
            <div class="card">
                {!! Form::open(['url' => url('/panel/categories/show/' . $category->id), 'class' => 'form-group', 'method' => 'PUT']) !!}
                    {{ Form::label('category', 'Category') }}
                    {{ Form::text('category', $category->category, ['class' => 'form-control']) }}


                    {{ Form::select('language', $languagesArr, $category->language->language) }}

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

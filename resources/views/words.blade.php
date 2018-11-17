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
                                Title
                            </th>
                            <th scope="col">
                                Tagline
                            </th>
                            <th scope="col">
                                Language
                            </th>
                            <th scope="col">
                                Photo
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
                        @foreach ($words as $word)
                            <tr>
                                <td>
                                    {{$word->id}}
                                </td>
                                <td>
                                    {{$word->title}}
                                </td>
                                <td>
                                    {{$word->tagline}}
                                </td>
                                <td>
                                    {{$word->language->language}}
                                </td>
                                <td>
                                    {{$word->photo}}
                                </td>
                                <td>
                                    {{$word->created_at}}
                                </td>
                                <td>
                                    {{$word->updated_at}}
                                </td>
                                <td>
                                    <a href="{{ url('/panel/words/show/' . $word->id) }}" class="btn btn-success">Show/Edit</a>
                                    {!! Form::open(['url' => url('/panel/words/show/' . $word->id), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $words->links() }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                {!! Form::open(['url' => url('/panel/words/create'), 'class' => 'form-group', 'enctype' => 'multipart/form-data']) !!}
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', '', ['class' => 'form-control']) }}

                    {{ Form::label('tagline', 'Tagline') }}
                    {{ Form::text('tagline', '', ['class' => 'form-control']) }}

                    {{ Form::label('photo-link', 'Photo Link') }}
                    {{ Form::text('photo_link', '', ['class' => 'form-control']) }}

                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description', '', ['class' => 'form-control']) }}

                    {{ Form::label('rating-us', 'Rating us') }}
                    {{ Form::text('rating_us', '', ['class' => 'form-control']) }}

                    {{ Form::label('rating-visitors', 'Rating Visitors') }}
                    {{ Form::text('rating_visitors', '', ['class' => 'form-control']) }}

                    {{ Form::label('Link', 'link') }}
                    {{ Form::text('link', '', ['class' => 'form-control']) }}

                    {{ Form::label('payment', 'Payment') }}
                    {{ Form::text('payment', '', ['class' => 'form-control']) }}

                    {{ Form::label('color', 'Color') }}
                    {{ Form::text('color', '', ['class' => 'form-control']) }}

                    {{ Form::label('eligibility', 'Eligibility') }}
                    {{ Form::text('eligibility', '', ['class' => 'form-control']) }}

                    {{ Form::label('sponsored', 'Sponsored') }}
                    {{ Form::checkbox('sponsored', '1') }}

                    {{ Form::select('language', $languagesArr) }}
                    {{ Form::select('category', $categoriesArr) }}
                    {{ Form::file('photo', ['class' => 'form-control']) }}
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

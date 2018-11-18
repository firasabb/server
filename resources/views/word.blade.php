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
                                Title
                            </th>
                            <th scope="col">
                                Tagline
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
                                {{$word->created_at}}
                            </td>
                            <td>
                                {{$word->updated_at}}
                            </td>
                            <td>
                                    {!! Form::open(['url' => url('/panel/words/show/' . $word->id), 'class' => 'form-group', 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                                    {!! Form::close() !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
            <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <p>Android Link:<strong>{{$word->androidlink}}</strong></p>
                            <p>iOS Link:<strong>{{$word->ioslink}}</strong></p>
                            <p>Description: {{$word->description}}</p>
                            <p>Eligibility: {{$word->eligibility}}</p>
                            <p>Photo: {{$word->photo}}</p>
                            <p>Category: {{$word->category->category}}</p>
                            <p>Our Rating: {{$word->rating_us}}</p>
                            <p>Sponsored: {{$word->sponsored}}</p>
                            <p>Payment: {{$word->payment}}</p>
                            <p>Color: {{$word->color}}</p>
                        </div>
                    </div>
            </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div style="overflow-wrap:break-word; word-wrap: break-word; word-break: break-all; word-break: break-word; hyphens: auto;">
        
            <div class="card">
                {!! Form::open(['url' => url('/panel/words/show/' . $word->id), 'class' => 'form-group', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', $word->title, ['class' => 'form-control']) }}

                    {{ Form::label('tagline', 'Tagline') }}
                    {{ Form::text('tagline', $word->tagline, ['class' => 'form-control']) }}

                    {{ Form::label('photo-link', 'Photo Link') }}
                    {{ Form::text('photo_link', $word->photo, ['class' => 'form-control']) }}

                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', $word->description, ['class' => 'form-control', 'rows' => 4]) }}

                    {{ Form::label('rating_us', 'Rating Us') }}
                    {{ Form::text('rating_us', $word->rating_us, ['class' => 'form-control']) }}

                    {{ Form::label('rating-visitors', 'Rating Visitors') }}
                    {{ Form::text('rating_visitors', $word->rating_visitors, ['class' => 'form-control']) }}

                    {{ Form::label('androidlink', 'Android Link') }}
                    {{ Form::text('androidlink', $word->androidlink, ['class' => 'form-control']) }}

                    {{ Form::label('ioslink', 'IOS Link') }}
                    {{ Form::text('ioslink', $word->ioslink, ['class' => 'form-control']) }}

                    {{ Form::label('payment', 'Payment') }}
                    {{ Form::textarea('payment', $word->payment, ['class' => 'form-control', 'rows' => 4]) }}

                    {{ Form::label('color', 'Color') }}
                    {{ Form::text('color', $word->color, ['class' => 'form-control']) }}

                    {{ Form::label('eligibility', 'Eligibility') }}
                    {{ Form::textarea('eligibility', $word->eligibility, ['class' => 'form-control', 'rows' => 4]) }}


                    {{ Form::label('sponsored', 'Sponsored') }}
                    {{ Form::checkbox('sponsored', '1', $word->sponsored === 1 ? true : false) }}


                    {{ Form::select('language', $languagesArr, $word->language->language) }}
                    {{ Form::select('category', $categoriesArr, $word->category->category) }}

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

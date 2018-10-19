@extends('layouts.app')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-md-10">
            Edit Caffeine Source ID #{{ $item->id }} - {{ $item->name }}
        </div>
    </div>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['action' => ['CaffeineSourcesController@update', $item->id], 'method' => 'put']); !!}
                {!! Form::token(); !!}

                <div class="form-group">
                    {{ Form::label('name', null, ['class' => 'control-label']) }}
                    {{ Form::text('name', $item->name, array_merge(['class' => 'form-control', 'required' => 'required'])) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', null, ['class' => 'control-label']) }}
                    {{ Form::text('description', $item->description, array_merge(['class' => 'form-control', 'required' => 'required'])) }}
                </div>

                <div class="form-group">
                    {{ Form::label('value', null, ['class' => 'control-label']) }}
                    {{ Form::number('value', $item->value, array_merge(['class' => 'form-control', 'required' => 'required', 'minlength' => 0, 'max' => 9999])) }}
                </div>

                <div class="form-group">
                    {{ Form::button('Save', ['class' => 'form-control btn btn-primary', "type" => "submit"])  }}
                </div>
            {!! Form::close(); !!}
        </div>
    </div>

    {{ Form::DeleteResourceButton('CaffeineSourcesController@destroy', $item->id) }}
</div>
@endsection

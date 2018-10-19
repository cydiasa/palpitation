@extends('layouts.app')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-md-10">
            Caffeine Sources - ID #{{ $item->id }}
        </div>
        <div class="col-md-2">
            <a href="/dashboard/caffeine-sources/create" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Create a new resource"  style="float:right;">
                <i class="fas fa-plus-circle"></i>
            </a>
            <a href="/dashboard/caffeine-sources/{{$item->id}}/edit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" style="float:right;"><i class="fas fa-edit"></i></a>
        </div>
    </div>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Caffeine Source ID#:
                </span>
                {{ $item->id }}
            </p>
        </div>
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Name:
                </span>
                {{ $item->name }}
            </p>
        </div>
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Caffeine Amount:
                </span>
                {{ $item->value }} <sub>Mg</sub>
            </p>
        </div>
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Description:
                </span>
            </p>
            <p>
                {{ $item->description }}
            </p>
        </div>

    </div>

</div>

<div class="card-header">
        <div class="row">
            <div class="col-md-12">
                {{ Form::DeleteResourceButton('CaffeineSourcesController@destroy', $item->id) }}
            </div>
        </div>
    </div>
@endsection

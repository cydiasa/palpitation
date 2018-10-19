@extends('layouts.app')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-md-10">
            Caffeine Intake - ID #{{ $item->id }} |  {{ Carbon\Carbon::parse($item->created_at)->format('m/d/Y | h:m:s a')  }}
        </div>
        <div class="col-md-2">
            <a href="/dashboard/caffeine-intake/create" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Create a new resource"  style="float:right;">
                <i class="fas fa-plus-circle"></i>
            </a>
            <a href="/dashboard/caffeine-intake/{{$item->id}}/edit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" style="float:right;"><i class="fas fa-edit"></i></a>
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
                {{ $item->caffeineSources[0]->name }}
            </p>
        </div>
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Caffeine Amount:
                </span>
                {{ $item->caffeineSources[0]->value }} <sub>Mg</sub>
            </p>
        </div>
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Number of Drinks Had:
                </span>
                {{ $item->units }}
            </p>
        </div>
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Totals:
                </span>
                ({!! $item->units !!}) {!! $item->caffeineSources[0]->name !!} w/ {!! $item->caffeineSources[0]->value !!}<sub>Mg</sub> caffeine each for a total of {!! $item->units * $item->caffeineSources[0]->value !!}
            </p>
        </div>
        <div class="col-md-12">
            <p>
                <span class="font-weight-bold">
                    Description:
                </span>
            </p>
            <p>
                    {{ $item->caffeineSources[0]->description }}
            </p>
        </div>

    </div>

</div>

<div class="card-header">
        <div class="row">
            <div class="col-md-12">
                {{ Form::DeleteResourceButton('CaffeineIntakeController@destroy', $item->id) }}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')

<div class="card-header">
    <div class="row">
        <div class="col-md-11">
            View All Your Caffeine Intake
            <p><sub>Hover over a value to see the percentage effect of each drink on your intake</sub></p>
        </div>
        <div class="col-md-1">
            <a href="/dashboard/caffeine-intake/create" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Create a new resource" >
                <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
</div>


<div class="card-body" style="padding: 0px;">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
                <div class="table-responsive">
                <table class="table table-hover" >
                        <thead class="thead-dark"> <tr> <th>ID #</th><th>Units</th> <th>Name</th> <th>Consumption</th> <th>Date</th> <th class="table-action-columns">Actions</th> </tr> </thead>
                        <tbody>
                            @foreach ($caffeineIntake as $item)
                                <tr data-toggle="tooltip" data-placement="top" title='{{ ( ($item->units * $item->caffeineSources[0]->value)/500)*100 }}% of your maximum intake. Based on 500Mg intake'>
                                    <th scope="row">
                                            {{ $item->id }}
                                    </th>
                                    <th>
                                            {{ $item->units }}
                                    </th>
                                    <th>
                                            {{ $item->caffeineSources[0]->name }}
                                    </th>

                                    <th style="color:{!! (($item->units * $item->caffeineSources[0]->value) >= 200)?'red':((($item->units * $item->caffeineSources[0]->value) <= 50)?'green':'red') !!}!important">
                                            {{ $item->units * $item->caffeineSources[0]->value }}
                                        </a>
                                    </th>

                                    <th>
                                    {{ Carbon\Carbon::parse($item->created_at)->format('m/d/Y | h:m:s a')  }}
                                </th>
                                    <th>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination">
                                                <li><a href="/dashboard/caffeine-intake/{{$item->id}}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></a></li>
                                                <li><a href="/dashboard/caffeine-intake/{{$item->id}}/edit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a></li>

                                                <li>
                                                    {{ Form::DeleteResourceButton('CaffeineIntakeController@destroy', $item->id) }}
                                                </li>

                                            </ul>
                                        </nav>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    <hr />
    <div class="d-flex justify-content-end col-md-12">
        {!! $caffeineIntake->render() !!}
    </div>

</div>
@endsection

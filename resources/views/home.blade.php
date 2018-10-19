@extends('layouts.app')

@section('content')
<div class="card-header">Welcome {!! $user->name !!}</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-12">
        <p>
            @if($todayNumberOfDrinks>0)
            You have had {!! $todayNumberOfDrinks !!} drinks with a combined caffeine amount of {!! $todayTotalCaffeine !!} milligrams of caffeine.
            This is  {!! $todayTotalCaffeinePercentage !!}% Of the recommended total.
            @else
            You had not had any drinks today! <a href="/dashboard/caffeine-intake/create">Click here</a> or just go have some you feind of caffeine!
            @endif
        </p>
        @if(count($topFiveDrinks))
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary">
                    Your Top Drinks Today
                </li>
                <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-{!! ($todayTotalCaffeinePercentage>60)?'danger':(($todayTotalCaffeinePercentage>10)?'primary':'success') !!}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {!! $todayTotalCaffeinePercentage !!}%">{!! $todayTotalCaffeinePercentage !!}%</div>
                </div>
                @foreach ($topFiveDrinks as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                            {!! $item->name !!}
                        <span class="badge badge-primary badge-pill">{!! $item->total !!}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection

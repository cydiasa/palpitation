@extends('layouts.app')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-md-10">
            Create New Intake
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
    <div class="row" id="app">
        <div class="col-md-12">
            {!! Form::open(['action' => 'CaffeineIntakeController@store']); !!}
                {!! Form::token(); !!}


                <div class="form-group">
                    {{ Form::label('caffeine_source_id', "Select a beverage", ['class' => 'control-label', 'required' => 'required']) }}
                    <select class="form-control" id="caffeine_source_id" name="caffeine_source_id" required="required">
                        <option selected disabled value="">Choose a Drink</option>
                        @foreach ($caffeineSources as $item)
                            <option value="{{ $item->id }}" caffeine="{{ $item->value }}" caffeineDescription='{!! $item->description !!}' >{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p id="outputDrinkInformation">

                </p>

                <div class="form-group">
                    {{ Form::label('units', "Number of drinks", ['class' => 'control-label']) }}
                    {{ Form::number('units', null, array_merge(['class' => 'form-control', 'required' => 'required', "id" => 'unitsToDrink', "min" => 0, "max"=>9999])) }}
                </div>
                <p id="outputTotalCaffeineOutput">

                </p>
                <div class="form-group">
                    {{ Form::button('Submit', ['class' => 'form-control btn btn-success', "type" => "submit"])  }}
                </div>

                <div class="outputOverdoseWarning alert alert-danger font-weight-bold lead" role="alert">
                    You are about to exceed the maximum daily recommended amount of caffeine in one sitting. Call 911 immediately if you feel heart palpitations. If you're a thug, dance it out!
                </div>



            {!! Form::close(); !!}
        </div>
    </div>
</div>
@endsection

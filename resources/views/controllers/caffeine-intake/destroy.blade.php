@extends('layouts.app')

@section('content')
<div class="card-header">
    <div class="row">
        <div class="col-md-10">
            Caffeine Intake Deleted
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
</div>
@endsection

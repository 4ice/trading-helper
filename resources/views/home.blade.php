@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Current balance: {{ Auth::user()->userBalanceRecords()->latest()->first()->balance }}</p>
                    <p>Goal: {{ Auth::user()->goal }}</p>
                    <p>Expected daily growth: {{ Auth::user()->expected_daily_growth }}%</p>
                    <p>Expected completion date: {{ Auth::user()->expected_completion_date }}</p>
                    <p>Todays goal:  {{ round(Auth::user()->userBalanceRecords()->latest()->first()->balance * (Auth::user()->expected_daily_growth / 100 + 1)) }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Progress update</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'user-balance-records.store']) !!}
                        <div class="form-group row">
                            <label for="balance" class="col-md-4 col-form-label text-md-right">{{ __('Balance') }}</label>

                            <div class="col-md-6">
                                <input id="balance" type="number" class="form-control @error('balance') is-invalid @enderror" name="balance" value="{{ old('balance', round(Auth::user()->userBalanceRecords()->latest()->first()->balance * (Auth::user()->expected_daily_growth / 100 + 1))) }}" required autofocus>

                                @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

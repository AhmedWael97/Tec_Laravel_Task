@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('message'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('View Task') }} ({{ $task->name }})</div>

                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <b> {{ __('Name') }} </b> : {{ $task->name }}
                            </div>
                        </div>


                        <div class="row mb-3">

                            <div class="col-md-12">
                                <b> {{ __('Description') }} </b> : {{ $task->description }}
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <b> {{ __('Start In') }} </b> : {{ $task->start_in }}
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <b> {{ __('Deadline') }} </b> : {{ $task->deadline }}
                            </div>
                        </div>



                    </div>
                    <div class="card-footer">
                        <a href="{{ route('tasks.index') }}">
                            {{ __('Back to tasks') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                    <div class="card-header">{{ __('Create Task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="Name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="Name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="Name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" required
                                        autocomplete="description">
                                {{ old('description') }}
                                </textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Start In') }}</label>

                                <div class="col-md-6">
                                    <input id="start_in" type="date"
                                        class="form-control @error('start_in') is-invalid @enderror" name="start_in"
                                        value="{{ old('start_in') }}" required autocomplete="start_in" autofocus>

                                    @error('start_in')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Deadline') }}</label>

                                <div class="col-md-6">
                                    <input id="deadline" type="date"
                                        class="form-control @error('deadline') is-invalid @enderror" name="deadline"
                                        value="{{ old('deadline') }}" required autocomplete="deadline" autofocus>

                                    @error('deadline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('tasks.index') }}">
                                        {{ __('Back to tasks') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

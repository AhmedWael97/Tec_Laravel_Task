@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-10">
                <h4>
                    {{ __('Tasks') }}
                </h4>
            </div>
            <div class="col-md-2">
                <a href="{{ route('tasks.create') }}" class="btn btn-success w-100">
                    {{ __('Create') }}
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <th>
                    #
                </th>
                <th>
                    {{ __('Name') }}
                </th>
                <th>
                    {{ __('Description') }}
                </th>
                <th>
                    {{ __('Start In') }}
                </th>
                <th>
                    {{ __('Deadline') }}
                </th>
                <th>
                    {{ __('Actions') }}
                </th>
            </thead>
            <tbody>
                @forelse ($tasks as $key=>$task)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $task->name }}
                        </td>
                        <td>
                            {{ $task->description }}
                        </td>
                        <td>
                            {{ $task->start_in }}
                        </td>
                        <td>
                            {{ $task->deadline }}
                        </td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary btn-sm mb-2">

                                {{ __('Show') }}
                            </a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm mb-2">

                                {{ __('Edit') }}
                            </a>

                            <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            {{ __('No Data Found') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

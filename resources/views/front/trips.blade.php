@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Your Trips') }}</h1>
    <a href="{{ route('trips.create') }}" class="btn btn-primary">Add New Trip</a>

    <table class="table">
        <thead>
            <tr>
                <th>{{ __('Trip Name') }}</th>
                <th>{{ __('Destination') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Auth::user()->trips as $trip)
                <tr>
                    <td>{{ $trip->name }}</td>
                    <td>{{ $trip->destination }}</td>
                    <td>{{ $trip->date }}</td>
                    <td>
                        <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

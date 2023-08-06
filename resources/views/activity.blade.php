@extends('layouts.app')

@section('content')

    <h1>{{ $activity->name }}</h1>
    @if (count($activity->appointments) !== 0)
        <ul>
            @foreach ($activity->appointments as $appointment)
                <li>
                    {{ $appointment->format('d.m.Y') . ' ob ' . $appointment->format('H:i') }}
                </li>
            @endforeach
        </ul>
    @else
        Ni terminov
    @endif

    <a href="{{ route('list') }}">Nazaj na seznam</a>

@endsection

@extends('layouts.app')

@section('content')

    <h1>{{ $activity->name }}</h1>
    @if ($activity->appointments->count() !== 0)
        <ul>
            @foreach ($activity->appointments as $appointment)
                <li>
                    {{ $appointment->format('d.m.Y') . ' ob ' . $appointment->formant('H:i') }}
                </li>
            @endforeach
        </ul>
    @else
        Ni terminov
    @endif

    <a href=”/”>Nazaj na seznam</a>

@endsection

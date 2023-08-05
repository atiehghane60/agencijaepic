@extends('layouts.app')

@section('content')

    <a href="{{ route('add_activity') }}">
        Dodaj dejavnost
    </a>
    <br/>
    @if (\Illuminate\Support\Facades\Session::has('message'))
        {{ \Illuminate\Support\Facades\Session::get('message') }}
    @endif
    <br/>
    <br/>
    <h1>Seznam dejavnosti</h1>
    @if ($activities->count() !== 0)
        <ul>
            @foreach ($activities as $activity)
                <li>
                    <a href="{{ route('show', $activity->id) }}">{{ $activity->name }}</a>
                </li>
            @endforeach
        </ul>
    @else
        Ni dejavnosti
    @endif

@endsection

@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('add_activity') }}">
        @csrf
        <div>
            <label for="name">ime:</label>
            <input name="name" id="name"/>
        </div>

        <div>
            <label for="appointments">Termini:</label>
            <textarea name="appointments" id="appointments" rows="4" cols="54"></textarea>
        </div>

        <input type="submit" value="predložiti"/>
    </form>
@endsection

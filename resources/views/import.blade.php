@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('import') }}">
        @csrf
        <div>
            <label for="file">Datoteka csv::</label>
            <input type="file" name="file" id="file"/>
        </div>

        <input type="submit" value="predložiti"/>
    </form>
@endsection

@extends('layout')

@section('content')
    <h1>{{ $title }}</h1>

    <!-- List all authors -->
    @if (count($items) > 0)
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td>
                        <td>
                            <!-- Edit button for each author -->
                            <a href="/authors/update/{{ $author->id }}" class="btn btn-outline-primary btn-sm">Edit</a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No entries found in the database.</p>
    @endif
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Appetizers</h1>
                <a class="text-right" href="/admin/Appetizers/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($appetizers as $appetizer)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $appetizer->Name }}</td>
                        <td>{{ $appetizer->Price }}</td>
                        <td>
                            <a href="/admin/Appetizers/{{ $appetizer->_id }}">Details</a> |
                            <a href="/admin/Appetizers/edit/{{ $appetizer->_id }}">Edit</a> |
                            <a href="/admin/Appetizers/delete/{{ $appetizer->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
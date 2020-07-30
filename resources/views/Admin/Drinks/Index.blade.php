@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Drinks</h1>
                <a class="text-right" href="/admin/Drinks/create">Create New</a>
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
                @foreach($drink as $drink)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $drink->Beverage }}</td>
                        <td>${{ $drink->Price }}</td>
                        <td>
                            <a href="/admin/Drinks/{{ $drink->_id }}">Details</a> |
                            <a href="/admin/Drinks/edit/{{ $drink->_id }}">Edit</a> |
                            <a href="/admin/Drinks/delete/{{ $drink->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Desserts</h1>
                <a class="text-right" href="/admin/Dessert/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Flavors</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($desserts as $dessert)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $dessert->recipe_name }}</td>
                        <td>${{ $dessert->price }}</td>
                        <td>{{ $dessert->flavors }}</td>
                        <td>
                            <a href="/admin/Dessert/{{ $dessert->_id }}">Details</a> |
                            <a href="/admin/Dessert/edit/{{ $dessert->_id }}">Edit</a> |
                            <a href="/admin/Dessert/delete/{{ $dessert->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
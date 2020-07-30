@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Seafood</h1>
                <a class="text-right" href="/admin/Seafood/create">Create New</a>
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
                @foreach($Seafoods as $Seafood)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $Seafood->Name }}</td>
                        <td>${{ $Seafood->Price }}</td>
                        <td>
                            <a href="/admin/Seafood/{{ $Seafood->_id }}">Details</a> |
                            <a href="/admin/Seafood/edit/{{ $Seafood->_id }}">Edit</a> |
                            <a href="/admin/Seafood/delete/{{ $Seafood->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
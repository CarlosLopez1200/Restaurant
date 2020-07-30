@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $appetizer->Name}}</b></h4>
                        <p class="card-text"><b>Price: </b> {{ $appetizer->Price }}</p>
                    </div>
                    <div class="card-body">
                        <a href="/admin/Appetizers/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/Appetizers/edit/{{ $appetizer->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/Appetizers/delete/{{ $appetizer->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

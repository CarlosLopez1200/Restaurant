@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/Appetizers/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="appetizerid" id="appetizerid" value="{{ $appetizer->_id }}">
                <div class="form-group">
                    <div>
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name" value="{{ $appetizer->Name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="Price" id="Price" class="form-control" value="{{ $appetizer->Price }}" disabled>
                    </div>
                
                    <a href="/admin/Appetizers/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/Appetizers/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="Price" id="Price" class="form-control">
                    </div>
                    <a href="/admin/Appetizers/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection
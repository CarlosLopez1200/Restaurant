@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/Drinks/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Beverage">Name</label>
                        <input class="form-control" type="text" name="Beverage" id="Beverage">
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" name="Price" id="Price" class="form-control">
                    </div>
                    <a href="/admin/Drinks/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection
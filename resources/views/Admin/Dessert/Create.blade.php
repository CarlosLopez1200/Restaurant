@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/Dessert/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="recipe_name">Name</label>
                        <input class="form-control" type="text" name="recipe_name" id="recipe_name">
                    </div>
                    <div class="form-group">
                        <label for="flavors">Flavors</label>
                        <input class="form-control" type="text" name="flavors" id="flavors">
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <a href="/admin/Dessert/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection
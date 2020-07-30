@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/Dessert/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="dessertid" id="dessertid" value="{{ $dessert->_id }}">
                <div class="form-group">
                        <label for="Model">Name</label>
                        <input class="form-control" type="text" name="recipe_name" id="recipe_name" value="{{ $dessert->recipe_name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Model">Flavors</label>
                        <input class="form-control" type="text" name="flavors" id="flavors" value="{{ $dessert->flavors }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $dessert->price }}" disabled>
                    </div>
                    <a href="/admin/Dessert/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
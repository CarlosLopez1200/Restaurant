@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/Drinks/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="drinkid" id="drinkid" value="{{ $drink->_id }}">
                <div class="form-group">
                        <label for="Beverage">Name</label>
                        <input class="form-control" type="text" name="Beverage" id="Beverage" value="{{ $drink->Beverage }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" name="Price" id="Price" class="form-control" value="{{ $drink->Price }}" disabled>
                    </div>
                    <a href="/admin/Drinks/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                    <div class="card-body">
                    <h1 class="card-title">{{ $appetizer->Name }}</h1>
                    <h3 class="card-subtitle mb-2 text-muted">${{ $appetizer->Price }}</h3>
                </div>
                <div class="card-footer">
                    <p>Rating:</p>
                    <input type="radio" name="rating" id="rating">&nbsp1 </input>
                    <input type="radio" name="rating" id="rating">&nbsp2 </input>
                    <input type="radio" name="rating" id="rating">&nbsp3 </input>
                    <input type="radio" name="rating" id="rating">&nbsp4 </input>
                    <input type="radio" name="rating" id="rating">&nbsp5 </input>
                </div> 
            </div>

            <div class="col-md-12">
                <h1> <br> Add Comments </br> </h1>
                <form action="/Appetizers/comment" method="POST">
                    @csrf
                    <input type="hidden" name="appetizerid" id="appetizerid" value="{{ $appetizer->_id }}">
                    <div class="form-group">
                        <label for="userid">User ID</label>
                        <input type="text" class="form-control" name="userid" id="userid">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comments</label>
                        <textarea name="comment" id="comment" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Add comment</button>
                </form>
            </div>

            <div class="col-md-12">
                <h3> <br> User comments</br> </h3>
                @if (count($appetizer->Comments) == 0 || $appetizer->Comments == null || empty($appetizer->Comments))
                    <h5 class="text-muted">No comments yet.</h5>
                @else
                    @foreach ($appetizer->Comments as $comment)
                    <div class="card col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comment->user_id }}</h5>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <h6 class="card-subtitle mb-2 text-muted">Date Published: {{ $comment->date }} UTC</h6>
                        </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <a href="/Appetizers/" class="card-link"> <br>&nbsp&nbsp&nbsp&nbsp&nbspGo back </br> </a>

        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Seafood</h1>
                <div class="row">
                        @foreach($Seafoods as $Seafood)
                        <div class="card col-md-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $Seafood->Name }}</h5>
                                <p class="card-text">${{ $Seafood->Price }}</p>
                                <a href="/Seafood/{{ $Seafood->_id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 ">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mx-auto" role="group" aria-label="First group">
                                    @php 
                                        $cpage = request('pg') == 0 ? 1 : request('pg');
                                    @endphp

                                    <a href ="/Seafood?pg={{ $cpage - 1 }}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                    @for ($i = 1; $i <= ceil($SeafoodCount/12); $i++)
                                    <a href="/Seafood?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : ''}}">{{$i}}</a>
                                    @endfor
                                    <a href="/Seafood?pg={{ $cpage + 1}}" class="btn btn-secondary {{$cpage == ceil($SeafoodCount/12) ? 'disabled' : '' }}">&gt</a>
                                </div>
                          </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection

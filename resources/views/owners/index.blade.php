@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Owners</div>

                    <div class="card-body">
                        <a class="btn btn-info" href="{{route("owners.create")}}">Add new owner</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Cars owned</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $own)
                                <tr>
                                    <td>{{$own->id}}</td>
                                    <td>{{$own->name}}</td>
                                    <td>{{$own->surname}}</td>
                                    <td>
                                        @foreach($own->cars as $car)
                                            {{$car->brand}} {{$car->model}}
                                        @endforeach
                                    </td>
                                    <td style="width: 100px;">
                                        <a class="btn btn-outline-dark" href="{{ route("owners.edit",$own->id) }}">Edit</a>
                                    </td>
                                    <td style="width: 100px;">
                                        <form method="post" action="{{route('owners.destroy',$own->id)}}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger">KILL</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">Label</th>
                            <th scope="col">Description</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($tasks->count()>0)
                           @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->label}} </td>
                                    <td>{{$task->description}} </td>
                                </tr>
                           @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

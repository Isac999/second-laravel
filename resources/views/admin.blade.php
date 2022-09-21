@extends('layouts_admin.base')

@section('main')
    <br> <br>
    <div class="container mt-4 mb-4"><br>
        <div class="text-center">
            <h1 class="mt-1"> Welcome to the admin panel! </h1>
            <p>Create, update, delete and read data quickly!</p> 
        </div>
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead class="text-white font-weight-bold" style="background-color: #146176">
                    <tr>
                        @foreach($header as $line)
                            <th> {{ $line }} </th>
                        @endforeach
                        <th colspan='2'>
                            Action 
                            <button type='button' class='btn btn-success ml-2' id='add'>
                                Add
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($query as $row)
                        <tr>
                            @foreach($header as $line)
                                <td> {{ $row->$line }} </td>
                            @endforeach
                            <td id='package'> 
                                <button class='btn btn-info' id='edit' onclick='alterBtn(this)'>Edit</button>
                                <button class='btn btn-danger ml-1' id='delete'>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        {{ $query->links("pagination::bootstrap-4") }}
    </div>
@endsection
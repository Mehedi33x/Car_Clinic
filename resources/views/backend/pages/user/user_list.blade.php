@extends('backend.master')
@section('content')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="mt-3 ml-3 mr-3">
        <h2 style="font-size: 35px; margin-bottom:20px">User List</h2>
        <div>
            <hr>
            <a href="{{ route('user.add') }}" class="btn btn-success" style="margin-bottom: 20px">+ User</a>
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $users->firstitem() + $key }}</th>
                        {{-- var---> input --}}
                        <td>
                            <img style="width:100px;height:100px" src="{{ url('/uploads/mechanics/' . $user->image) }}">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            {{-- <a href=""><i class="fa-solid fa-eye"></i></a>

                        <a href=""><i class="fa-solid fa-pen-to-square"></i></a>

                        <a href="" onclick="return confirm('Are you sure to Delete?')"><i class="fa-solid fa-trash-can"></i></a> --}}

                            <div class="container">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a class="dropdown-item" href="{{ route('user.view', $user->id) }}"><i
                                                class="fas fa-eye"></i>View</a>
                                        <a class="dropdown-item" href="{{ route('user.delete', $user->id) }}"><i
                                                class="fa-solid fa-trash"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table> <br>
        {{ $users->links() }}
    </div>
@endsection

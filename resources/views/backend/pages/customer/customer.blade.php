@extends('backend.master')
@section('content')
<div class="container mt-3">
    <h2 style="font-size: 35px; margin-bottom:20px">Customer List</h2>

    {{-- <div>
        <a class="btn btn-success" style="margin-bottom: 20px"  href="{{route('user.add')}}">Add New Customer</a>
    </div> --}}
    <table class="table table-bordered" style="border: 2px solid black">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>


<tr>
                <th scope="row"></th>
                {{-- var---> input --}}
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                        {{-- <a href=""><i class="fa-solid fa-eye"></i></a>

                        <a href=""><i class="fa-solid fa-pen-to-square"></i></a>

                        <a href="" onclick="return confirm('Are you sure to Delete?')"><i class="fa-solid fa-trash-can"></i></a> --}}

                        <div class="container">
                            <div class="dropdown">
                              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#"><i class="fas fa-user"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i class="fa-solid fa-trash"></i>Delete</a>
                              </div>
                            </div>
                          </div>
                </td>
            </tr>



        </tbody>
    </table> <br>

</div>

@endsection

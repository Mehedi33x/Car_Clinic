@extends('backend.master')
@section('content')

<div class="container mt-3">
    <h2 style="font-size: 35px; margin-bottom:20px">Service Request List</h2>
    <div>
        <a href="">
            <button type="submit" class="btn btn-success" style="margin-bottom: 20px">+ Service Request</button>
        </a>
    </div>
    <table class="table table-bordered" style="border: 2px solid black">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Car Brand</th>
                <th scope="col">Car Type</th>
                <th scope="col">Car Registration Number</th>
                <th scope="col">Serives</th>
                <th scope="col">Special Request</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $bookings as $key=>$item )
            <tr>
                <th scope="row">{{$bookings->firstitem()+$key}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->contact}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->car_brand}}</td>
                <td>{{$item->car_type}}</td>
                <td>{{$item->reg_num}}</td>
                <td>{{$item->service}}</td>
                <td>{{$item->special_request}}</td>
                <td>{{$item->date}}</td>

                <td>
                        <div class="container">
                            <div class="dropdown">
                              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>Edit</a>
                                <a class="dropdown-item" href="#" onclick="return confirm('Are you sure to Delete?')"><i class="fa-solid fa-trash"></i>Delete</a>
                              </div>
                            </div>
                          </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
{{$bookings->links()}}

</div>


@endsection

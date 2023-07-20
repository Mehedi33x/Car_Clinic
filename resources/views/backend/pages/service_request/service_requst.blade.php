@extends('backend.master')
@section('content')

<div class="mt-3 ml-3 mr-3">
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
                <th scope="col">Address</th>
                <th scope="col">Car Type</th>
                <th scope="col">Serives</th>
                <th scope="col">Date</th>
                <th scope="col">Assign To</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $bookings as $key=>$item )
            <tr>
                <th scope="row">{{$bookings->firstitem()+$key}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->car_type}}</td>
                <td>{{$item->service}}</td>
                <td>{{$item->date}}</td>
                <td>
                    <select id="mechanic" name="mechanic" required>
                        <option value="">Select Mechanic</option>
                        @foreach ($mechanic as $item )

                        <option value="active">{{$item->name}}</option>
                        @endforeach

                      </select>
                </td>

                <td>
                        <div class="container">
                            <div class="dropdown">
                              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#"><i class="fas fa-eye"></i>View</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>Edit</a>
                                <a class="dropdown-item" href="#" onclick="return confirm('Are you sure to Delete?')"><i class="fa-solid fa-trash"></i>Delete</a>
                              </div>
                            </div>
                          </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table> <br>
{{$bookings->links()}}

</div>


@endsection

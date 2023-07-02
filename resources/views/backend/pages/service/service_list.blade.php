@extends('backend.master')
@section('content')

<div class="container mt-3">
    <h2 style="font-size: 35px; margin-bottom:20px">Service List</h2>
    <div>
        <a href="{{route('service.add')}}">
            <button type="submit" class="btn btn-success" style="margin-bottom: 20px">Add New Service</button>
        </a>
    </div>
    <table class="table table-bordered" style="border: 2px solid black">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Service Name</th>
                <th scope="col">Description</th>
                <th scope="col">Service Cost</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $key=>$item )
            <tr>
                <th scope="row">{{$services->firstitem()+$key}}</th>
                <td>
                    <img style="width: 80px; height:80px;" src="{{asset('images/service/'.$item->image)}}">
                </td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->cost}} Tk</td>
                <td class="text-capitalize">{{$item->status}}</td>
                <td>
                        <div class="container">
                            <div class="dropdown">
                              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#"><i class="fas fa-user"></i>Edit</a>
                                <a class="dropdown-item" href="{{route('service.delete',$item->id)}}" onclick="return confirm('Are you sure to Delete?')" ><i class="fa-solid fa-trash"></i>Delete</a>
                              </div>
                            </div>
                          </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{$services->links()}}
</div>


@endsection

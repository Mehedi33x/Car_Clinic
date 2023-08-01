@extends('backend.master')
@section('content')
<div>
    @if(session()->has('message'))
    <p class="alert alert-success" style="font-size: 25px;text-align:center">{{session()->get('message')}}</p>
    @endif
</div>
<div class="mt-3 ml-3 mr-3">
    <h2 style="font-size: 35px; margin-bottom:20px">Car Brand List</h2>
    <div>
        <a href="{{route('add.brand')}}" class="btn btn-success" style="margin-bottom: 20px">+ Car Brand</a>
    </div>
    <table class="table table-bordered" style="border: 2px solid black">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand Image</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $brand as $key=>$item )

            <tr>
                <th scope="row">{{$brand->firstitem()+$key}}</th>
                <td>
                    <img style="width:100px;height:100px" src="{{url('/uploads/brand',$item->image)}}" alt="" srcset="">
                </td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td class="text-capitalize">{{$item->status}}</td>

                <td>
                        <div class="container">
                            <div class="dropdown">
                              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('edit.brand',$item->id)}}"><i class="fas fa-edit"></i>Edit</a>
                                <a class="dropdown-item" href="{{route('brand.delete',$item->id)}}" onclick="return confirm('Are you sure to Delete?')"><i class="fa-solid fa-trash"></i>Delete</a>
                              </div>
                            </div>
                          </div>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>

@endsection

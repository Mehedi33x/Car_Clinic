@extends('backend.master')
@section('content')

<div>
    @if(session()->has('message'))
    <p class="alert alert-success" style="font-size: 25px;text-align:center">{{session()->get('message')}}</p>
    @endif
</div>
<div class="mt-3 ml-3 mr-3">
    <h2 style="font-size: 35px; margin-bottom:20px;">Mechanic List</h2>
    <div>
        <a href="{{route('mechanic.add')}}">
            <button type="submit" class="btn btn-success" style="margin-bottom: 20px">+ Mechanic</button>
        </a>
    </div>
    <table class="table table-bordered" style="border: 2px solid black">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $mechanics as $key=>$mechanic)
            <tr>
                <th scope="row">{{$mechanics->firstitem()+$key}}</th>
                {{-- <th scope="row">{{$mechanic->id}}</th> --}}
                <td>
                <img style="width: 80px; height:80px;" src="{{url('/uploads/mechanics/'.$mechanic->image)}}">
                </td>
                <td>{{$mechanic->name}}</td>
                <td>{{$mechanic->email}}</td>
                <td>{{$mechanic->contact}}</td>
                <td>{{$mechanic->address}}</td>
                <td class="text-capitalize">{{$mechanic->status}}</td>
                <td>
                        <div class="container">
                            <div class="dropdown">
                              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('mechanic.edit',$mechanic->id)}}"><i class="fas fa-user"></i>Edit</a>
                                <a class="dropdown-item" href="{{route('mechanic.delete',$mechanic->id)}}" onclick="return confirm('Are you sure to Delete?')"><i class="fa-solid fa-trash"></i>Delete</a>
                              </div>
                            </div>
                          </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> <br>
    {{ $mechanics->links() }}
</div>




@endsection

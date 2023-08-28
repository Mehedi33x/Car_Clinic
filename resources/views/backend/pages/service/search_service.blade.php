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
        <h2 style="font-size: 35px; margin-bottom:20px">Service List</h2>
        <hr>
        <div>
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" action="{{ route('service.search') }}">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>
        <br>
        <div>

            <a href="{{ route('service.add') }}">
                <button type="submit" class="btn btn-success" style="margin-bottom: 20px">+ Service</button>
            </a>
        </div>

        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Image</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Service Cost</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $key => $item)
                    <tr>
                        {{-- <th scope="row">{{ $services->firstitem() + $key }}</th> --}}
                        <td>
                            <img style="width:100px;height:100px" src="{{ url('uploads/service/' . $item->image) }}">
                        </td>
                        <td class="text-capitalize">{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->cost }} Tk</td>
                        <td class="text-capitalize">{{ $item->status }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{-- {{ $services->links() }} --}}
    </div>
@endsection

@extends('backend.master')
@section('content')
    <div class="mt-3 ml-3 mr-3">
        <h2 style="font-size: 35px; margin-bottom:20px">Product List</h2>
        <div>
            <a href="{{ route('product.add') }}" class="btn btn-success" style="margin-bottom: 20px">+ Product</a>
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    {{-- <th scope="col">Product Code</th> --}}
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($products) --}}
                @foreach ($products as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            <img style="height: 100px;width:100px;" src="{{ url('/uploads/product', $item->image) }}" alt="">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->catData->name }}</td>
                        <td>{{ $item->price }} BDT</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->status}}</td>

                        <td>
                            <div class="container">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('product.view', $item->id) }}"><i
                                                class="fas fa-eye"></i>View</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#"
                                            onclick="return confirm('Are you sure to Delete?')"><i
                                                class="fa-solid fa-trash"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <br>
        {{ $products->links() }}
    </div>
@endsection

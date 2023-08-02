@extends('backend.master')
@section('content')

<div class="mt-2 ml-4 mr-4">
    {{-- <div>
        @if(session()->has('message'))
        <p class="alert alert-success" style="font-size: 25px;text-align:center">{{session()->get('message')}}</p>
        @endif
    </div> --}}
    <h1 style="font-size: 50px">Booking Report</h1>
    <br>
    <form action="{{route('report.show')}}" method="get">

        <div class="row">
            <div class="col-md-4">
                <label for="" style="font-size: 30px">From date:</label>
                <input value="{{request()->from_date}}" name="from_date" type="date" class="form-control">

            </div>
            <div class="col-md-4">
                <label for="" style="font-size: 30px">To date:</label>
                <input value="{{request()->to_date}}" name="to_date" type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>

    </form>
    <div id="orderReport">


        <h3 style="font-size: xx-large;">Booking Reports **{{request()->from_date}} - {{request()->to_date}}** </h3>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Car Registration No.</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>

                @if(isset($bookings))
                @foreach($bookings as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->contact}}</td>
                    <td>{{$item->car_brand}}</td>
                    <td>{{$item->reg_num}}</td>
                    <td>
                        @foreach ( $item->service as $data )
                        <p>{{$data}}</p>
                        @endforeach
                    </td>
                    <td>{{$item->address}}</td>
                    <td class="text-capitalize">{{$item->status}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <br>
    <button onclick="printDiv('orderReport')" class="btn btn-success ">Print</button>
</div>

    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    </div>


@endsection

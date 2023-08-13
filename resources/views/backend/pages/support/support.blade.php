@extends('backend.master')
@section('content')
    <div class="mt-3 ml-3 mr-3">
        <h2 style="font-size: 35px; margin-bottom:20px">Support</h2>
        <div>
            {{-- <a href="" class="btn btn-success" style="margin-bottom: 20px">+ Service Request</a> --}}
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">From User</th>
                    <th scope="col">To User</th>
                    <th scope="col">Message</th>
                    <th scope="col">Is seen</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                {{-- @dd($message) --}}
                @foreach ($message as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        @if ($data->from_message == 'admin')
                            <td>{{ $data->from_message }}</td>
                            <td>{{ $data->userFrom->name }}</td>
                        @else
                            <td>{{ $data->userFrom->name }}</td>
                            <td class="text-capitalize">{{ $data->userTo->name }}</td>
                        @endif
                        <td>{{ $data->message }}</td>
                        <td>{{ $data->is_seen }}</td>
                        <td>
                            <a href="{{ route('admin.reply', $data->id) }}" class="btn btn-success">Reply</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

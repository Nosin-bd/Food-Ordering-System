@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Restaurant List') }}</div>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Add Restaurant
                        </button>


                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add a Restaurant</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('restaurant.create') }}" method="post">
                                            @csrf
                                            <div class="mb-3 mt-3">
                                                <label for="name" class="form-label">Name:</label>
                                                <input type="text" class="form-control" id="name" placeholder="Name"
                                                    name="name">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="address" class="form-label">Address:</label>
                                                <input type="text" class="form-control" id="address" placeholder="Address"
                                                    name="address">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="phone" class="form-label">Phone:</label>
                                                <input type="text" class="form-control" id="phone" placeholder="Phone"
                                                    name="phone">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="available_time" class="form-label">Available Time:</label>
                                                <input type="text" class="form-control" id="available_time"
                                                    placeholder="Available Time" name="available_time">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Availability</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($res as $val)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->address }}</td>
                                        <td>{{ $val->phone }}</td>
                                        <td>{{ $val->available_time }}</td>
                                        <td>
                                            <a href="{{ route('restaurant.menu',[ 'id' => $val->id ]) }}" class="btn btn-info" >Manage Menus</a>
                                            <a href="" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editModal{{$val->id}}" >Edit</a>
                                            <a href="{{ route('restaurant.delete',[ 'id' => $val->id ]) }}" class="btn btn-danger" >Delete</a>
                                        </td>
                                    </tr>

                                    <!-- The Modal -->
                        <div class="modal" id="editModal{{$val->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Restaurant</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('restaurant.update', [ 'id' => $val->id ]) }}" method="post">
                                            @csrf
                                            <div class="mb-3 mt-3">
                                                <label for="name" class="form-label">Name:</label>
                                                <input type="text" value="{{ $val->name }}" class="form-control" id="name" placeholder="Name"
                                                    name="name">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="address" class="form-label">Address:</label>
                                                <input type="text" value="{{ $val->address }}" class="form-control" id="address" placeholder="Address"
                                                    name="address">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="phone" class="form-label">Phone:</label>
                                                <input type="text" class="form-control" value="{{ $val->phone }}" id="phone" placeholder="Phone"
                                                    name="phone">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="available_time" class="form-label">Available Time:</label>
                                                <input type="text" class="form-control" id="available_time"
                                                    placeholder="Available Time" value="{{ $val->available_time }}" name="available_time">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

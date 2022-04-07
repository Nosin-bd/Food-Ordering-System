@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Orders') }}</div>

                    <div class="card-body">


                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Restaurant</th>
                                    <th>Menu Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>Order Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($orders as $order)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->menu->findRes($order->menu->res_id) }}</td>
                                        <td>{{ $order->menu->food_name }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->menu->price }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <form action="{{ route('orders.status') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="order_id" value={{ $order->id }}>
                                                <select onchange="this.form.submit()" name="status" id="status">
                                                    <option value="0" {{($order->status === 0) ? 'selected' : ''}}>Pending</option>
                                                    <option value="1" {{($order->status === 1) ? 'selected' : ''}} >Completed</option>
                                                    <option value="2" {{($order->status === 2) ? 'selected' : ''}} >Cancel</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('restaurant.menu',[ 'id' => $val->id ]) }}" class="btn btn-info" >Manage Menus</a>
                                            <a href="" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editModal{{$val->id}}" >Edit</a>
                                            <a href="{{ route('restaurant.delete',[ 'id' => $val->id ]) }}" class="btn btn-danger" >Delete</a> --}}
                                        </td>
                                    </tr>

                                    <!-- The Modal -->
                        {{-- <div class="modal" id="editModal{{$val->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">


                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Restaurant</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>


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
                        </div> --}}

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

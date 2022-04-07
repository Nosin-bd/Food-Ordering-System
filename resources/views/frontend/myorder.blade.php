@extends('layouts.master')
@section('content')
    <section class="parallax-container overlay-1" data-parallax-img="{{asset('assets/images/myorder.jpg')}}">
        <div class="parallax-content breadcrumbs-custom context-dark">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-9">
                <h2 class="breadcrumbs-custom-title">My Order</h2>
                </div>
            </div>
          </div>
        </div>
    </section>
    <section class="section section-lg text-center bg-default">
        <div class="container">
            <div class="card">
                <div class="card-header">{{ __('All Orders') }}</div>

                <div class="card-body">


                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Serial No</th>
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
                                    <td>{{ $order->menu->findRes($order->menu->res_id) }}</td>
                                    <td>{{ $order->menu->food_name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->menu->price }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if ($order->status === 0)
                                        <span class="badge badge-warning">Pending</span>
                                        @endif
                                        @if ($order->status === 1)
                                        <span class="badge badge-success">Completed</span>
                                        @endif
                                        @if ($order->status === 2)
                                        <span class="badge badge-danger">Cancel</span>
                                        @endif

                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('restaurant.menu',[ 'id' => $val->id ]) }}" class="btn btn-info" >Manage Menus</a>
                                        <a href="" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#editModal{{$val->id}}" >Edit</a>
                                        <a href="{{ route('restaurant.delete',[ 'id' => $val->id ]) }}" class="btn btn-danger" >Delete</a> --}}
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

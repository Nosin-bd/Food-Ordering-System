@extends('layouts.master')

@push('css')
    <style>
        .details table{
            margin: 0 auto;
            max-width: 400px;
            margin-top: 24px;
            background-color: #41A451 !important;
        }
    </style>
@endpush

@section('content')
    <section class="parallax-container overlay-1" data-parallax-img="{{ asset('assets/images/'.$res->img) }}">
        <div class="parallax-content breadcrumbs-custom context-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9">
                        <h2 class="breadcrumbs-custom-title">{{ $res->name }}</h2>
                        <div class="details">
                            <table class="table table-dark table-striped">
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $res->address }}</td>
                                </th>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $res->phone }}</td>
                                </th>
                                <tr>
                                    <td>Available Time</td>
                                    <td>{{ $res->available_time }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="food-order" style="width: 80%;margin: 0 auto;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Food Name</th>
                    <th>Food Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($menus as $val)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td> {{ $i }} </td>
                        <td>{{ $val->food_name }}</td>
                        <td>
                            <img src="{{ asset('uploads/foods/' . $val->img) }}" style="width: 200px; height: 140px;" alt=""
                                srcset="">
                        </td>
                        <td>{{ $val->price }}</td>
                        <td>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#orderModal{{$val->id}}"> Order Now </a>
                        </td>
                    </tr>


                    <!-- The Modal -->
                    <div class="modal" style="z-index: 99999999;" id="orderModal{{$val->id}}">
                        <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Order</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{ route('order.create',['res_id'=> $res->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="menu_id" value="{{ $val->id }}">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" placeholder="Your Name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Your Email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="Your Phone" id="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->address }}" name="address" placeholder="Your Address" id="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity:</label>
                                        <input type="number" onchange="updatePrice({{ $val->id }})" oninput="updatePrice({{ $val->id }})" class="form-control quantity-food" min="1" name="quantity" placeholder="Quantity( default 1 )" id="quantity{{$val->id}}">
                                    </div>

                                    <input type="hidden" name="menuPrice" id="menuPrice{{$val->id}}" value="{{ $val->price }}">

                                    <h6 style="margin-top: 20px;margin-bottom: 20px;" id="priceValue{{$val->id}}">Total Price: <span id="totalPrice{{$val->id}}"> {{ $val->price }} </span> Tk.</h6>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('js')

<script>
    function updatePrice(orderID){
        var total_price  = parseInt(document.getElementById('menuPrice'+orderID).value) * parseInt(document.getElementById('quantity'+orderID).value);
        if(isNaN(total_price)){
            total_price = parseInt(document.getElementById('menuPrice'+orderID).value);
        }
        document.getElementById('totalPrice'+orderID).innerHTML = total_price ;
    }
</script>

@endpush

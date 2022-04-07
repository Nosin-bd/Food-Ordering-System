@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Menu List') }}</div>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Add Menu
                        </button>


                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add a Menu</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('menu.store',['id'=> $id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 mt-3">
                                                <label for="food_name" class="form-label">Food Name:</label>
                                                <input type="text" class="form-control" id="food_name" placeholder="Food Name"
                                                    name="food_name">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="price" class="form-label">Price:</label>
                                                <input type="text" class="form-control" id="price" placeholder="Price"
                                                    name="price">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="img" class="form-label">Food Image:</label>
                                                <input type="file" class="form-control" id="img" name="img">
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
                                    <th>Food Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
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
                                        <td>{{ $val->price }}</td>
                                        <td>
                                            <img src="{{asset('uploads/foods/'.$val->img)}}" style="width: 200px; height: 140px;" alt="" srcset="">
                                        </td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$val->id}}" class="btn btn-success" >Edit</a>
                                            <a href="{{ route('menu.delete',[ 'id' => $val->id ]) }}" class="btn btn-danger" >Delete</a>
                                        </td>
                                    </tr>

                                    <!-- The Modal -->
                        <div class="modal" id="editModal{{$val->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add a Menu</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('menu.update',['id'=>$val->id, 'res_id'=> $id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 mt-3">
                                                <label for="food_name" class="form-label">Food Name:</label>
                                                <input type="text" class="form-control" value="{{ $val->food_name }}" id="food_name" placeholder="Food Name"
                                                    name="food_name">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="price" class="form-label">Price:</label>
                                                <input type="text" class="form-control" value="{{ $val->price }}" id="price" placeholder="Price"
                                                    name="price">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="img" class="form-label">Food Image:</label>
                                                <input type="file" class="form-control" id="img"
                                                    name="img">
                                                <img src="{{asset('uploads/foods/'.$val->img)}}" style="width: 100px; height: 100px;margin-top:20px;" alt="" srcset="">
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
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

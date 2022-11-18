@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="head_content10">
                <h1>
                    Orders
                </h1>
            </div>
            <div class="body_content">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        @foreach ($orders as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->status }} </td>
                                <td> {{ $item->total }}$</td>
                                <td> {{ $item->name_client }} {{ $item->surname_client }} </td>
                                <td> {{ $item->address_client }} </td>
                                <td> {{ $item->phone_client }} </td>
                                <td> {{ $item->email_client }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> 
                                    <a class="btn btn-outline-secondary" href="{{route('admin.orders.show', $item)}}">
                                        Show
                                    </a>
                                </td>
                                <td>  </td>
                                <td>  </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </section>
@endsection

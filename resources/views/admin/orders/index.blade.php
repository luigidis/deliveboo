@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between">
                <div>
                    <h1>
                        Orders
                    </h1>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary" title="Add order">
                        Add order
                    </a>
                </div>
            </div>
            <div class="body_content py-2">
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
                                <th colspan="3" class="text-center">Action</th>
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
                                <td class="align-middle">
                                    <a class="btn btn-outline-secondary" href="{{ route('admin.orders.show', $item) }}">
                                        Show
                                    </a>
                                </td>
                                <td class="align-middle"> 
                                    <a class="btn btn-outline-primary" href="#">
                                        Edit
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a class="btn btn-outline-danger" href="#">
                                        End
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </section>
@endsection

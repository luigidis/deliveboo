@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="head_content10">
                <h1>
                    Categories
                </h1>
            </div>
            <div class="body_content">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name Category</th>
                                <th>Slug</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        @foreach ($categories as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->slug }}</td>
                                <td> {{ $item->created_at }} </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </section>
@endsection

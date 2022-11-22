@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="head_content10">
                <h1>
                    Categories
                </h1>
                <a href="{{ route('admin.categories.create') }}"><button type="button" class="btn btn-secondary btn-lg">Aggiungi Categoria</button></a>
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
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        @foreach ($categories as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->slug }}</td>
                                <td> {{ $item->created_at }} </td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $item) }}" type="button" class="btn btn-secondary btn-sm">Modifica</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $item) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </section>
@endsection

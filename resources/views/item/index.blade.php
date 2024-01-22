@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3">
                @if (@session('create'))
                    {{-- <div class="m-3 p-3 rounded bg-success">{{ @session('create') }}</div> --}}
                    <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
                        {{ @session('create') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                @endif
                @if (@session('update'))
                    {{-- <div class="m-3 p-3 rounded bg-warning">{{ @session('update') }}</div> --}}
                    <div class="alert alert-warning alert-dismissible fade show mx-3 mt-3" role="alert">
                        {{ @session('update') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                @endif
                @if (@session('delete'))
                    {{-- <div class="m-3 p-3 rounded bg-danger">{{ @session('delete') }}</div> --}}
                    <div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
                        {{ @session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                @endif
                <div class="card-body">
                    <a href="{{ route('items.create') }}" class="btn btn-success">Add +</a>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Expire Date</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->expire_date }}</td>
                                <td><img src="{{ asset('storage/gallery/'.$item->image) }}" alt="" style="width: 40px"></td>
                                <td >
                                    <div class="d-inline-block">
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                    </div>
                                    <div class="d-inline-block">
                                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-info"><i class="fas fa-info m-1"></i></a>
                                    </div>
                                    <div class="d-inline-block">
                                        <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete!');"
                                            ><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                        <div class="d-flex justify-content-end">
                            {{ $items->links()  }}
                        </div>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  
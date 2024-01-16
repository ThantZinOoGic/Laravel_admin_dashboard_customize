@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Item Name</th> 
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Category</th>
                                <td>{{ $item->category->name }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Price</th>
                                <td>{{ $item->price }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Expire Date</th>
                                <td>{{ $item->expire_date }}</td>
                            </tr>
                        </thead>
                      </table>
                      <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  
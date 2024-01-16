@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Create Item</div>
                <div class="card-body">
                    <form class="p-5" method="post" action="{{ route('items.update', $item->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name <small class="text-danger">*</small></label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" value="{{ old('name',  $item->name) }}">
                          @error('name')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1" name="price" value="{{ old('price', $item->price) }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category <small class="text-danger">*</small></label>
                            <select name="category_id" class="custom-select mb-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $item->category->id ? "selected" : '' }}>{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expire Date <small class="text-danger">*</small></label>
                            <input type="date" class="form-control @error('expireDate') is-invalid @enderror" id="exampleInputEmail1" name="expire_date" value="{{ old("expire_date", $item->expire_date)}}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-between">
                <div class="col-8">
                    <div class="row mb-3">
                        @foreach ($items as $item)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('storage/gallery/'.$item->image) }}" alt="" style="height: 300px;">
                                <div class="card-body">
                                  <h4 class="card-title font-weight-bold mb-4">{{ $item->name }}</h4>
                                    <div class="col-12">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-4">
                                                <h5>{{ $item->price }}</h5>
                                            </div>
                                            <div class="col-4 text-left d-flex justify-content-end">
                                                <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-4">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">quantity</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Lenovo IdeaPad Gaming 3</td>
                            <td class="text-center">1</td>
                            <td class="text-right">$1000</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Lenovo IdeaPad Gaming 3</td>
                            <td class="text-center">1</td>
                            <td class="text-right">$1000</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Lenovo IdeaPad Gaming 3</td>
                            <td class="text-center">1</td>
                            <td class="text-right">$1000</td>
                          </tr>

                          <tr>
                            <td colspan="3" class="p-3">Total</td>
                            <td>$3000</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

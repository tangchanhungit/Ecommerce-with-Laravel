@include('backend.partials._header')

@include('backend.partials._sidebar')
@include('backend.partials._navbar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Order Details</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.orders.list')}}">Orders</a></li>
                    <li class="breadcrumb-item active">OrderDetail</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="card-title">
                  Items Ordered
                </h3>
              </div>
              <div class="col-sm-6">
                <ol class="float-sm-right">
                  <a class="btn btn-block btn-primary" href="{{route('admin.orders.list')}}">Cancel</a>
                </ol>
              </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bdataed table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @if($orderDetails->count() >0)
                    @foreach ($orderDetails as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->product_name}}</td>
                        <td>{{$data->unit_price}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->total_price}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center">No datas available.</td>
                </tr>
                @endif
          </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>




@include('backend.partials._footer')

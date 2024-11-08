@include('backend.partials._header')

@include('backend.partials._sidebar')
@include('backend.partials._navbar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Order List</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">OrderList</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <form method="GET" action="{{ route('admin.orders.list') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search orders..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <form method="GET" action="{{ route('admin.orders.list') }}">
                        <div class="input-group">
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="">All Statuses</option>
                                @foreach($statuses as $key => $status)
                                    <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <form method="GET" action="{{ route('admin.orders.list') }}">
                        <div class="input-group">
                            <select name="payment_method" class="form-control" onchange="this.form.submit()">
                                <option value="">All Payment Methods</option>
                                @foreach($paymentMethods as $key => $method)
                                    <option value="{{ $key }}" {{ request('payment_method') == $key ? 'selected' : '' }}>
                                        {{ $method }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3 d-flex align-items-end justify-content-end">
                    <a class="btn btn-primary" href="{{route('admin.orders.create')}}">Create new order for customer</a>
                </div>
            </div>            
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="mb-3">
            @if($orders->count())
                <p>Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} records</p>
            @else
                <p>No records found</p>
            @endif
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Shipping Address</th>
                <th>Payment Method</th>
                <th>Created Time</th>
                <th>Updated Time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @if($orders->count() >0)
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_number}}</td>
                        <td>
                            @if($statuses[$order->status] == 'Pending')
                                <span class="badge bg-warning">{{$statuses[$order->status]}}</span>
                            @elseif($statuses[$order->status] == 'Cancelled')
                                <span class="badge bg-danger">{{$statuses[$order->status]}}</span>
                            @elseif($statuses[$order->status] == 'Completed')
                                <span class="badge bg-success">{{$statuses[$order->status]}}</span>
                            @else
                                <span class="badge bg-primary">{{$statuses[$order->status]}}</span>
                            @endif
                        </td>
                        <td>{{$order->total_amount}}</td>
                        <td>{{$order->shipping_address}}</td>
                        <td>{{ ucwords(str_replace('_', ' ', $order->payment_method)) }}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->updated_at}}</td>
                        <td>
                          <div class="d-flex gap-5">
                            <a href="{{ route('admin.orders.info', $order->id) }}">View</a>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center">No orders available.</td>
                </tr>
                @endif
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @if ($orders->lastPage() > 1)
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($orders->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $orders->appends(request()->except('page'))->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif
        
                    <!-- Pagination Links -->
                    @for ($i = 1; $i <= $orders->lastPage(); $i++)
                        <li class="page-item {{ $i == $orders->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $orders->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    <!-- Next Page Link -->
                    @if ($orders->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $orders->appends(request()->except('page'))->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            @endif
        </div>
        
    </div>
</div>

@include('backend.partials._footer')

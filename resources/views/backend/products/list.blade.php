@include('backend.partials._header')

@include('backend.partials._sidebar')
@include('backend.partials._navbar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Product List</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">ProductList</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
      <div class="card-header">  
        <div class="d-flex justify-content-end">
          <a class="btn btn-primary" href="{{route('admin.products.add')}}">Add product</a>
        </div>
      </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="mb-3">
            @if($products->count())
                <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} records</p>
            @else
                <p>No records found</p>
            @endif
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Created Time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->image}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>
                      <div class="d-flex gap-5">
                        <a href="{{ route('admin.products.info', $product->id) }}" class="btn btn-info">Info</a>
                        <a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-danger"
                          onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                      </div>
                    </td>
                </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          @if ($products->lastPage() > 1)
              <ul class="pagination">
                  @if ($products->onFirstPage())
                      <li class="page-item disabled"><span class="page-link">Previous</span></li>
                  @else
                      <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}{{ http_build_query(request()->except('page')) }}">Previous</a></li>
                  @endif

                  @for ($i = 1; $i <= $products->lastPage(); $i++)
                      <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                          <a class="page-link" href="{{ $products->url($i) }}{{ http_build_query(request()->except('page')) }}">{{ $i }}</a>
                      </li>
                  @endfor

                  @if ($products->hasMorePages())
                      <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}{{ http_build_query(request()->except('page')) }}">Next</a></li>
                  @else
                      <li class="page-item disabled"><span class="page-link">Next</span></li>
                  @endif
              </ul>
          @endif
      </div>
      </div>
</div>


@include('backend.partials._footer')
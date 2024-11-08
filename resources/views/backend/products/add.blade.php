@include('backend.partials._header')

@include('backend.partials._sidebar')
@include('backend.partials._navbar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Create New Product</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.products.list')}}">Products</a></li>
                    <li class="breadcrumb-item active">NewProduct</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Information Of New Product
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{route('admin.products.create')}}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="title" placeholder="Name of product">
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price of product">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
</div>


@include('backend.partials._footer')
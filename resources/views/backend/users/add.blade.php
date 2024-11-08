@include('backend.partials._header')

@include('backend.partials._sidebar')
@include('backend.partials._navbar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Add New User</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.users.list')}}">CustomerList</a></li>
                    <li class="breadcrumb-item active">AddUser</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Infomation User
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{route('admin.users.create')}}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">First name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="first_name" placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Last name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="last_name" placeholder="Last Name">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
</di


@include('backend.partials._footer')
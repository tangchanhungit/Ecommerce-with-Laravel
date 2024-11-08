@include('backend.partials._header')

@include('backend.partials._sidebar')
@include('backend.partials._navbar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>User Info</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.users.list')}}">UserList</a></li>
                    <li class="breadcrumb-item active">Info</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <!-- /.card-header -->
        <form method="POST" action="{{route('admin.users.update', $user->id)}}">
          @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$user->email}}" readonly>
              </div>
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$user->first_name}}" >
              </div>
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$user->last_name}}">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">Back</a>
            </div>
          </form>
        </div>
      </div>
</di


@include('backend.partials._footer')
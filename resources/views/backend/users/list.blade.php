@include('backend.partials._header')

@include('backend.partials._sidebar')
@include('backend.partials._navbar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Customer List</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">UserList</li>
                  </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-3">
                    <form method="GET" action="{{ route('admin.users.list') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search users..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <form method="GET" action="{{ route('admin.users.list') }}">
                        <div class="input-group">
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="">All Status</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Not Active</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <form method="GET" action="{{ route('admin.users.list') }}">
                        <div class="input-group">
                            <select name="role" class="form-control" onchange="this.form.submit()">
                                <option value="">All Roles</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ request('role') == $role->id ? 'selected' : '' }}>
                                        {{ ucwords($role->role_name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3 d-flex align-items-end justify-content-end">
                    <a href="{{route('admin.users.add')}}" class="btn btn-primary">Add User</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="mb-3">
                @if($users->count())
                    <p>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} records</p>
                @else
                    <p>No records found</p>
                @endif
            </div>
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Created Time</th>
                <th>Updated Time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->status == 0)
                            Not Active
                        @else
                            Active
                        @endif
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                            {{ ucwords($role->role_name )}}
                            @if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        <a href="{{ route('admin.users.info', $user->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @if ($users->lastPage() > 1)
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($users->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->appends(request()->except('page'))->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif
        
                    <!-- Pagination Links -->
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $users->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    <!-- Next Page Link -->
                    @if ($users->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->appends(request()->except('page'))->nextPageUrl() }}">Next</a>
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
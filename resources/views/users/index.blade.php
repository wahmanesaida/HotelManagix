<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Users
            <a href="{{url('admin/users/create')}}" class="float-end btn btn-info btn-sm">Add Admin</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('error'))
        <p class="text-danger">{{session('error')}}</p>
        @endif
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if($users)
                        @for ($i = 0; $i < min(2, count($users)); $i++)
                        <tr>
                            <td>{{$users[$i]->id}}</td>
                            <td>{{$users[$i]->name}}</td>
                            <td>{{$users[$i]->email}}</td>

                            <td style=" width: 70px; text-align: center;">
                                @if($users[$i]->image)
                                    <img src="{{ asset('storage/' . $users[$i]->image) }}" alt="User Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                                @else
                                    <img src="{{ asset('storage/user/inconnu.jpg') }}" alt="Default Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                                @endif
                            </td>

                            @if($users[$i]->role_as === 1)
                                <td>Admin</td>
                            @else
                                <td>User</td>
                            @endif
                            <td>
                                <a href="{{url('admin/users/'.$users[$i]->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{url('admin/users/'.$users[$i]->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('admin/users/'.$users[$i]->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endfor
                    @endif

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="float-end btn btn-info btn-sm" id="showAllRows">Voir tous</button>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
$(document).ready(function() {
    var tableBody = $('#dataTable tbody');
    var users = @json($users); // Convert PHP array to JavaScript array
    var currentIndex = 2; // Start from the third user

    function showAllRows() {
        for (var i = currentIndex; i < users.length; i++) {
            var user = users[i];
            var userPhoto = user.image ? user.image : '/user/inconnu.jpg';
            console.log(user.photo);
            var newRow = `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td style="width: 70px; text-align: center;">
                        <img src="{{ asset('storage/') }}/${userPhoto}" alt="User Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                </td>
                    ${user.role_as === 1 ? '<td>Admin</td>' : '<td>User</td>'}
                    <td>
                        <a href="{{url('admin/users/')}}/${user.id}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="{{url('admin/users/')}}/${user.id}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('admin/users/')}}/${user.id}/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            `;
            tableBody.append(newRow);
        }
    }

    $('#showAllRows').click(function() {
        showAllRows();
        $(this).hide(); // Hide the button after clicking
    });
});
</script>


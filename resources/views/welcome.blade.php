<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand border border-primary rounded px-3" href="#">Users Table</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <button type="button"class="btn btn-primary"  data-toggle="modal" data-target="#addUserModal"> Add New User </button>
                    </li>
                </ul>
            </div>
          </div>
      </nav>
      <!-- Table Container -->
      <section class="container mt-5">
        <table class="table table-striped table-dark text-center rounded overflow-hidden">
            <thead class="bg-primary">
              <tr>
                <th scope="col">id</th>
                <th scope="col">User Name</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
            @if(isset($users))
            @foreach($users as $user)
              <tr>
                <th scope="row">{{$user['id']}}</th>
                <td>{{$user['name']}}</td>
               
                <td>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateUserModal" onclick="$('#updateUserModal #userName').val(`{{$user['name']}}`); $('#updateUserModal #userId').val(`{{$user['id']}}`);"> update </button>
                    <a href="{{ url('users/delete/'.$user->id) }}" data-method="delete" class="btn btn-danger btn-sm">delete</a>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
      </section>
        <!-- Add New User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('create')}}">
                    @csrf
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="user-name" class="col-form-label">User Name :</label>
                            <input type="text" class="form-control" id="userName" name='userName'>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- update User Modal -->
        <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                   
                </div>
                @if(isset($user))
                <form method="post" action="{{ route('update', $user['id']) }}">
                    @csrf
    
                    @method('PUT')
                @else
                <form method="post" action="">
                    @csrf
    
                    @method('PUT')
                    @endif
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="user-name" class="col-form-label">User Name :</label>
                            <input type="hidden" class="form-control" id="userId" name="userId">
                            <input type="text" class="form-control" id="userName" name="userName">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
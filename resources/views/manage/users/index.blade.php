@extends('manage.main')

@section('content')
<section id="main-content">
  	<section class="wrapper">

  		@include('elements.error')

      	<div class="row">
          	<div class="col-lg-12">
              	<section class="panel">
                  	<header class="panel-heading"> 
                  		Users <a class="btn btn-success btn-xs" data-toggle="modal" href="#addModal"><i class="fa fa-plus "></i></a>
                  	</header>
                  	<table class="table table-striped table-advance table-hover">
                      	<thead>
							<tr>
								<th><i class="fa fa-bullhorn"></i> ID</th>
								<th>Name</th>
								<th><i class="fa fa-envelope-o"></i> Email</th>
								<th></th>
							</tr>
                     	</thead>
                      	<tbody>
                      		@foreach($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>
										<a class="btn btn-primary btn-xs" data-toggle="modal" href="#editModal-{{$user->id}}">
											<i class="fa fa-pencil"></i>
										</a>
										<a class="btn btn-danger btn-xs" href="{{ route('deleteUser', ['id' => $user->id]) }}" onclick="return confirm('Remove?');">
											<i class="fa fa-trash-o "></i>
										</a>
									</td>
								</tr>
								<!-- Edit Modal -->
							    <div class="modal fade" id="editModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalEdit" aria-hidden="true">
							        <div class="modal-dialog">
							        	<form role="form" method="POST" action="{{ route('postEditUser') }}">
							        		{{ csrf_field() }}
							        		<input type="hidden" name="user_id" value="{{ $user->id }}">
								            <div class="modal-content">
								            	<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title">Edit User</h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label>Name</label>
														<input type="text" name="name" class="form-control" value="{{$user->name}}" required>
													</div>
													<div class="form-group">
														<label>Email</label>
														<input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
													</div>
													<div class="form-group">
														<label>Password</label>
														<input type="password" name="password" class="form-control">
													</div>
													<div class="form-group">
														<label>Confirm Password</label>
														<input type="password" name="password_confirmation" class="form-control">
													</div>
								                </div>
												<div class="modal-footer">
													<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
													<button class="btn btn-success" type="submit">Edit</button>
								                </div>
								            </div>
										</form>
							        </div>
							    </div>
							    <!-- modal -->
							@endforeach
                      	</tbody>
                  	</table>
              	</section>
          	</div>
      	</div>
  	</section>
                  	
  	<!-- Add Modal -->
    <div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        	<form role="form" method="POST" action="{{ route('postAddUser') }}">
        		{{ csrf_field() }}
	            <div class="modal-content">
	            	<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add User</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Kobe Bryant" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="abc@mylar.com" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="password_confirmation" class="form-control" required>
						</div>
	                </div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
						<button class="btn btn-success" type="submit">Add</button>
	                </div>
	            </div>
			</form>
        </div>
    </div>
    <!-- modal -->

</section>
@endsection
@extends('manage.main')

@section('content')
<section id="main-content">
  	<section class="wrapper">

  		@include('elements.error')

      	<div class="row">
          	<div class="col-lg-12">
              	<section class="panel">
                  	<header class="panel-heading"> 
                  		Locations <a class="btn btn-success btn-xs" data-toggle="modal" href="#addModal"><i class="fa fa-plus "></i></a>
                  	</header>
                  	<table class="table table-striped table-advance table-hover">
                      	<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>Type</th>
								<th></th>
							</tr>
                     	</thead>
                      	<tbody>
                      		@foreach($locations as $location)
								<tr>
									<td>{{ $location->id }}</td>
									<td>{{ $location->loc_name }}</td>
									<td>{{ $location->loc_address }}</td>
									<td>{{ $location->loc_type }}</td>
									<td>
										<a class="btn btn-primary btn-xs" data-toggle="modal" href="#editModal-{{$location->id}}">
											<i class="fa fa-pencil"></i>
										</a>
										<a class="btn btn-danger btn-xs" href="{{ route('deleteLocation', ['id' => $location->id]) }}" onclick="return confirm('Remove?');">
											<i class="fa fa-trash-o "></i>
										</a>
									</td>
								</tr>
								<!-- Edit Modal -->
							    <div class="modal fade" id="editModal-{{$location->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalEdit" aria-hidden="true">
							        <div class="modal-dialog">
							        	<form role="form" method="POST" action="{{ route('postEditLocation') }}">
							        		{{ csrf_field() }}
							        		<input type="hidden" name="location_id" value="{{ $location->id }}">
								            <div class="modal-content">
								            	<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title">Edit Location</h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label>Name</label>
														<input type="text" name="name" class="form-control" value="{{ $location->loc_name }}" required>
													</div>
													<div class="form-group">
														<label>Address</label>
														<input type="text" name="address" class="form-control" value="{{ $location->loc_address }}" required>
													</div>
													<div class="form-group">
														<label>Type</label>
														<input type="text" name="type" class="form-control" value="{{ $location->loc_type }}" required>
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
        	<form role="form" method="POST" action="{{ route('postAddLocation') }}">
        		{{ csrf_field() }}
	            <div class="modal-content">
	            	<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add Location</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Love.Fish" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" class="form-control" placeholder="580 Darling Street, Rozelle, NSW" required>
						</div>
						<div class="form-group">
							<label>Type</label>
							<input type="text" name="type" class="form-control" placeholder="home" required>
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
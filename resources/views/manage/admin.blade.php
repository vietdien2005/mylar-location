@extends('manage.main')

@section('content')
<section id="main-content">
  	<section class="wrapper">

  		@include('elements.error')

      	<div class="row">
          	<div class="col-lg-12">
              	<section class="panel">
                  	<header class="panel-heading"> 
                  		<a target="_blank" class="btn btn-primary btn-lg" href="{{ url('/') }}">
                  			<i class="fa fa-home "></i> Go To Homepage
                  		</a>
                        <a target="_blank" class="btn btn-success btn-lg" href="{{ route('getMarkers') }}">
                            <i class="fa fa-link" aria-hidden="true"></i> API Makers
                        </a>
                  	</header>
              	</section>
          	</div>
      	</div>
  	</section>


</section>
@endsection
@if (count($errors) > 0)
    <div class="alert alert-danger text-center">
    	<p>{!! $errors->first() !!}</p>
    </div>
@endif
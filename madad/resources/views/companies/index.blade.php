@extends('layouts.app')

@section('title', 'Companies')
@section('content')

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header title">
			</div>
			<div class="modal-body">
				{{trans('front.actions.delete_warning_company')}}
			</div>
			<div class="modal-footer">
				<form id="delete-form" method="POST">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('front.actions.cancel')}}</button>
				{{ method_field('DELETE')}} {{csrf_field()}}
				<button type="submit" id="delete-btn" class="btn btn-danger">{{trans('front.actions.cancel_ok')}}</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
            	<h2>
					Companies
            	</h2>
			</div>

			<div class="body">
				@if (session('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
						<button type="button" class="close" 
						data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif

				<div class="text-left">
					<a href="{{ route('companies.create') }}"
					 type="submit" class="btn btn-primary btn-flat margin-bottom-1">
						Add a new company
					</a>
				<hr>
				<table class="table table table-striped table-bordered" 
				style="width:100%" id="companies-dt">
					<thead>
						<tr>
							<th>Company Name</th>
							<th>Email</th>
							<th>Website</th>
							<th>Logo</th>
						</tr>
					</thead>
					
            	</table>
			</div>
		</div>
	</div>
</div>
</div>


@stop
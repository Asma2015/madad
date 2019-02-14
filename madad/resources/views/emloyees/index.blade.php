@extends('layouts.app')

@section('title', 'Employees')
@section('content')

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header title">
			</div>
			<div class="modal-body">
			{{trans('front.actions.delete_warning')}}
			</div>
			<div class="modal-footer">
				<form id="delete-form" method="POST">
				<button type="button" class="btn btn-default" data-dismiss="modal">
				{{trans('front.actions.cancel')}}</button>
				{{ method_field('DELETE')}} {{csrf_field()}}
				<button type="submit" id="delete-btn" class="btn btn-danger">
				{{trans('front.actions.cancel_ok')}}</button>
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
				{{trans('Employees')}}
				</h2>
			</div>

			<div class="body">
				@if (session('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				<div class="text-left">
					<a href="{{ route('employees.create') }}" type="submit" class="btn ">
					{{trans('new')}}
					</a>
				</div>

				<hr>
				<table class="table table table-striped table-bordered" style="width:100%" id="employees-dt">
					<thead>
						<tr>
							<th>{{trans('name')}}</th>
							<th>{{trans('company')}}</th>
							<th>{{trans('email')}}</th>
							<th>{{trans('phone')}}</th>
							<th>{{trans('actions')}}</th>
						</tr>
					</thead>
					<!--
					 <tbody>
                    @forelse($employes $employee)
                    <tr>
         
                         <td>{{$employee->first_name}}</td>
                         <td>{{$employee->last_name}}</td>
                         <td>{{$employee->email}}</td>
                        <td> {{$employee->phone_number}}</td>
                        <td>
                                <a href="{{route('employes.edit', ['employee' => $employee->id])}}" class="fa fa-pencil">
                                    </a>
                                    <form action="{{ route('employes.destroy', ['employee' => $employee->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" 
                                        value="DELETE" />
                                        <button type="submit" 
                                        class="fa fa-trash-o" 
                                        onclick="return confirm('delete this employee?!');"></button>
                                    </form>
                        </td>
                        
             </tr>
         
         @empty
         
             <h1>No Employee to be presented</h1>
         
         @endforelse
					</tbody>
					-->
				</table>
			</div>
		</div>
	</div>
</div>
@endsection


@stop
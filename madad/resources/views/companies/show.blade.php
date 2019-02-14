@extends('layouts.app')
@section('title', 'Show company')

@section('content')
<div class="row clreafix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2> {{ $company->name }} </h2>
			</div>

			<div class="body">
				<form class="form-horizontal">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-4 control-label">
						Company Name</label>
						<div class="col-md-6">
							<div class="form-line">
								<input readonly id="name" type="text" class="form-control" name="name" value="{{ $company['name'] }}" autofocus>
							</div>
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">
						{{trans('Company Email')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input  readonly id="email" type="email" class="form-control" name="email" value="{{ $company['email'] }}">
							</div>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
						<label for="logo" class="col-md-4 control-label">
						{{trans('front.companies.logo')}}</label>
						<div class="col-md-6">
							<div class="card" style="width: 18rem;">
								<img class="card-img-top img-responsive" src="{{asset('storage/logo/'.$company['logo'])}}" alt="">
								<div class="card-body">
								</div>
							</div>
						</div>
					</div>
					 <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
						<label for="website" class="col-md-4 control-label">{{trans('front.companies.website')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input readonly id="website" type="text" class="form-control" name="website" value="{{$company['website']}}">
							</div>
							@if ($errors->has('website'))
								<span class="help-block">
									<strong>{{ $errors->first('website') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<a href="{{ route('companies.index') }}" 
							type="submit" class="btn btn-info">
							{{trans('front.actions.back')}}
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
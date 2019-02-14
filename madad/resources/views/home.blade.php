@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <hr>
                   <div class="text-left">
                   <a href="{{ route('companies.create') }}"
					 type="submit"
					  class="btn  btn-flat margin-bottom-1">
						Add a new Company
					</a>
					<a href="{{ route('companies.index') }}"
					 type="submit"
					  class="btn  btn-flat margin-bottom-1">
						Manage your Company
					</a>
					
				<hr>
				 <div class="text-left">
				 <a href="{{ route('employees.create') }}"
					 type="submit"
					  class="btn  btn-flat margin-bottom-1">
						Add a new Employee
					</a>
					<a href="{{ route('employees.index') }}"
					 type="submit"
					  class="btn  btn-flat margin-bottom-1">
						Manage your Employees
					</a>
				<hr>
				
			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

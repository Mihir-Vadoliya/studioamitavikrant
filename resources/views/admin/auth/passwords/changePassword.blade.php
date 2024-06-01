@extends('admin.layouts.app')
@section('title', '| Change Password')
@section('content')
	
	<div class="content-wrapper">

		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Change Password</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Change Password</li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
		    <div class="container-fluid">
		        <div class="row justify-content-center">

		            <div class="col-12">

		                <div class="card card-primary">
		                    <div class="card-header">
		                        <h3 class="card-title">Change Password</h3>
		                    </div>

		                    <form id="adminLoginForm" method="post" action="{{ route('admin.setChangePassword') }}">
							    @csrf
							    @method('POST')
							    
							    @error('error')
							    <div class="col-12 mb-2">
							        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
							    </div>
							     @enderror

		                        <div class="card-body">
		                            <div class="form-group">
		                                <label for="exampleInputEmail1">Email address</label>
		                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
		                            </div>
		                            <div class="form-group">
		                                <label for="exampleInputPassword1">Password</label>
		                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="password">
		                            </div>
		                        </div>

		                        <div class="card-footer">
		                            <button type="submit" class="btn btn-primary">Submit</button>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	</div>

@endsection
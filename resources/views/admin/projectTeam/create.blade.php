@extends('admin.layouts.app')
@section('title', '| Project Team Create')
@section('content')
	
	<div class="content-wrapper">

		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Project Team Create</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Project Team Create</li>
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
		                        <h3 class="card-title">Project Team Create</h3>
		                    </div>

		                    <form method="post" action="{{ route('projectTeam.store') }}">
							    @csrf
							    @method('POST')
							    
		                        <div class="card-body">
		                            <div class="form-group">
		                                <label class="fw-bold">Name</label>
								        <input name="name" id="name" type="name" placeholder="Name" class="form-control login_field ">
		                            </div>
		                            <div class="form-group">
	                            		<label class="fw-bold"> Status</label>
	                            	    <select class="form-control form-select" name="isActive">
	                            	    	<option value="active">Active</option>
	                            	    	<option value="inactive">Inactive</option>
	                            	    </select>
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
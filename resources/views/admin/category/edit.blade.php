@extends('admin.layouts.app')
@section('title', '| Category Edit')
@section('content')
	
	<div class="content-wrapper">

		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Category Edit</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Category Edit</li>
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
		                        <h3 class="card-title">Category Edit</h3>
		                    </div>
		                    
		                    <form method="post" action="{{ route('category.update', [ 'category' => $data->id ] ) }}">
							    @csrf
							    @method('PUT')
							    
		                        <div class="card-body">
		                            <div class="form-group">
		                                <label class="fw-bold"> Name</label>
								        <input name="name" id="name" type="name" placeholder="Category Name" class="form-control login_field " value="{{ $data->name }}">
		                            </div>
		                            <div class="form-group">
	                            		<label class="fw-bold"> Status</label>
	                            	    <select class="form-control form-select" name="isActive">
	                            	    	<option value="active" @if($data->isActive == "active") selected @endif>Active</option>
	                            	    	<option value="inactive" @if($data->isActive == "inactive") selected @endif>Inactive</option>
	                            	    </select>
		                            </div>
		                        </div>

		                        <div class="card-footer">
		                            <button type="submit" class="btn btn-primary">Update</button>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	</div>

@endsection
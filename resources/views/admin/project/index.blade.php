@extends('admin.layouts.app')
@section('title', '| Project List')
@section('content')
	
	<div class="content-wrapper">

		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Project</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Project</li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header d-flex">
								<div>
									<h3 class="card-title">Project List</h3>
								</div>
								<div class="ml-auto">
									<a class="btn btn-primary text-decoration-none" href="{{ route('project.create') }}">
										Add Project
									</a>
								</div>
							</div>

							<div class="card-body">
								<table id="dataTable" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Id</th>
											<th>Name</th>
											<th>Location</th>
											<th>Size</th>
											<th>Services</th>
											<th>Completion Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key=>$value)
										<tr>
											<td>{{ ++$key }}</td>
											<td>{{ $value->name }}</td>
											<td>{{ $value->location }}</td>
											<td>{{ $value->size }}</td>
											<td>{{ $value->services }}</td>
											<td>{{ $value->completion_date }}</td>
											<td> 
												@if($value->stage == "Complete")
												<span class="badge badge-dot badge-dot-xs badge-success p-2 font-14">Complete</span> 
												@elseif($value->stage == "Under Construction")
												<span class="badge badge-dot badge-dot-xs badge-danger p-2 font-14">Under Construction</span>
												@else
												<span class="badge badge-dot badge-dot-xs badge-warning p-2 font-14">Concept</span>
												@endif
											</td>
											<td class="d-flex">
												<a href="{{ route('project.edit',['project' =>  $value->id  ]) }}" class="text-decoration-none px-1"><i class="fas fa-edit"></i></a>
												
												<form action="{{ route('project.destroy',['project' => $value->id ]) }}" method="POST" id="deleteForm{{ $value->id }}">
												    @csrf
												    @method('DELETE')
													<a href="#" class="text-decoration-none px-1" onclick="confirmDelete({{ $value->id }})"><i class="fas fa-trash"></i></a>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

	</div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function (){
			$(function () {
				$('#dataTable').DataTable({
					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"responsive": true,
				});
			});
		})

		function confirmDelete(id) {
	       var result = confirm('Are you sure you want to delete this record?');

	       if (result) {
	           document.getElementById('deleteForm' + id).submit();
	       }
	   }
		
	</script>
@endpush
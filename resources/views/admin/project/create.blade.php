@extends('admin.layouts.app')
@section('title', '| Project Create')

@push('styles')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<style>
		.select2-container--default .select2-selection--multiple .select2-selection__choice{
			color: #000;
		}
		h3{
			text-transform: uppercase;
		}
		.ck-editor__editable_inline {
		    min-height: 500px;
		}
	</style>
@endpush
@section('content')
	
	<div class="content-wrapper">

		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Project Create</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Project Create</li>
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
		                        <h3 class="card-title">Project Create</h3>
		                    </div>

		                    <form method="post" action="{{ route('project.store') }}" enctype='multipart/form-data'>
							    @csrf
							    @method('POST')
							    
								{!! \App\Helpers\HtmlHelper::metaForm() !!}

		                        <div class="card-body border border-success">
		                        	<h3>PROJECT SUMMARY</h3>
		                        	<div class="row">
			                            <div class="col-6 form-group">
			                                <label class="fw-bold">Name</label>
									        <input name="name" type="text" placeholder="Project Name" class="form-control login_field ">
			                            </div>
			                            <div class="col-6 form-group">
			                                <label class="fw-bold">Size</label>
									        <input name="size" type="text" placeholder="Size" class="form-control login_field ">
			                            </div>
			                        </div>

			                        <div class="row">
			                            <div class="col-6 form-group">
			                                <label class="fw-bold">Location</label>
									        <input name="location" type="text" placeholder="Location" class="form-control login_field ">
			                            </div>
										
										<div class="col-6 form-group">
			                                <label class="fw-bold">Category</label>
									        <select class="select2" multiple="multiple" data-placeholder="Select options" style="width: 100%;" name="category_id[]">
		                            	    	<option value="">Select</option>
		                            	    	@foreach($category as $cat)
		                            	    		<option value="{{ $cat->id }}">{{ $cat->name }}</option>
		                            	    	@endforeach
		                            	    </select>
			                            </div>			                            
			                        </div>

			                        <div class="row">
			                        	<div class="col-6 form-group">
			                                <label class="fw-bold">Completion Date</label>
									        <input type="text" class="form-control" id="completion_year" placeholder="Select Year" name="completion_date">
			                            </div>
			                            
			                            <div class="col-6 form-group">
		                            		<label class="fw-bold"> Stage</label>
		                            	    <select class="form-control form-select" name="stage">
		                            	    	<option value="Complete">Complete</option>
		                            	    	<option value="Under Construction">Under Construction</option>
		                            	    	<option value="Concept">Concept</option>
		                            	    </select>
			                            </div>
			                        </div>
			                        <div class="row">
			                        	<div class="col-12 form-group">
			                                <label class="fw-bold">Project Images</label>
									        <input name="image[]" type="file" class="form-control login_field " multiple>
			                            </div>
			                        </div>
		                        </div>

		                        <div class="card-body mt-5 border border-success">
		                        	<div class="row ">
			                            <div class="col-6 form-group">
			                            	<div>
				                                <input type="text" name="project_summary_title" placeholder="Project Summary" class="form-control login_field">
			                            	</div>
			                            	<div class="mt-3">
			                                	<textarea class="project_summary_details" name="project_summary_details"></textarea>
			                            		
			                            	</div>
			                            </div>
			                            <div class="col-6 form-group">
			                            	<div>
				                                <input type="text" name="project_team_title" placeholder="Project Team" class="form-control login_field">
			                            	</div>
			                            	<div class="mt-3">
			                                	<textarea class="project_team_details" name="project_team_details"></textarea>
			                            	</div>
			                            </div>
			                        </div>
		                        </div>

		                        <div id="formsContainer">
				                    <div class="card-body mt-5 border border-success" id="projectDescriptionForm">
			                        	<div class="row">
			                        		<div class="col-12 form-group">
				                        		<input type="text" name="project_description_title[]" placeholder="Project Description Title" class="form-control login_field">
				                        	</div>

					                        <div class="col-12 form-group">
			                                	<textarea class="project_description" name="project_description[]"></textarea>
			                                </div>
			                            </div>
			                            
			                            <button type="button" class="btn btn-danger removeForm">
			                            	Remove
			                            </button>
			                        </div>
			                    </div>
			                    <div class="mt-3 mx-3">
			                    	<button type="button" class="btn btn-primary" id="addForm">
			                    		Add New Project Description
			                    	</button>	
			                    </div>

	                            <div class="card-body mt-5 border border-success">
		                            <h3>Project Publications</h3>
		                        	<div class="row">
		                                <div class="col-12 form-group">
		                                	<textarea class="publications" name="publications"></textarea>
		                                </div>
	                            	</div>
	                            </div>

	                            <div class="card-body mt-5 border border-success">
		                        	<h3>SIMILAR PROJECTS</h3>
		                        	<div class="row">
				                        <div class="col-12 form-group">
									        <select class="select2" multiple="multiple" data-placeholder="Select options" style="width: 100%;" name="similar_projects[]">
		                            	    	<option value="">Select</option>
		                            	    	@foreach($project as $projects)
		                            	    		<option value="{{ $projects->id }}">{{ $projects->name }}</option>
		                            	    	@endforeach
		                            	    </select>
			                            </div>
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

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

	<script>
		$(document).ready(function() {
		  $('.select2').select2();

		  	$('#completion_year').datepicker({
		       format: "yyyy",
		       viewMode: "years",
		       minViewMode: "years",
		       autoclose: true
		     });

		  	var i = 0;
		  	$("#addForm").click(function(){
		  		i++;
  	            var form =`
                    <div class="card-body mt-5 border border-success" id="projectDescriptionForm">
                    	<div class="row">
                    		<div class="col-12 form-group">
                        		<input type="text" name="project_description_title[]" placeholder="Project Description Title" class="form-control login_field">
                        	</div>

	                        <div class="col-12 form-group">
                            	<textarea class="project_description_${i}" name="project_description[]"></textarea>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-danger removeForm">
                        	Remove
                        </button>
                    </div>
  	            `;

  	            $("#formsContainer").append(form);

  	            // Initialize CKEditor for the new textarea
  	            ClassicEditor
					.create( document.querySelector( '.project_description_'+i ), {
						ckfinder: {
			                uploadUrl: '{{route('projectDetailsImage').'?_token='.csrf_token()}}',
			            }
					} )
					.catch( error => {
						console.error( error );
					} );
  	        });

  	        // Remove form
  	        $(document).on("click", ".removeForm", function(){
  	            $(this).closest('.projectDescriptionForm').remove();
  	        });
		});

			ClassicEditor
				.create( document.querySelector( '.project_summary_details' ))
				.catch( error => {
					console.error( error );
				} );

			ClassicEditor
				.create( document.querySelector( '.project_team_details' ))
				.catch( error => {
					console.error( error );
				} );

			ClassicEditor
				.create( document.querySelector( '.project_description' ), {
					ckfinder: {
		                uploadUrl: '{{route('projectDetailsImage').'?_token='.csrf_token()}}',
		            }
				} )
				.catch( error => {
					console.error( error );
				} );

			ClassicEditor
				.create( document.querySelector( '.publications' ))
				.catch( error => {
					console.error( error );
				} );

				

	</script>

@endpush
@extends('admin.layouts.app')
@section('title', '| Project Edit')

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
						<h1>Project Edit</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Project Edit</li>
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
		                        <h3 class="card-title">Project Edit</h3>
		                    </div>

		                    <form method="post" action="{{ route('project.update', [ 'project' => $data->id ]) }}" enctype='multipart/form-data'>
							    @csrf
							    @method('PUT')
							    
								{!! \App\Helpers\HtmlHelper::metaForm($metaData) !!}

		                        <div class="card-body border border-success">
		                        	<h3>PROJECT SUMMARY</h3>
		                        	<div class="row">
			                            <div class="col-6 form-group">
			                                <label class="fw-bold">Name</label>
									        <input name="name" type="text" placeholder="Project Name" class="form-control login_field " value="{{ $data->name }}">
			                            </div>
			                            <div class="col-6 form-group">
			                                <label class="fw-bold">Size</label>
									        <input name="size" type="text" placeholder="Size" class="form-control login_field " value="{{ $data->size }}">
			                            </div>
			                        </div>

			                        <div class="row">
			                            <div class="col-6 form-group">
			                                <label class="fw-bold">Location</label>
									        <input name="location" type="text" placeholder="Location" class="form-control login_field " value="{{ $data->location }}">
			                            </div>
			                            <div class="col-6 form-group">
			                                <label class="fw-bold">Category</label>
									        <select class="select2" multiple="multiple" data-placeholder="Select options" style="width: 100%;" name="category_id[]">
		                            	    	<option value="">Select</option>
		                            	    	<?php $selectedIds = explode(',', $data->category_id); ?>
		                            	    	@foreach($category as $cat)
		                            	    		<option value="{{ $cat->id }}" @if(in_array($cat->id, $selectedIds)) selected @endif>{{ $cat->name }}</option>
		                            	    	@endforeach
		                            	    </select>
			                            </div>
			                        </div>

			                        <div class="row">
			                        	<div class="col-6 form-group">
			                                <label class="fw-bold">Completion Date</label>
									        <input type="text" class="form-control" id="completion_year" placeholder="Select Year" name="completion_date" value="{{ $data->completion_date }}">
			                            </div>
			                            
			                            <div class="col-6 form-group">
		                            		<label class="fw-bold"> Stage</label>
		                            	    <select class="form-control form-select" name="stage">
		                            	    	<option value="Complete" @if($data->stage == "Complete") selected @endif>Complete</option>
		                            	    	<option value="Under Construction" @if($data->stage == "Under Construction") selected @endif>Under Construction</option>
		                            	    	<option value="Concept" @if($data->stage == "Concept") selected @endif>Concept</option>
		                            	    </select>
			                            </div>
			                        </div>
			                        <div class="row">
			                        	<div class="col-12 form-group">
			                                <label class="fw-bold">Project Images</label>
									        <input name="image[]" type="file" class="form-control login_field " multiple>

									        <div id="imageGallery">
									           @php
									             $galleryImage = explode(',', $data->image);
									           @endphp
									           	
									           <div class="d-flex flex-wrap">
									               @foreach($galleryImage as $galleryImg)
									                   <div class="gallery-item mr-3 mt-3">
									                       <div>
									                           <img src="{{ asset('/uploads/projectGallery/'.$galleryImg) }}" style="width: 115px; height: 120px;" class="rounded-2 my-2">
									                       </div>
									                       <div class="text-center">
									                           <button type="button" class="removeImage btn btn-danger mt-2" data-image="{{ $galleryImg }}">Remove</button>
									                       </div>
									                   </div>
									               @endforeach
									           </div>

									        </div>

			                            </div>
			                        </div>
		                        </div>

		                        <div class="card-body mt-5 border border-success">
		                        	<div class="row ">
			                            <div class="col-6 form-group">
			                            	<div>
				                                <input type="text" name="project_summary_title" placeholder="Project Summary" class="form-control login_field" value="{{ $data->project_summary_title }}">
			                            	</div>
			                            	<div class="mt-3">
			                                	<textarea class="project_summary_details" name="project_summary_details">{{ $data->project_summary_details}}</textarea>
			                            		
			                            	</div>
			                            </div>
			                            <div class="col-6 form-group">
			                            	<div>
				                                <input type="text" name="project_team_title" placeholder="Project Team" class="form-control login_field" value="{{ $data->project_team_title }}">
			                            	</div>
			                            	<div class="mt-3">
			                                	<textarea class="project_team_details" name="project_team_details">
			                                		{{ $data->project_team_details}}
			                                	</textarea>
			                            	</div>
			                            </div>
			                        </div>
		                        </div>

		                        <div id="formsContainer">
		                        @foreach($projectDescriptions as $projectDescription)
				                    <div class="card-body mt-5 border border-success projectDescriptionForm" id="projectDescriptionForm">
		                        		<input type="hidden" name="project_description_id[]" value="{{ $projectDescription->id }}">
			                        	<div class="row">
			                        		<div class="col-12 form-group">
				                        		<input type="text" name="project_description_title[]" placeholder="Project Description Title" class="form-control login_field" value="{{ $projectDescription->title }}">
				                        	</div>

					                        <div class="col-12 form-group">
			                                	<textarea class="project_description{{ $projectDescription->id }}" name="project_description[]">
			                                		{{ $projectDescription->description }}
			                                	</textarea>
			                                </div>
			                            </div>
			                            
			                            <button type="button" class="btn btn-danger removeForm">
			                            	Remove
			                            </button>
			                        </div>
		                        @endforeach
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
		                                	<textarea class="publications" name="publications">{{ $data->publications }}</textarea>
		                                </div>
	                            	</div>
	                            </div>

	                            <div class="card-body mt-5 border border-success">
		                        	<h3>SIMILAR PROJECTS</h3>
		                        	<div class="row">
				                        <div class="col-12 form-group">
									        <select class="select2" multiple="multiple" data-placeholder="Select options" style="width: 100%;" name="similar_projects[]">
		                            	    	<option value="">Select</option>
		                            	    	<?php $selectedIds = explode(',', $data->similar_projects); ?>
		                            	    	@foreach($project as $projects)
		                            	    		<option value="{{ $projects->id }}" @if(in_array($projects->id, $selectedIds)) selected @endif>{{ $projects->name }}</option>
		                            	    	@endforeach
		                            	    </select>
			                            </div>
			                        </div>
			                    </div>

		                        <div class="card-footer">
		                            <button type="submit" class="btn btn-primary">Save</button>
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
                
            $('.removeImage').click(function(){
                // Get the image name from the data attribute
                var imageName = $(this).data('image');
                
                // Send a POST request via AJAX
                $.ajax({
                    url: '{{ route("removeProjectImage") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        productId: '{{ $data->id }}',
                        imageName: imageName
                    },
                    success: function(response){
                        // If the request is successful, remove the image element from the DOM
                        if(response.success){
                            alert('Image removed successfully!');
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error){
                        // Handle errors
                        console.error(xhr.responseText);
                    }
                });
            });
        
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
                    <div class="card-body mt-5 border border-success projectDescriptionForm" id="projectDescriptionForm">
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

			// ClassicEditor
			// 	.create( document.querySelector( '.project_description' ), {
			// 		ckfinder: {
		    //             uploadUrl: '{{route('projectDetailsImage').'?_token='.csrf_token()}}',
		    //         }
			// 	} )
			// 	.catch( error => {
			// 		console.error( error );
			// 	} );

			var projectDetails = <?php echo json_encode($projectDescriptions); ?>;

			// Iterate over each project detail
			$.each(projectDetails, function(index, projectDetail) {
			    // Create a new ClassicEditor instance for each .project_description element
			    ClassicEditor
			        .create(document.querySelector('.project_description' + projectDetail.id), {
			            ckfinder: {
			                uploadUrl: '{{ route('projectDetailsImage') }}?_token={{ csrf_token() }}',
			            }
			        })
			        .catch(error => {
			            console.error(error);
			        });
			});


			ClassicEditor
				.create( document.querySelector( '.publications' ))
				.catch( error => {
					console.error( error );
				} );

				

	</script>
@endpush
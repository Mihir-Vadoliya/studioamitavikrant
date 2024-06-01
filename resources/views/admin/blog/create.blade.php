@extends('admin.layouts.app')
@section('title', '| Blog Create')
@section('content')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
	<style>
		.select2-container--default .select2-selection--multiple .select2-selection__choice{
			color: #000;
		}
		.ck-editor__editable_inline {
		    min-height: 800px;
		}
	</style>
	<div class="content-wrapper">

		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Blog Create</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Blog Create</li>
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
		                        <h3 class="card-title">Blog Create</h3>
		                    </div>

		                    <form method="post" action="{{ route('blog.store') }}" enctype='multipart/form-data'>
							    @csrf
							    @method('POST')
							    
								{!! \App\Helpers\HtmlHelper::metaForm() !!}
								
		                        <div class="card-body">
		                            <div class="form-group">
		                                <label class="fw-bold">Name</label>
								        <input name="name" id="name" type="name" placeholder="Name" class="form-control login_field ">
		                            </div>
		                            <div class="row">
	    	                            <div class="col-6 form-group">
	                                		<label class="fw-bold">Category</label>
	                                	    <select class="select2" multiple="multiple" data-placeholder="Select options" style="width: 100%;" name="category_id[]">
	                                	    	<option value="">Select</option>
	                                	    	@foreach($data as $cat)
	                                	    		<option value="{{ $cat->id }}">{{ $cat->name }}</option>
	                                	    	@endforeach
	                                	    </select>
	    	                            </div>
	    	                            <div class="col-6 form-group">
	                                		<label class="fw-bold">Publish At</label>
	                                	    <select class="form-control form-select" name="page">
	                                	    	<option value="">Select</option>
	                                	    	<option value="news">News</option>
	                                	    	<option value="research">Research</option>
	                                	    </select>
	    	                            </div>
    	                            </div>
    	                            <div class="row">
	    	                            <div class="col-6 form-group">
		                            		<label class="fw-bold"> Status</label>
		                            	    <select class="form-control form-select" name="isActive">
		                            	    	<option value="active">Active</option>
		                            	    	<option value="inactive">Inactive</option>
		                            	    </select>
			                            </div>
	                                    <div class="col-6 form-group">
	                                        <label class="fw-bold">Publish Date</label>
	        						        <input name="date" id="date" type="date" placeholder="Publish Date" class="form-control login_field ">
	                                    </div>
	                                </div>

	                                <div class="row">
			                            <div class="col-12 form-group">
			                                <label class="fw-bold">Related Bogs</label>
									        <select class="select2" multiple="multiple" data-placeholder="Select options" style="width: 100%;" name="relatedBogs[]">
		                            	    	<option value="">Select</option>
		                            	    	@foreach($blog as $blogs)
		                            	    		<option value="{{ $blogs->id }}">{{ $blogs->name }}</option>
		                            	    	@endforeach
		                            	    </select>
			                            </div>
			                        </div>

	                                <div class="form-group">
                                        <label class="fw-bold">Blog Image</label>
        						        <input name="image" id="image" type="file" class="form-control login_field ">
                                    </div>

                                    <div class="form-group">
                                    	<label class="fw-bold">Content</label>
                                    	<textarea class="editor" name="content"></textarea>
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

	<script>
		$(document).ready(function() {
		  $('.select2').select2();
		});
		ClassicEditor
			.create( document.querySelector( '.editor' ), {
				ckfinder: {
	                uploadUrl: '{{route('blogImage').'?_token='.csrf_token()}}',
	            }
			} )
			.catch( error => {
				console.error( error );
			} );
	</script>
@endpush
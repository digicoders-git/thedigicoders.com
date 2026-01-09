<?php
	if (!empty($table))
	{
		$action = $table;
		
		switch ($action)
		{
			
			case "form_element":
		?>
		<form action="<?= base_url() ?>Admin/ManageSetting/Update" enctype="multipart/form-data" method="POST" class="form" id="add-event">
			<div class="form-group mb-3">
				<label>Add Fields</label>
				<input type="text"  name="field" class="form-control" value="<?= $userdata->field_name ?>" required />
				<input type="hidden"  name="id" value="<?= $userdata->id ?>"class="form-control" required />
			</div>
			<div class="form-group mb-3">
				<label>Add Form Value</label>
				<input type="text"  name="value" value="<?= $userdata->value ?>" class="form-control" required />
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Update</button>
		</div>
	</form>
	<?php
		break;
		
		case "webinar":
	?>
	<form action="<?= base_url() ?>Admin/ManageWebinar/Update" enctype="multipart/form-data" method="POST" class="form" id="gallery-form">
		
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group mb-3">
					<label for="">College Name</label>
					<input type="text" name="college_name" value="<?= $userdata->college_name ?>" class="form-control" required placeholder="Enter College Name">
					<input type="hidden" name="id" class="form-control" value="<?= $userdata->id ?>" required placeholder="Enter College Name">
				</div>
				<div class="form-group mb-3">
					<label for="">Webinar Date </label>
					<input type="date" name="webinar_date" value="<?= $userdata->webinar_date ?>" required class="form-control">
				</div>
				<div class="form-group mb-3">
					<label for="">Speaker</label>
					<input type="text" name="speaker" value="<?= $userdata->speaker ?>" class="form-control" required placeholder="Shpearker name">
				</div>
				<div class="form-group mb-3">
					<label for="">About The Webinar</label>
					<textarea name="topic" id="" cols="30" rows="3" required class="form-control summernote"><?= $userdata->about_webinar ?></textarea>
				</div>
				<div class="form-group mb-3">
					<label for="">College Logo </label>
					<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/webinar/').$userdata->college_logo ?>" name="logo" class="dropify"  />
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group mb-3">
					<label for="">College Code</label>
					<input type="text" name="college_code" value="<?= $userdata->college_code ?>" class="form-control" required placeholder="Entar College Code">
				</div>
				<div class="form-group mb-3">
					<label for="">Duration</label>
					<input type="text" name="duration" class="form-control" value="<?= $userdata->duration ?>" required placeholder="Enter Duration">
				</div>
				<div class="form-group mb-3">
					<label for="">Plateform (Google Meet , Zoom)</label>
					<input type="text" name="plateform" class="form-control" value="<?= $userdata->plateform ?>" required placeholder="Enter plateform">
				</div>
				<div class="form-group mb-3" id="new_chq">
					<label for="">You Will learn </label>
					<div class="input-group-btn"> 
						<button class="btn btn-success add-more"  type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
					</div>
					<?php
						$about_webinar = $userdata->about_webinar;	
						$data = explode(',',$about_webinar);
						$i=0;
						foreach($data as $value)
						{
							
						?>
						<div class="input-group control-group after-add-more">
							
							<input type="text" name="addmore[]" value="<?= $value; ?>" class="form-control" placeholder="About The Webinar">
							
							<?php
								if($i == 1){	
								?>
								<div class="input-group-btn"> 
									<button class="btn btn-success add-more"  type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
								</div>
								<?php
								}else
								{
								?>
								<div class="input-group-btn"> 
									<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
								</div>
								<?php
								}
							?>
						</div>
						<br>
						<?php
						}	
					?>
				</div>
				<div class="form-group mb-3" id="new_chq">
					<label for="">About The Speaker</label>
					<textarea name="about_speaker" cols="30" class="summernote"  rows="3" required class="form-control summernote"><?= $userdata->about_speaker ?></textarea>
				</div>
				<br>
				<div class="form-group mb-3">
					<label for="">Upload Banner </label>
					<input type="file" id="input-file-now" name="image" data-default-file="<?= base_url('public/uploads/webinar/').$userdata->image; ?>" class="dropify"  />
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" id="submitBtn" class="btn btn-primary"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>Save changes</button>
	</div>
</form>
<?php
	break;
	
	case "news":
?>
<form action="<?= base_url() ?>Admin/ManageNews/Update" enctype="multipart/form-data" method="POST" class="form" id="add-event">
	
	<label>Upload Image</label>
	<div class="form-group mb-3">
		<input type="file" id="input-file-now" name="image" class="dropify" required />
		<input type="hidden"  name="id" class="form-control" value="<?= $userdata->id ?>" required />
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Update</button>
</div>
</form>
<?php
	break;
	
	
	case "faq":
?>
<form action="<?= base_url() ?>Admin/ManageFAQ/Update" enctype="multipart/form-data" class="form" method="POST" id="faq">
	
	<div class="form-group mb-3">
		<label for="">Add Question</label>
		<input type="hidden" name="id" value=<?= $userdata->id ?>>
		<textarea name="question" id="" cols="30" rows="2" class="form-control" placeholder="Question"><?= $userdata->question ?></textarea>
	</div>
	
	<div class="form-group mb-3">
		<label for="">Answer</label>
		<textarea name="answer" id="summernote" cols="30" rows="5" class="form-control"><?= $userdata->answer ?></textarea>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Save changes</button>
</div>
</form>
<?php
	break;
	
	
	case "videos":
?>
<form action="<?= base_url() ?>Admin/ManageVideo/Update" method="POST" enctype="multipart/form-data" class="form" id="video-form">
	<div class="form-group mb-3">
		<label for="">Title</label>
		<input type="hidden" name="id" value=<?= $userdata->id ?> required class="form-control">
		<input type="text" name="title" value=<?= $userdata->title; ?> required class="form-control">
	</div>
	<div class="form-group mb-3">
		<label for="">Video Url</label>
		<input type="text" name="url" value=<?= $userdata->video_url; ?> required class="form-control">
	</div>
	<div class="form-group mb-3">
		<label for="">Video Thumbnails</label>
		<input type="file" name="image" required class="dropify">
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin d-none" id="submitSpin"></i>Update </button>
</div>
</form>
<?php
	break;
	
	
	case "review":
?>
<form action="<?= base_url() ?>Admin/ManageReview/Update" enctype="multipart/form-data" method="POST" class="form" id="review-form">
	<div class="form-group mb-3">
		<label for="">Name</label>
		<input type="hidden" name="id" value=<?= $userdata->id; ?> class="form-control" required />
		<input type="name" name="name" value=<?= $userdata->name; ?> class="form-control" required />
	</div>
	<div class="form-group mb-3">
		<label for="">Position</label>
		<input type="text" name="position" value=<?= $userdata->position; ?> class="form-control" required />
	</div>
	<div class="form-group mb-3">
		<label for="">Message</label>
		<textarea name="message" id="" cols="30" rows="10" class="form-control">
			<?= $userdata->message ?>
		</textarea>
	</div>
	<div class="form-group mb-3">
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/review/') . $userdata->image; ?>" name="image" class="dropify"  />
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Update </button>
</div>
</form>
<?php
	break;
	
	case "gallery":
?>

<form action="<?= base_url() ?>Admin/ManageGallery/Update" enctype="multipart/form-data" method="POST" class="form" id="gallery-form">
	<div class="form-group mb-3">
		<label for="">Choose Category</label>
		<input type="hidden" name="id" value="<?= $userdata->id ?>">
		<select name="category" id="" class="form-control">
			<option selected disabled>Select</option>
			<option value="All" <?php if ($userdata->category == 'All')
				{
					echo "selected";
				} ?>>All</option>
				<option value="Office" <?php if ($userdata->category == 'Office')
					{
						echo "selected";
					} ?>>Office</option>
					<option value="Training" <?php if ($userdata->category == 'Training')
						{
							echo "selected";
						} ?>>Training</option>
						<option value="Seminar" <?php if ($userdata->category == 'Seminar')
							{
								echo "selected";
							} ?>>Seminar</option>
		</select>
	</div>
	
	<div class="form-group mb-3">
		<label for="">Upload Image </label>
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/gallery/') . $userdata->image; ?>" name="image" class="dropify" required />
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Update </button>
</div>

<?php
	break;
	
	
	case "advisory":
?>
<form action="<?= base_url() ?>Admin/ManageAdvisory/Update" enctype="multipart/form-data" method="POST" class="form" id="advisory-list">
	<div class="form-group mb-3">
		<label for="">Title</label>
		<input type="hidden" name="id" value="<?= $userdata->id ?>" class="form-control" required />
		<input type="text" name="title" value="<?= $userdata->title ?>" class="form-control" required />
	</div>
	<div class="form-group mb-3">
		<label for="">Role</label>
		<input type="text" name="role" value="<?= $userdata->role ?>" class="form-control" required />
	</div>
	<div class="form-group mb-3">
		<label for="">Upload Image</label>
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/advisory/') . $userdata->image; ?>" name="image" class="dropify" required />
	</div>
</div>
<div class="modal-footer">
	<button type="button" id="submitBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin d-none" id="submitSpin"></i>Update </button>
</div>
</form>
<?php
	break;
	
	case "appreciation":
	
?>
<form action="<?= base_url() ?>Admin/ManageAppreciation/Update" enctype="multipart/form-data" method="POST" class="form" id="partner-list">
	<div class="form-group mb-3">
		<label for="">Title</label>
		<input type="hidden" name="id" value="<?= $userdata->id ?>" class="form-control" placeholder="Enter Title">
		<input type="text" name="title" value="<?= $userdata->title ?>" class="form-control" placeholder="Enter Title">
	</div>
	<div class="form-group mb-3">
		<label for="">Role</label>
		<input type="text" name="role" value="<?= $userdata->role ?>" class="form-control" placeholder="Enter Role">
	</div>
	<div class="form-group mb-3">
		<label for="">Upload Image </label>
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/appreciation/') . $userdata->image; ?>" name="image" class="dropify"  />
	</div>
</div>
<div class="modal-footer">
	<button type="button" id="submitBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin d-none" id="submitSpin"></i>Update</button>
</div>
</form>
<?php
	
	break;
	
	
	case "placement_partner":
	
?>
<form action="<?= base_url() ?>Admin/PlacementPartner/Update" enctype="multipart/form-data" method="POST" class="form" id="partner-list">
	<div class="form-group mb-3">
		<label for="">Title</label>
		<input type="hidden" name="id" value=<?= $userdata->id; ?> class="form-control" placeholder="Enter Title">
		<input type="text" name="title" value=<?= $userdata->title; ?> class="form-control" placeholder="Enter Title">
	</div>
	<div class="form-group mb-3">
		<label for="">Role</label>
		<input type="text" name="role" value=<?= $userdata->role; ?> class="form-control" placeholder="Enter Role">
	</div>
	<div class="form-group mb-3">
		<label for="">Upload Image </label>
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/placement_partner/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
</div>
<div class="modal-footer">
	<button type="button" id="submitBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin d-none" id="submitSpin"></i>Update</button>
</div>
</form>
<?php
	
	break;
	
	case "achievemens":
	
?>
<form action="<?= base_url() ?>Admin/Achievements/Update" enctype="multipart/form-data" method="POST" id="add-achievement" class="form">
	<div class="form-group mb-3">
		<label for="">Title</label>
		<input type="hidden" name="id" value=<?= $userdata->id; ?> class="form-control" placeholder="Enter Title">
		<input type="text" name="title" value=<?= $userdata->title; ?> class="form-control" placeholder="Enter Title">
	</div>
	<div class="form-group mb-3">
		<label for="">Role</label>
		<input type="text" name="role" value=<?= $userdata->role; ?> class="form-control" placeholder="Enter Role">
	</div>
	<div class="form-group mb-3">
		<label for="">Upload Image </label>
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/achievemens/') . $userdata->image; ?>" name="image" class="dropify" required />
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>Update</button>
</div>
</form>
<?php
	
	break;
	
	
	case "mou":
?>
<form action="<?= base_url() ?>Admin/ManageMOU/Update" enctype="multipart/form-data" method="POST" class="form" id="add-mou">
	<div class="form-group mb-3">
		<label for="">Title</label>
		<input type="hidden" name="id" class="form-control" value="<?= $userdata->id; ?>" required placeholder="Enter Title">
		<input type="text" name="title" class="form-control" value="<?= $userdata->title; ?>" required placeholder="Enter Title">
	</div>
	<div class="form-group mb-3">
		<label for="">Role</label>
		<input type="text" name="role" class="form-control" value="<?= $userdata->role; ?>" required placeholder="Enter Role">
	</div>
	<div class="form-group mb-3">
		<label for="">Choose Season</label>
		<select name="season" id="" class="form-control" required>
			<option value="" selected disabled>Select</option>
			<option value="2022" <?php if ($userdata->season == '2022')
				{
					echo "selected";
				}  ?>>2022</option>
				<option value="2021" <?php if ($userdata->season == '2022')
					{
						echo "selected";
					}  ?>>2021</option>
					<option value="2020" <?php if ($userdata->season == '2020')
						{
							echo "selected";
						}  ?>>2020</option>
						<option value="2019" <?php if ($userdata->season == '2019')
							{
								echo "selected";
							}  ?>>2019</option>
		</select>
	</div>
	<div class="form-group mb-3">
		<label for="">Upload Image</label><br>
		<input type="file" id="input-file-now" name="image" data-default-file="<?= base_url('public/uploads/mou/') . $userdata->image; ?>" class="dropify" required />
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" id="submitBtn"> <i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i> Update</button>
</div>
</form>
<?php
	
	
	break;
	case "events":
?>
<form action="<?= base_url() ?>Admin/ManageEvent/Update" enctype="multipart/form-data" method="POST" class="form" id="add-event">
	<div class="form-group mb-3">
		<label for="">Title</label>
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" required />
		<input type="text" name="title" value=<?= $userdata->title ?> required class="form-control" placeholder="Title">
	</div>
	
	<div class="form-group mb-3">
		<label for="">Event Date</label>
		<input type="date" name="event_date" value=<?= $userdata->event_date ?> required class="form-control">
	</div>
	<div class="form-group mb-3">
		<label for="">Description</label>
		<textarea name="description" id="summernote" cols="30" rows="5" class="form-control"><?= $userdata->description ?></textarea>
	</div>
	<div class="form-group mb-3">
		<label for="">Update Image</label>
		<input type="file" id="input-file-now" name="image" data-default-file="<?= base_url('public/uploads/event/') . $userdata->image; ?>" class="dropify" />
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>Update </button>
</div>
</form>
<?php
	break;
	
	case "client":
?>
<form action="<?= base_url() ?>Admin/ManageClient/Edit" enctype="multipart/form-data" method="POST" id="client-form">
	<div class='img-fluid borderd p-2'>
		<img src="<?= base_url('public/uploads/client/') . $userdata->image; ?>" alt="" style="height: 200px; weight:100%;">
		<input type="hidden" name="id" value=<?= $userdata->id; ?>>
	</div>
	<div class="form-group mb-3">
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/event/') . $userdata->image; ?>" name="image" class="dropify" required />
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<?php
	break;
	
	case "expert":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/ManageExpertList/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Expert Name" required />
		<input type="text" class="form-control" value="<?= $userdata->name ?>" name="name" placeholder="Enter Expert Name" required />
	</div>
	<div class="form-group mb-3">
		<input type="text" name="role" value="<?= $userdata->role ?>" class="form-control" placeholder="Enter Role" name="role" required />
	</div>
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/expert/') . $userdata->image; ?>" name="image" class="dropify" required />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	case "trending":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/TrendingNews/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Trending Name" required />
	</div>
	
	<div class="form-group mb-3">
		<input type="text" class="form-control" value="<?= $userdata->title ?>" name="title" placeholder="Enter Title" />
	</div>
	
	<!--<div class="form-group mb-3">
		<label class="col-form-label">Author Name <span class="text-danger">*</span></label>
		<select id="disabledSelect" class="form-select form-control" name="author">
			<option selected disabled>Select Author</option>
			<option <?//php
				// if ($userdata->author == 'Gopal Sir')
				// {
					// echo "selected";
				// }
			?>>Gopal Sir</option>
			<option <?//php
				// if ($userdata->author == 'Himanshu Sir')
				// {
					// echo "selected";
				// }
			?>>Himanshu Sir</option>
		</select>
	</div>-->
	
	<label for="exampleFormControlSelect1">Select Author</label>
	<div class="form-group mb-3">
		<select class="form-control" name="author_id" id="exampleFormControlSelect1">
			<option value="<?= $userdata->author_id ?>" selected>
				<?php 
					$idd = $userdata->author_id;
					$sub=$this->db->get_where('authors',array('id'=>$idd))->row();
					echo $sub->name;
				?>
			</option>
			<?php 
				$data=$this->db->get('authors')->result();
				foreach($data as $res)
				{
				?>
				<option value='<?= $res->id; ?>'><?= $res->name; ?></option>
				<?php 
				} 
			?>			
		</select>
	</div>
	
	<div class="form-group mb-3">
		<textarea name="description" placeholder="Type Description" class="form-control"><?= $userdata->description ?></textarea>
	</div>
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/trending/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	case "training":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/ManageTraining/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Training Name" required />
	</div>
	
	<div class="form-group mb-3">
		<label class="col-form-label">Training Type <span class="text-danger">*</span></label>
		<select id="disabledSelect" class="form-select form-control" name="traning_type">
			<option selected disabled>Select Training Type</option>
			<option <?php
				if ($userdata->traning_type == 'summer')
				{
					echo "selected";
				}
			?>>summer</option>
			<option <?php
				if ($userdata->traning_type == 'apprenticeship')
				{
					echo "selected";
				}
			?>>apprenticeship</option>
		</select>
	</div>
	
	
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/training/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	case "authors":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/ManageAuthor/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Author Name" required />
	</div>
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/authors/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" value="<?= $userdata->name ?>" name="name" placeholder="Enter Author Name" />
	</div>
	
	<div class="form-group mb-3">
		<input type="text" class="form-control" value="<?= $userdata->media ?>" name="media" placeholder="Enter Author Media" />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	case "subject":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/ManageSubject/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Subject Name" required />
	</div>
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/subject/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
	<div class="form-group mb-3">
		<input type="text" class="form-control" value="<?= $userdata->subject ?>" name="subject" placeholder="Enter Subject Name" />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	case "semester":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/ManageSemester/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Semester Name" required />
	</div>
	
	<label for="exampleFormControlSelect1">Select Category</label>
	<div class="form-group mb-3">
		<select class="form-control" name="subject_id" id="exampleFormControlSelect1">
			<option value="<?= $userdata->subject_id ?>" selected>
				<?php 
					$idd = $userdata->subject_id;
					$sub=$this->db->get_where('subject',array('id'=>$idd))->row();
					echo $sub->subject;
				?>
			</option>
			<?php 
				$data=$this->db->get('subject')->result();
				foreach($data as $res)
				{
				?>
				<option value='<?= $res->id; ?>'><?= $res->subject; ?></option>
				<?php 
				} 
			?>			
		</select>
	</div>
	<label>Semester Name</label>
	<div class="form-group mb-3">
		<input type="text"  name="semester" value="<?= $userdata->semester; ?>" class="form-control" />
	</div>
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/semester/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	
	case "paper_category":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/PaperCategory/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter paper Category Name" required />
	</div>
	
	<div class="form-group mb-3">
		<label for="category-dropdown">Select Course</label>
		<select class="form-control" name="subject_id" id="category-dropdown">
			<option value="<?= $userdata->subject_id ?>" selected>
				<?php 
					$idd = $userdata->subject_id;
					$cat=$this->db->get_where('subject',array('id'=>$idd))->row();
					echo $cat->subject;
				?>
			</option>
			<?php 
				$data=$this->db->get('subject')->result();
				foreach($data as $res)
				{
				?>
				<option value='<?= $res->id; ?>'><?= $res->subject; ?></option>
				<?php 
				} 
			?>			
		</select>
	</div>
	
	
	<div class="form-group mb-3">
		<label for="subcategory">Select Semester</label>
		<select class="form-control" name="semester_id" id="sub-category-dropdown">
			<option value="<?= $userdata->semester_id ?>" selected>
				<?php 
					$subidd = $userdata->semester_id;
					$subcat=$this->db->get_where('semester',array('id'=>$subidd))->row();
					echo $subcat->semester;
				?>
			</option>
			
		</select>
	</div>
	
	<label>Category Name</label>
	<div class="form-group mb-3">
		<input type="text"  name="category_name" value="<?= $userdata->category_name; ?>" class="form-control" />
	</div>
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/paper_category/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	
	
	
	
	case "technology":
	// var_dump($userdata);
?>
<form action="<?= base_url() ?>Admin/ManageTechnology/Update" enctype="multipart/form-data" method="POST" id="expert-form">
	<div class="form-group mb-3">
		<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter paper Category Name" required />
	</div>
	
	<div class="form-group mb-3">
		<label for="category-dropdown">Select Course</label>
		<select class="form-control" name="subject_id" id="category-dropdown">
			<option value="<?= $userdata->subject_id ?>" selected>
				<?php 
					$idd = $userdata->subject_id;
					$cat=$this->db->get_where('subject',array('id'=>$idd))->row();
					echo $cat->subject;
				?>
			</option>
			<?php 
				$data=$this->db->get('subject')->result();
				foreach($data as $res)
				{
				?>
				<option value='<?= $res->id; ?>'><?= $res->subject; ?></option>
				<?php 
				} 
			?>			
		</select>
	</div>
	
	
	<div class="form-group mb-3">
		<label for="category-dropdown">Select Semester</label>
		<select class="form-control" name="semester_id" id="sub-category-dropdown">
			<option value="<?= $userdata->semester_id ?>" selected>
				<?php 
					$idd = $userdata->subject_id;
					$sem=$this->db->get_where('semester',array('id'=>$idd))->row();
					echo $sem->semester;
				?>
			</option>
			
			<?php 
				$data=$this->db->get('semester')->result();
				foreach($data as $res)
				{
				?>
				<option value='<?= $res->id; ?>'><?= $res->semester; ?></option>
				<?php 
				} 
			?>

		</select>
	</div>
	
	
	<div class="form-group mb-3">
		<label for="subcategory">Select Category</label>
		<select class="form-control" name="category_id" id="sub-sub-category-dropdown">
			<option value="<?= $userdata->category_id ?>" selected>
				<?php 
					$catidd = $userdata->category_id;
					$cat=$this->db->get_where('paper_category',array('id'=>$catidd))->row();
					echo $cat->category_name;
				?>
			</option>
		</select>
	</div>
	
	<label>Technology Name</label>
	<div class="form-group mb-3">
		<input type="text"  name="technology_name" value="<?= $userdata->technology_name; ?>" class="form-control" />
	</div>
	
	<div class="form-group mb-3">
		<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/technology/') . $userdata->image; ?>" name="image" class="dropify" />
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Update </button>
	</div>
</form>
<?php
	break;
	
	
	
	
	
	
	
	
	default:
	echo "No such form exist!";
	break;
}
}


?>
<script>
	$('.dropify').dropify();
	
	$('#summernote').summernote({
		placeholder: 'Discription..',
		tabsize: 2,
		height: 120,
		toolbar: [
		['style', ['style']],
		['font', ['bold', 'underline', 'clear']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['table', ['table']],
		['insert', ['link', 'picture', 'video']],
		['view', ['fullscreen', 'codeview', 'help']]
		]
	});
	$('.summernote').summernote({
		placeholder: 'About the Speaker',
		tabsize: 2,
		height: 120,
		toolbar: [
		['style', ['style']],
		['font', ['bold', 'underline', 'clear']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['table', ['table']],
		['insert', ['link', 'picture', 'video']],
		['view', ['fullscreen', 'codeview', 'help']]
		]
		
	})
	
	$(".add-more").click(function(){ 
		var html = $(".copy").html();
		$(".after-add-more").after(html);
	});
	
	
	$("body").on("click",".remove",function(){ 
		$(this).parents(".control-group").remove();
	});
</script>	
<script>
	$(document).ready(function() {
		$('#category-dropdown').on('change', function() {
			var subject_id = this.value;
			$.ajax({
				url: "<?= base_url('Admin/SubCategoryDrop')?>",
				type: "POST",
				data: {
					subject_id: subject_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-category-dropdown").html('');  // How To Check Empty Check Case
					$("#sub-category-dropdown").html(result);
				}
			});
		});
		
		$('#sub-category-dropdown').on('change', function() {
	
			var semester_id = this.value;
			$.ajax({
				url: "<?= base_url('Admin/SubSubCategoryDrop')?>",
				type: "POST",
				data: {
					semester_id: semester_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-category-dropdown").html(result);
					// console.log(result);
				}
			});
		});
	});
</script>	
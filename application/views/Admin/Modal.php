<?php
if (!empty($table)) {
	$action = $table;

	switch ($action) {

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

		// edit teacher here 
		case "tbl_teacher":
			?>
				<form action="<?= base_url() ?>Admin/ManageTeacher/Update" method="POST" class="form" id="add-event">
		
					<input type="hidden"  name="id" value="<?= $userdata->id ?>"class="form-control" required />
		
					<div class="form-group mb-3">
						<label>Teacher Name</label>
						<input type="text"  name="teacher_name" value="<?= $userdata->teacher_name ?>" class="form-control" required />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Update</button>
				</div>
			</form>
			<?php
			break;


		// edit batch 
		case "tbl_batch":
			?>
			<form action="<?= base_url() ?>Admin/ManageBatch/Update" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter paper Category Name" required />
				</div>
	
				<div class="form-group mb-3">
					<label for="category-dropdown">Select Teacher</label>
					<select class="form-control" name="teacher_id">
						<option value="<?= $userdata->teacher_id ?>" selected>
							<?php
							$idd = $userdata->teacher_id;
							$teacher = $this->db->get_where('tbl_teacher', array('id' => $idd))->row();
							echo $teacher->teacher_name;
							?>
						</option>
						<?php
						$data = $this->db->get('tbl_teacher')->result();
						foreach ($data as $res) {
							?>
								<option value='<?= $res->id; ?>'><?= $res->teacher_name; ?></option>
							<?php
						}
						?>			
					</select>
				</div>
	
				<div class="form-group mb-3">
					<label>Batch Name</label>
					<input type="text"  name="batch_name" value="<?= $userdata->batch_name; ?>" class="form-control" />
				</div>
				<div class="form-group mb-3">
					<label>Time From</label>
					<input type="text" name="time_from" value="<?= date("h:i A", strtotime($userdata->time_from)); ?>" class="form-control" placeholder="HH:MM AM/PM" />
				</div>
				<div class="form-group mb-3">
					<label>Time To</label>
					<input type="text" name="time_to" value="<?= date("h:i A", strtotime($userdata->time_to)); ?>" class="form-control" placeholder="HH:MM AM/PM" />
				</div>
	
				<div class="form-group mb-3">
					<label>Room Number</label>
					<input type="text"  name="room_no" value="<?= $userdata->room_no; ?>" class="form-control" />
				</div>
				<div class="form-group mb-3">
					<label>Start From</label>
					<input type="date"  name="start_from" value="<?= $userdata->start_from; ?>" class="form-control" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;





		// strat 

		case "tbl_assignment":
			?>
			<form action="<?= base_url() ?>Admin/ManageAssignment/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter paper Category Name" required />
				</div>
	
				<div class="form-group mb-3">
					<label for="category-dropdown">Select Batch</label>
					<select class="form-control" name="batch_id">
						<option value="<?= $userdata->batch_id ?>" selected>
							<?php
							$idd = $userdata->batch_id;
							$batch = $this->db->get_where('tbl_batch', array('id' => $idd))->row();
							echo $batch->batch_name;
							?>
						</option>
						<?php
						$data = $this->db->get('tbl_batch')->result();
						foreach ($data as $res) {
							?>
								<option value='<?= $res->id; ?>'><?= $res->batch_name; ?></option>
							<?php
						}
						?>			
					</select>
				</div>
	
	
				<div class="form-group mb-3">
					<label>Assignment Title</label>
					<input type="text"  name="title" value="<?= $userdata->title; ?>" class="form-control" />
				</div>
	
				<div class="form-group mb-3">
					<label>Upload File</label>
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/assignment/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
				<div class="form-group mb-3">
					<label>Due Date</label>
					<input type="date"  name="due_date" value="<?= $userdata->due_date; ?>" class="form-control" />
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;

		// end 
















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
							<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/webinar/') . $userdata->college_logo ?>" name="logo" class="dropify"  />
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
							$data = explode(',', $about_webinar);
							$i = 0;
							foreach ($data as $value) {

								?>
									<div class="input-group control-group after-add-more">
						
										<input type="text" name="addmore[]" value="<?= $value; ?>" class="form-control" placeholder="About The Webinar">
						
										<?php
										if ($i == 1) {
											?>
												<div class="input-group-btn"> 
													<button class="btn btn-success add-more"  type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
												</div>
												<?php
										} else {
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
							<input type="file" id="input-file-now" name="image" data-default-file="<?= base_url('public/uploads/webinar/') . $userdata->image; ?>" class="dropify"  />
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

		case "blog":
			?>
			<form action="<?= base_url() ?>Admin/Blog/Update" enctype="multipart/form-data" method="POST" class="form" id="add-event">
	
	
				<div class="form-group mb-3">
					<label for="">Title</label>
					<input type="text" name="title" class="form-control"  value="<?= $userdata->title ?>" required/>
				</div>
				<div class="form-group mb-3">
					<label for="">Sub Title</label>
					<input type="text" name="subtitle" class="form-control"  value="<?= $userdata->subtitle ?>" required/>
				</div>
				<div class="form-group mb-3">
					<label for="">Content</label>
					<textarea name="content" id="summernote" cols="30" rows="5" class="form-control"><?= $userdata->content ?></textarea>
				</div>
				<div class="form-group mb-3">
					<label>Upload Image</label>
					<input type="file" data-default-file="<?= base_url('public/uploads/blog/') . $userdata->img; ?>" id="input-file-now" name="img" class="dropify"  />
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


		case "placement":
			?>
			<form action="<?= base_url() ?>Admin/placement/Update" enctype="multipart/form-data" method="POST" class="form" id="add-event">
	
				<label>Upload Image</label>
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/placement/') . $userdata->photo; ?>" name="photo" class="dropify" />
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
						<option value="All" <?php if ($userdata->category == 'All') {
							echo "selected";
						} ?>>All</option>
							<option value="Office" <?php if ($userdata->category == 'Office') {
								echo "selected";
							} ?>>Office</option>
								<option value="Training" <?php if ($userdata->category == 'Training') {
									echo "selected";
								} ?>>Training</option>
									<option value="Seminar" <?php if ($userdata->category == 'Seminar') {
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
				<!-- <div class="form-group mb-3">
					<label for="">Choose Season</label>
					<select name="season" id="" class="form-control" required>
						<option value="" selected disabled>Select</option>
						<option value="2022" <?php if ($userdata->season == '2022') {
							echo "selected";
						} ?>>2022</option>
							<option value="2021" <?php if ($userdata->season == '2022') {
								echo "selected";
							} ?>>2021</option>
								<option value="2020" <?php if ($userdata->season == '2020') {
									echo "selected";
								} ?>>2020</option>
									<option value="2019" <?php if ($userdata->season == '2019') {
										echo "selected";
									} ?>>2019</option>
					</select>
				</div> -->
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
					<input type="text" class="form-control" value="<?= $userdata->name ?>" name="name" placeholder="Enter Expert Name" />
				</div>
				<div class="form-group mb-3">
					<input type="text" name="role" value="<?= $userdata->role ?>" class="form-control" placeholder="Enter Role" name="role" required />
				</div>
				<div class="form-group mb-3">
					<input type="number" name="sequence" value="<?= $userdata->sequence ?>" class="form-control" placeholder="Enter Sequence" required />
				</div>
	
				<div class="form-group mb-3">
					<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/expert/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;

		case "intern":

			?>
			<form action="<?= base_url() ?>Admin/Intern/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Expert Name" required />
					<input type="text" class="form-control" value="<?= $userdata->name ?>" name="name" placeholder="Enter Expert Name" />
				</div>
				<div class="form-group mb-3">
					<input type="text" name="role" value="<?= $userdata->role ?>" class="form-control" placeholder="Enter Role" name="role" />
				</div>
	
				<div class="form-group mb-3">
					<input type="file" id="input-file-now" data-default-file="<?= base_url('public/uploads/expert/') . $userdata->image; ?>" name="image" class="dropify" />
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
							$sub = $this->db->get_where('authors', array('id' => $idd))->row();
							echo $sub->name;
							?>
						</option>
			
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


		case "manage_videos":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/ManageVideos/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Trending Name" required />
				</div>
	
				<div class="form-group mb-3">
					<input type="text" class="form-control" value="<?= $userdata->title ?>" name="title" placeholder="Enter Title" />
				</div>
	
	
	
				<label for="exampleFormControlSelect1">Select Author</label>
				<div class="form-group mb-3">
					<select class="form-control" name="author_id" id="exampleFormControlSelect1">
						<option value="<?= $userdata->author_id ?>" selected>
							<?php
							$idd = $userdata->author_id;
							$sub = $this->db->get_where('authors', array('id' => $idd))->row();
							echo $sub->name;
							?>
						</option>
			
					</select>
				</div>
	
				<label for="exampleFormControlSelect1">Select Video Type</label>
				<div class="form-group mb-3">
					<select id="disabledSelect" class="form-select form-control" name="video_type">
						<option selected disabled>Select Video Type</option>
						<option <?php
						if ($userdata->video_type == 'Popular Videos') {
							echo "selected";
						}
						?>>Popular Videos</option>
						<option <?php
						if ($userdata->video_type == 'Recommended Videos') {
							echo "selected";
						}
						?>>Recommended Videos</option>
					</select>
				</div>
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/manage_videos/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
	
				<label>Title</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="title" value="<?= $userdata->title ?>" class="form-control"  />
				</div>
				<label>Url</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="url"value="<?= $userdata->url ?>" class="form-control" />
				</div>
	
				<label>Short Description</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="short_desc" value="<?= $userdata->short_desc ?>" class="form-control" />
				</div>
				<label>Description</label>
				<div class="form-group mb-3">
					<textarea name="description" id="summernote1" class="form-control"><?= $userdata->description ?></textarea>
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;



























		case "modal":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/ManageModal/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Trending Name" required />
				</div>
	
	
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/modal_images/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
	
				<label>Title</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="title" value="<?= $userdata->title ?>" class="form-control"  />
				</div>
				<label>Url</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="url"value="<?= $userdata->url ?>" class="form-control" />
				</div>
	
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;






















		case "trending_videos":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/TrendingVideos/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Trending Video" required />
				</div>
	
				<label for="exampleFormControlSelect1">Select Author</label>
				<div class="form-group mb-3">
					<select class="form-control" name="author_id" id="exampleFormControlSelect1">
						<option value="<?= $userdata->author_id ?>" selected>
							<?php
							$idd = $userdata->author_id;
							$sub = $this->db->get_where('authors', array('id' => $idd))->row();
							echo $sub->name;
							?>
						</option>
						<?php
						$data = $this->db->get('authors')->result();
						foreach ($data as $res) {
							?>
								<option value='<?= $res->id; ?>'><?= $res->name; ?></option>
							<?php
						}
						?>
					</select>
				</div>
	
				<label for="exampleFormControlSelect1">Select Video Type</label>
				<div class="form-group mb-3">
					<select id="disabledSelect" class="form-select form-control" name="video_type">
						<option selected disabled>Select Video Type</option>
						<option <?php
						if ($userdata->video_type == 'Summer Training Videos') {
							echo "selected";
						}
						?>>Summer Training Videos</option>
						<option <?php
						if ($userdata->video_type == 'Apprenticeship Traning Videos') {
							echo "selected";
						}
						?>>Apprenticeship Traning Videos</option>
					</select>
				</div>
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/trending_videos/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
	
				<label>Title</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="title" value="<?= $userdata->title ?>" class="form-control"  />
				</div>
				<label>Video</label>
				<div class="form-group mb-3">
					<input type="file" id="input-file-now" value="<?= $userdata->url ?>" name="url" class="form-control dropify" placeholder="Upload Video" />
		
				</div>
				<!--<label>Url</label>
		<div class="form-group mb-3">
		<input type="text" id="input-file-now" name="url"value="<?= $userdata->url ?>" class="form-control" />
	</div>-->
	
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
						if ($userdata->traning_type == 'summer') {
							echo "selected";
						}
						?>>summer</option>
						<option <?php
						if ($userdata->traning_type == 'apprenticeship') {
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
			<form action="<?= base_url() ?>Admin/ManageCourse/Update" enctype="multipart/form-data" method="POST" id="expert-form">
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
							$sub = $this->db->get_where('subject', array('id' => $idd))->row();
							echo $sub->subject;
							?>
						</option>
						<?php
						$data = $this->db->get('subject')->result();
						foreach ($data as $res) {
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
							$cat = $this->db->get_where('subject', array('id' => $idd))->row();
							echo $cat->subject;
							?>
						</option>
						<?php
						$data = $this->db->get('subject')->result();
						foreach ($data as $res) {
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
							$subcat = $this->db->get_where('semester', array('id' => $subidd))->row();
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
							$cat = $this->db->get_where('subject', array('id' => $idd))->row();
							echo $cat->subject;
							?>
						</option>
						<?php
						$data = $this->db->get('subject')->result();
						foreach ($data as $res) {
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
							$sem = $this->db->get_where('semester', array('id' => $idd))->row();
							echo $sem->semester;
							?>
						</option>
			
					</select>
				</div>
	
	
				<div class="form-group mb-3">
					<label for="subcategory">Select Category</label>
					<select class="form-control" name="category_id" id="sub-sub-category-dropdown">
						<option value="<?= $userdata->category_id ?>" selected>
							<?php
							$catidd = $userdata->category_id;
							$cat = $this->db->get_where('paper_category', array('id' => $catidd))->row();
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


		case "technology_pdf":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/TechnologyPdf/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Technology Pdf" required />
				</div>
	
				<div class="form-group mb-3">
					<label for="category-dropdown">Select Course</label>
					<select class="form-control" name="subject_id" id="category-dropdown">
						<option value="<?= $userdata->subject_id ?>" selected>
							<?php
							$idd = $userdata->subject_id;
							$cat = $this->db->get_where('subject', array('id' => $idd))->row();
							echo $cat->subject;
							?>
						</option>
						<?php
						$data = $this->db->get('subject')->result();
						foreach ($data as $res) {
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
							$sem = $this->db->get_where('semester', array('id' => $idd))->row();
							echo $sem->semester;
							?>
						</option>
			
					</select>
				</div>
	
	
				<div class="form-group mb-3">
					<label for="subcategory">Select Category</label>
					<select class="form-control" name="category_id" id="sub-sub-category-dropdown">
						<option value="<?= $userdata->category_id ?>" selected>
							<?php
							$catidd = $userdata->category_id;
							$cat = $this->db->get_where('paper_category', array('id' => $catidd))->row();
							echo $cat->category_name;
							?>
						</option>
					</select>
				</div>
	
	
				<div class="form-group mb-3">
					<label for="subcategory">Select Technology</label>
					<select class="form-control" name="technology_id" id="sub-sub-sub-category-dropdown">
						<option value="<?= $userdata->technology_id ?>" selected>
							<?php
							$catidd = $userdata->technology_id;
							$cat = $this->db->get_where('technology', array('id' => $catidd))->row();
							echo $cat->technology_name;
							?>
						</option>
					</select>
				</div>
	
	
	
				<label>Technology Pdf</label>
				<div class="form-group mb-3">
					<input type="text"  name="pdf_name" value="<?= $userdata->pdf_name; ?>" class="form-control" />
				</div>
				<!--<label>Technology Pdf Url</label>
		<div class="form-group mb-3">
		<input type="text"  name="pdf_url" value="<?//= $userdata->pdf_url; ?>" class="form-control" />
	</div>-->
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/technology_pdf/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
	
	
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;








		case "technology_category":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/ManageTechnologyCategory/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Course Name" required />
				</div>
	
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/technology_category/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
				<div class="form-group mb-3">
					<input type="text" class="form-control" value="<?= $userdata->course ?>" name="course" placeholder="Enter Course Name" />
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;

		case "technology_videos":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/ManageTechnologyVideo/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Technology Category" required />
				</div>
	
				<label for="exampleFormControlSelect1">Select Course</label>
				<div class="form-group mb-3">
					<select class="form-control" name="technology_category_id" id="exampleFormControlSelect1">
			
						<option value="<?= $userdata->technology_category_id ?>" selected>
							<?php
							$idd = $userdata->technology_category_id;
							$sub = $this->db->get_where('technology_category', array('id' => $idd))->row();
							echo $sub->course;
							?>
						</option>
						<?php
						$data = $this->db->get('technology_category')->result();
						foreach ($data as $res) {
							?>
								<option value='<?= $res->id; ?>'><?= $res->course; ?></option>
							<?php
						}
						?>			
					</select>
				</div>
	
	
				<label for="exampleFormControlSelect1">Author Name</label>
				<div class="form-group mb-3">
					<select class="form-control" name="author_id" id="exampleFormControlSelect1">
						<option value="<?= $userdata->author_id ?>" selected>
							<?php
							$idd = $userdata->author_id;
							$sub = $this->db->get_where('authors', array('id' => $idd))->row();
							echo $sub->name;
							?>
						</option>
						<?php
						$data = $this->db->get('authors')->result();
						foreach ($data as $res) {
							?>
								<option value='<?= $res->id; ?>'><?= $res->name; ?></option>
							<?php
						}
						?>
					</select>
				</div>
	
	
	
				<!-- Video Type Here -->
				<label for="exampleFormControlSelect1">Select Video Type</label>
				<div class="form-group mb-3">
					<select class="form-control" name="video_type" id="video_type">
						<option value="" disabled="" selected="">Select Video Type</option>
						<option <?php
						if (!empty($userdata->video_type == 'Recommended Videos')) {
							echo "selected";
						}
						?>>Recommended Videos</option>
						<option <?php
						if (!empty($userdata->video_type == 'Popular Videos')) {
							echo "selected";
						}
						?>>Popular Videos</option>
						<option <?php
						if (!empty($userdata->video_type == 'Technology Videos')) {
							echo "selected";
						}
						?>>Technology Videos</option>
					</select>
				</div>
				<!-- Video Type Here -->
	
	
	
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/technology_videos/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
	
				<label>Title</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="title" class="form-control" value="<?= $userdata->title ?>" />
				</div>
				<label>Url</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="url" value="<?= $userdata->url ?>" class="form-control"  />
				</div>
				<label>Short Description</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" name="short_desc" value="<?= $userdata->short_desc ?>" class="form-control"  />
				</div>
	
				<label>Description</label>
				<div class="form-group mb-3">
					<textarea name="description" placeholder="Type Description" id="summernote" class="form-control" ><?= $userdata->description ?></textarea>
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;

		case "job_category":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/JobCategory/Update" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Job Category Name" required />
				</div>
	
				<div class="form-group mb-3">
					<input type="text" class="form-control" value="<?= $userdata->category_name ?>" name="category_name" placeholder="Enter Job Category Name" />
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;



		case "job_details":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/JobDetails/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Job Details" required />
				</div>
	
				<label for="exampleFormControlSelect1">Select Job Category</label>
				<div class="form-group mb-3">
					<select class="form-control" name="jobcategory_id" id="exampleFormControlSelect1">
						<option value="<?= $userdata->jobcategory_id ?>" selected>
							<?php
							$idd = $userdata->jobcategory_id;
							$sub = $this->db->get_where('job_category', array('id' => $idd))->row();
							echo $sub->category_name;
							?>
						</option>
						<?php
						$data = $this->db->get('job_category')->result();
						foreach ($data as $res) {
							?>
								<option value='<?= $res->id; ?>'><?= $res->category_name; ?></option>
							<?php
						}
						?>			
					</select>
				</div>
				<div class="form-group mb-3">
					<input type="file" id="input-file-now"  data-default-file="<?= base_url('public/uploads/job_details/') . $userdata->image; ?>" name="image" class="dropify" />
				</div>
				<label>Job Title</label>
				<div class="form-group mb-3">
					<input type="text"  name="job_title" value="<?= $userdata->job_title; ?>" class="form-control" />
				</div>
				<label>Company Name</label>
				<div class="form-group mb-3">
					<input type="text"  name="company_name" value="<?= $userdata->company_name; ?>" class="form-control" />
				</div>
	
	
				<label>Job Role</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->job_role; ?>" name="job_role" class="form-control" placeholder="Job Role"  />
				</div>
	
				<label>Job Location</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->location; ?>" name="location" class="form-control" placeholder="Job Location"  />
				</div>
	
				<label>Job Salary</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->salary; ?>" name="salary" class="form-control" placeholder="Job Salary"  />
				</div>
	
				<label>Job Shift</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->job_shift; ?>" name="job_shift" class="form-control" placeholder="Job Shift"  />
				</div>
	
				<label>Job Mode</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->job_mode; ?>" name="job_mode" class="form-control" placeholder="Job Mode"  />
				</div>
	
				<label>Mobile</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->mobile; ?>" name="mobile" class="form-control" placeholder="Mobile"  />
				</div>
	
				<label>Email</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->email; ?>" name="email" class="form-control" placeholder="Email"  />
				</div>
	
				<label>Website</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->website; ?>" name="website" class="form-control" placeholder="Website"  />
				</div>
	
				<label>Skill</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->skill; ?>" name="skill" class="form-control" placeholder="Skill"  />
				</div>
	
				<label>Education</label>
				<div class="form-group mb-3">
					<select class="form-control"  name="education" id="education">
						<option selected="" disabled="" selected>Select Education</option>
			
						<option selected disabled>Select Training Type</option>
						<option <?php
						if ($userdata->education == 'Diploma') {
							echo "selected";
						}
						?>>Diploma</option>
						<option <?php
						if ($userdata->education == 'Graducation') {
							echo "selected";
						}
						?>>Graducation</option>
			
					</select>
				</div>
	
				<label>Experience</label>
				<div class="form-group mb-3">
					<input type="text" id="input-file-now" value="<?= $userdata->experience; ?>" name="experience" class="form-control" placeholder="Experience"  />
				</div>
	
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;


		case "registration":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/UpdateReg/TnxStatus" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Job Details" required />
				</div>
	
				<label for="exampleFormControlSelect1">Select Payment Status</label>
				<div class="form-group mb-3">
					<select class="form-control" name="tnx" id="exampleFormControlSelect1" required >
						<option value="PAID" <?php if ($userdata->txn_status == 'PAID') {
							echo 'selected';
						} ?>>PAID</option>
						<option value="SUCCESS"  <?php if ($userdata->txn_status == 'SUCCESS') {
							echo 'selected';
						} ?>>SUCCESS</option>
						<option value="FAILED"  <?php if ($userdata->txn_status != 'PAID' && $userdata->txn_status != 'SUCCESS' && $userdata->txn_status != 'PENDING') {
							echo 'selected';
						} ?>>FAILED</option>
						<option value="FAILED"  <?php if ($userdata->txn_status == 'PENDING') {
							echo 'selected';
						} ?>>Pending</option>
			
					</select>
				</div>  
				<label>Tnx Password</label>
				<div class="form-group mb-3">
					<input type="password" id="input-file-now"  name="tnxpass" class="form-control" placeholder="Tnx Password" required />
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;
		case "fee_deposit":
			// var_dump($userdata); 
			?>
			<form action="<?= base_url() ?>Admin/feePay/TnxStatus" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Job Details" required />
				</div>
	
				<label for="exampleFormControlSelect1">Select Payment Status</label>
				<div class="form-group mb-3">
					<select class="form-control" name="tnx" id="exampleFormControlSelect1" required >
						<option value="PAID" <?php if ($userdata->txn_status == 'PAID') {
							echo 'selected';
						} ?>>PAID</option>
						<option value="SUCCESS"  <?php if ($userdata->txn_status == 'SUCCESS') {
							echo 'selected';
						} ?>>SUCCESS</option>
						<option value="FAILED"  <?php if ($userdata->txn_status != 'PAID' && $userdata->txn_status != 'SUCCESS') {
							echo 'selected';
						} ?>>FAILED</option>
						<option value="FAILED"  <?php if ($userdata->txn_status == 'PENDING') {
							echo 'selected';
						} ?>>Pending</option>
			
					</select>
				</div>  
				<label>Tnx Password</label>
				<div class="form-group mb-3">
					<input type="password" id="input-file-now"  name="tnxpass" class="form-control" placeholder="Tnx Password" required />
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;

		case "tbl_coupon":
			// var_dump($userdata);
			?>
			<form action="<?= base_url() ?>Admin/ManageCoupon/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<div class="form-group mb-3">
					<input type="hidden" class="form-control" value="<?= $userdata->id; ?>" name="id" placeholder="Enter Job Details" required />
				</div>
	
				<label>Coupon Name</label> 
				<div class="form-group mb-3">
					<input type="text" id="input-file-now1" name="name" value="<?= $userdata->name ?>" placeholder="Enter Coupon Name" class="form-control" required />
				</div>
	
				<label>Coupon Code</label>
				<div class="form-group mb-3">
					<input type="text" id="Code" name="code" value="<?= $userdata->code ?>" placeholder="Enter Coupon Code" class="form-control" required />
				</div>
	
				<label>Amount</label>
				<div class="form-group mb-3">
					<input type="number" id="input-file-now3" name="amount" value="<?= $userdata->amount ?>" placeholder="Enter Amount" class="form-control" required />
				</div>
	
				<label>Max Use</label>
				<div class="form-group mb-3">
					<input type="number" id="input-file-now4" name="max" value="<?= $userdata->max_use ?>" placeholder="Enter Max Use" class="form-control" required />
				</div>
	
				<label>Till Valid</label>
				<div class="form-group mb-3"> 
					<input type="date" id="input-file-now6" name="exp" class="form-control" value="<?= $userdata->expiry_date ?>" required />
				</div>
				<label>Description</label>
				<div class="form-group mb-3">
					<textarea id="input-file-now5" name="desc" placeholder="Enter Description" class="form-control" required ><?= $userdata->description ?></textarea>
				</div>
				<label>Tnx Password</label>
				<div class="form-group mb-3">
					<input type="password" id="tnxpass" name="tnxpass" class="form-control" required />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
			<?php
			break;

		case "seo_pages":
			?>
			<form action="<?= base_url() ?>Admin/editpage" method="POST" id="seo-page-form">
				<?php
				$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
				);
				?>
				<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
				<input value="<?= $userdata->id ?>" type="hidden" name="id" class="form-control" required>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="course_name" class="form-label">Course Name *</label>
						<input type="text" class="form-control" id="course_name" name="course_name"
							value="<?= $userdata->course_name ?>" placeholder="Enter Course Name" required>
					</div>
                     <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                 <select id="state" class="form-select" name="state_name" required>
                                    <option value="">--Select State --</option>
                                    <?php foreach ($states as $row): ?>
                                        <option value="<?= $row->state_name ?>">
                                            <?= $row->state_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                     </div>
					
				      </div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="city_id" class="form-label">City Name *</label>
						  <select class="form-select" id="city" name="city_name" required>
                                    <option value="">Select City</option>
                                  
                                </select>
					</div>
					<div class="col-md-6 mb-3">
						<label for="title" class="form-label">Title</label>
						<input type="text" class="form-control" id="title" name="title" value="<?= $userdata->title ?>"
							placeholder="Enter Title">
					</div>
				</div>
				<div class="mb-3">
					<label for="heading" class="form-label">Heading</label>
					<input type="text" class="form-control" id="heading" name="heading" value="<?= $userdata->heading ?>"
						placeholder="Enter Heading">
				</div>
				<div class="mb-3">
					<label for="content" class="form-label">Content</label>
					<textarea class="form-control" id="content" name="content" rows="4"
						placeholder="Enter Content"><?= $userdata->content ?></textarea>
				</div>

				<div class="mb-3">
					<label for="meta_description" class="form-label">Meta Description</label>
					<textarea class="form-control" id="meta_description" name="meta_description" rows="3"
						placeholder="Enter Meta Description"><?= $userdata->meta_description ?></textarea>
				</div>

				<div class="mb-3">
					<label for="keywords" class="form-label">Keywords</label>
					<input type="text" class="form-control" id="keywords" name="keywords" value="<?= $userdata->keywords ?>"
						placeholder="Enter Keywords (comma separated)">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
			<?php
			break;
        case "slider":
			?>
			<form action="<?= base_url() ?>Admin/ManageSlider/Update" enctype="multipart/form-data" method="POST" id="expert-form">
				<?php
				$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
				);
				?>
				<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>"   />
				<input type="hidden" name="id" value="<?= $userdata->id ?>">

				<div class="form-group mb-3">
					<input type="text" class="form-control" name="title" value="<?= $userdata->title ?>"
						placeholder="Enter title Name" required />
				</div>

				<div class="form-group mb-3">
					<input type="file" id="input-file-now" name="image" class="dropify"
						data-default-file="<?= base_url('public/uploads/sliders/') . $userdata->image; ?>" />
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
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
	$('#summernote1').summernote({
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
	$('#Code').keyup(function(){
		this.value = this.value.toUpperCase();
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
				url: "<?= base_url('Admin/SubCategoryDrop') ?>",
				type: "POST",
				data: {
					subject_id: subject_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-category-dropdown").html('');  // How To Check Empty Check Case
					$("#sub-sub-sub-category-dropdown").html('');  // How To Check Empty Check Case
					$("#sub-category-dropdown").html(result);
				}
			});
		});
		
		$('#sub-category-dropdown').on('change', function() {
			
			var semester_id = this.value;
			$.ajax({
				url: "<?= base_url('Admin/SubSubCategoryDrop') ?>",
				type: "POST",
				data: {
					semester_id: semester_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-sub-category-dropdown").html('');
					$("#sub-sub-category-dropdown").html(result);
					// console.log(result);
				}
			});
		});
		
		// sub-sub-category dropdown start here 
		$('#sub-sub-category-dropdown').on('change', function() {
			
			var category_id = this.value;
			$.ajax({
				url: "<?= base_url('Admin/SubSubSubCategoryDrop') ?>",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-sub-category-dropdown").html(result);
					// console.log(result);
				}
			});
			
		});
		
	});
	 // State → City dropdown
    $('#state').on('change', function () {
        var state_name = $(this).val();

        if (state_name !== '') {
            $.ajax({
                url: "<?= base_url('Admin/getCitiesByState') ?>",
                type: "POST",
                data: {
                    state_name: state_name,
                    <?= $this->security->get_csrf_token_name(); ?>:
                    "<?= $this->security->get_csrf_hash(); ?>"
                },
                dataType: "json",
                success: function (response) {
                    $('#city').html('<option value="">Select City</option>');
                    $.each(response, function (i, item) {
                        $('#city').append(
                            '<option value="'+item.city_name+'">'+item.city_name+'</option>'
                        );
                    });
                },
                error: function () {
                    alert('City load error');
                }
            });
        } else {
            $('#city').html('<option value="">Select City</option>');
        }
    });

	</script>																																		
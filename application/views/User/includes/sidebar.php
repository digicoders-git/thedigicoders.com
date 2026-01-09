<?php
	if (empty($this->session->get_userdata()['user'])) {
		$user_id = '';
		redirect(base_url('Home/UserLogin'));
		} else {
		$user_id = $this->session->userdata()['user']->id;
		$userdata = $this->session->userdata()['user'];
		$training_type = $userdata->training_type;
	}
?>
<aside class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="<?= base_url('public/assets/images/Digicoders-Logo.png')?>" class="logo-icon" alt="logo icon"
			style="width: 90%; weight: 50px;">
		</div>
		<div>
			<!-- <h4 class="logo-text">Onedash</h4> -->
		</div>
		<div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="Dashboard" class="">
				<div class="parent-icon"><i class="bi bi-house-fill"></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<!--<li>
			<a href="Attandance.php">
				<div class="parent-icon"><i class="bi bi-person-check-fill"></i>
				</div>
				<div class="menu-title">My Attadance</div>
			</a>
		</li>-->
		<!-- <li>
			<a href="<?= base_url('User/Syllabus');?>">
				<div class="parent-icon"><i class="bi bi-book"></i>
				</div>
				<div class="menu-title">My Syllabus</div>
			</a>
		</li> -->
		<!-- <li>
			<a href="Managefee">
				<div class="parent-icon"><i class="bi bi-cash"></i>
				</div>
				<div class="menu-title">My Fee</div>
			</a>
		</li> -->
		<li>
			<a href="<?= base_url('User/IdCard');?>">
				<div class="parent-icon"><i class="bi bi-person-vcard-fill"></i>
				</div>
				<div class="menu-title">My ID Card</div>
			</a>
		</li>
		
		<!-- <li>
			<a href="Assignment">
				<div class="parent-icon"><i class="bi bi-card-text"></i>
				</div>
				<div class="menu-title">My Assignment</div>
			</a>
		</li> -->
		<li>
			<a href="ManageTest">
				<div class="parent-icon"><i class="bi bi-calendar4-week"></i>
				</div>
				<div class="menu-title">My Test</div>
			</a>
		</li>
		<!--<li>
			<a href="Interview.php">
				<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
				</div>
				<div class="menu-title">My Interview</div>
			</a>
		</li>-->
		<?php if ($training_type === 'Apprenticeship Training'): ?>
		<li>
			<a href="<?= base_url('User/Internship');?>">
				<div class="parent-icon"><i class="bi bi-file-text-fill"></i></div>
				<div class="menu-title">My Internship Letter</div>
			</a>
		</li>

<?php else: ?>
            <li>
			<a href="<?= base_url('User/Summer');?>">
				<div class="parent-icon"><i class="bi bi-file-text-fill"></i></div>
				<div class="menu-title">My Training Letter</div>
			</a>
		</li>
		<?php endif; ?>
		
		<!-- <li>
			<a href="<?= base_url('User/Jobalert');?>">
				<div class="parent-icon"><i class="bi bi-bell-fill"></i>
				</div>
				<div class="menu-title">Job Alert</div>
			</a>
		</li> -->
		
		
		<!--<li>
			<a href="Eventphotos.php">
			<div class="parent-icon"><i class="bi bi-image"></i>
			</div>
			<div class="menu-title">Event Photos</div>
			</a>
		</li>-->
		<!--<li>
			<a href="ClassesVideos.php">
			<div class="parent-icon"><i class="bi bi-play-btn-fill"></i>
			</div>
			<div class="menu-title">Classes Videos</div>
			</a>
		</li>-->
		<li>
			<a href="<?= base_url('User/ChangePassword');?>">
				<div class="parent-icon"><i class="bi bi-key"></i>
				</div>
				<div class="menu-title">Change Password</div>
			</a>
		</li>
		<li>
			<a href="<?= base_url('User/UpdateProfile');?>">
				<div class="parent-icon"><i class="bi bi-person-check"></i>
				</div>
				<div class="menu-title">Update Profile</div>
			</a>
		</li>
	<li>
	<a href="<?= base_url('User/Logout') ?>">
	<div class="parent-icon"><i class="bi bi-box-arrow-right"></i>
	</div>
	<div class="menu-title">Logout</div>
	</a>
	</li>
	
	</ul>
	<!--end navigation-->
	</aside>					
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?= base_url('public') ?>/assets/images/Digicoders-Logo.png" class="logo-icon" alt="logo icon" style="width: 90%; weight: 50px;">
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
            <a href="<?= base_url() ?>Admin/Dashboard" class="">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
				</div>
                <div class="menu-title">Dashboard</div>
			</a>		
		</li>
		<!-- <li>
            <a href="<?= base_url() ?>Admin/Registration" class="">
			<div class="parent-icon"><i class="fadeIn animated bx bx-message-square-edit"></i>
			</div>
			<div class="menu-title">Registrations</div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['regcount']; ?></span>
			</a>
		</li>-->
		
		
		
		<?php 
			if($this->session->userdata('admin_type')=='website')
			{
			?>
			
			<li>
				
				<a href="#" class="has-arrow" aria-expanded="false"> <div class="parent-icon"><i class="fadeIn animated bx bx-message-square-edit"></i>
				</div> <div class="menu-title">Registrations</div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['regcount']; ?></span></a>
				
				<ul>
					<li><a href="<?= base_url() ?>Admin/AddStudent"><div class="menu-title">Add Student</div></a></li>
					<li><a href="<?= base_url() ?>Admin/Registration"><div class="menu-title">New </div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['newregcount']; ?></span></a></li>
					<li><a href="<?= base_url() ?>Admin/RegistrationAccepted"><div class="menu-title">Accepted </div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['acceptregcount']; ?></span></a></li>
					
					<li><a href="<?= base_url() ?>Admin/RegistrationRejected"><div class="menu-title">Rejected </div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['rejectregcount']; ?></span></a></li>
					<li><a href="<?= base_url() ?>Admin/AllRegistrations"><div class="menu-title">All Students </div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['regcount']; ?></span></a></li>
					
				</ul>
			</li>
			<li>
				
				<a href="#" class="has-arrow" aria-expanded="false"> <div class="parent-icon"><i class="fadeIn animated bx bx-message-square-edit"></i>
				</div> <div class="menu-title">Fee Payments</div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['feecount']; ?></span></a>
				
				<ul>
					<li><a href="<?= base_url() ?>Admin/feePay"><div class="menu-title">Pay Fee</div></a></li>
					<li><a href="<?= base_url() ?>Admin/NewPayment"><div class="menu-title">New </div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['newfeecount']; ?></span></a></li>
					<li><a href="<?= base_url() ?>Admin/PaymentAccepted"><div class="menu-title">Accepted </div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['acceptfeecount']; ?></span></a></li>
					
					<li><a href="<?= base_url() ?>Admin/PaymentRejected"><div class="menu-title">Rejected </div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['rejectfeecount']; ?></span></a></li>
					
				</ul>
			</li>
			
			<li>
				<a href="<?= base_url() ?>Admin/ManageTeacher">
					<div class="parent-icon"><i class="bi bi-person-check"></i>
					</div>
					<div class="menu-title">Manage Teacher</div> &ensp;&ensp;<span class="badge bg-danger"><?= $this->data['totalteacher']; ?></span>
				</a>
			</li>
			
			<li>
				<a href="<?= base_url() ?>Admin/ManageBatch">
					<div class="parent-icon"><i class="bi bi-people-fill"></i>
					</div>
					<div class="menu-title">Manage Batch</div> &ensp;&ensp;<span class="badge bg-danger"><?= $this->data['totalbatch']; ?></span>
				</a>
				
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/ManageAttendance">
					<div class="parent-icon"><i class="bi bi-person-check"></i>
					</div>
					<div class="menu-title">Manage Attedance</div> 
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/ManageAssignment">
					<div class="parent-icon"><i class="bi bi-file-pdf"></i>
					</div>
					<div class="menu-title">Upload Assignment</div> 
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/StudentVideo">
					<div class="parent-icon"><i class="bi bi-link"></i>
					</div>
					<div class="menu-title">Std. Video Link</div> 
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/UploadPhotos">
					<div class="parent-icon"><i class="bi bi-image"></i>
					</div>
					<div class="menu-title">Std. Upload Photos</div> 
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/Blog">
					<div class="parent-icon"><i class="bi bi-image"></i>
					</div>
					<div class="menu-title">Manage Blogs</div> 
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/Manageaddpage">
					<div class="parent-icon"><i class="bi bi-page"></i>
					</div>
					<div class="menu-title">Manage Page</div> 
				</a>
			</li>
			
			<li>
				<a href="<?= base_url() ?>Admin/ManageCoupon">
					<div class="parent-icon"><i class="bi bi-coin"></i>
					</div>
					<div class="menu-title">Manage Coupon</div> &ensp;&ensp;<span class="badge bg-danger"><?= $this->data['couponcount']; ?></span>
				</a>
				
			</li>
			
			<li>
				<a href="<?= base_url() ?>Admin/ManageContact">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Contacts</div> &ensp;&ensp;<span class="badge bg-danger"><?= $this->data['contactcount']; ?></span>
				</a>
				
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageFinalYearProject">
					<div class="parent-icon"><i class="fadeIn animated bx bx-collection"></i>
					</div>
					<div class="menu-title">Project Request</div>&ensp;&ensp;<span class="badge bg-danger"><?= $this->data['fnl']; ?></span>
				</a>
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageBanner">
					<div class="parent-icon"><i class="bi bi-images"></i> 
					</div>
					<div class="menu-title">Manage Banner</div>
				</a>
			</li>
			
			<li>
				<a class="" href="<?= base_url() ?>Admin/expert">
					<div class="parent-icon"><i class="bi bi-images"></i> 
					</div>
					<div class="menu-title">Manage expert</div>
				</a>
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/Intern">
					<div class="parent-icon"><i class="bi bi-images"></i> 
					</div>
					<div class="menu-title">Manage Intern</div>
				</a>
			</li>
			
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageWebinar">
					<div class="parent-icon"><i class="lni lni-camera"></i>
					</div>
					<div class="menu-title">Manage Webinar</div>
				</a>
				
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/ManageExpertList">
					<div class="parent-icon"><i class="bi bi-person-circle"></i>
					</div>
					<div class="menu-title"> Manage Team</div>
				</a>
			</li>
			
			
			<li>
				<a href="<?= base_url() ?>Admin/ManageReview">
					<div class="parent-icon"><i class="bi bi-hand-thumbs-up-fill"></i>
					</div>
					<div class="menu-title">Manage Reviews</div>
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/ManageCertificate" class="">
					<div class="parent-icon"><i class="bi bi-patch-check"></i>
					</div>
					<div class="menu-title">Manage Certificates</div>
				</a>
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageMOU">
					<div class="parent-icon"><i class="fadeIn animated bx bx-building-house"></i>
					</div>
					<div class="menu-title">MOUs</div>
				</a>
				
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/Achievements">
					<div class=""><i class="bi bi-trophy"></i>
					</div>
					<div class="menu-title">Achievements</div>
				</a>
				
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/ManageAppreciation">
					<div class="parent-icon"><i class="bi bi-telephone-forward-fill"></i>
					</div>
					<div class="menu-title">Appreciations</div>
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/ManageAdvisory">
					<div class="parent-icon"><i class="bi bi-collection-play-fill"></i>
					</div>
					<div class="menu-title">Advisory</div>
				</a>
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageGallery">
					<div class="parent-icon"><i class="bi bi-file-earmark-image"></i>
					</div>
					<div class="menu-title">Photos Gallery</div>
				</a>
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageGallery">
					<div class="parent-icon"><i class="bi bi-file-earmark-image"></i>
					</div>
					<div class="menu-title">Farewell</div>
				</a>
			</li>
			
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageModal">
					<div class="parent-icon"><i class="bi bi-file-earmark-image"></i>
					</div>
					<div class="menu-title">Popup</div>
				</a>
			</li>
			<li>
				<a class="" href="<?= base_url() ?>Admin/placement">
					<div class="parent-icon"><i class="bi bi-file-earmark-image"></i>
					</div>
					<div class="menu-title">Placement Photos</div>
				</a>
				
			</li>
			<li>
				<a href="<?= base_url() ?>Admin/ManageVideo">
					<div class="parent-icon"><i class="lni lni-video"></i>
					</div>
					<div class="menu-title">Video Gallery</div>
				</a>
			</li>
			
			<li>
				<a href="<?= base_url() ?>Admin/ManageFAQ">
					<div class="parent-icon"><i class="bi bi-question-lg"></i>
					</div>
					<div class="menu-title">Manage FAQ</div>
				</a>
			</li>
			
			
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageNews">
					<div class="parent-icon"> <i class="bi bi-newspaper"></i>
					</div>
					<div class="menu-title">News Media</div>
				</a>
			</li>
			
			
			
			<li>
				<a class="" href="<?= base_url() ?>Admin/PlacementPartner">
					<div class="parent-icon"><i class="bi bi-building"></i>
					</div>
					<div class="menu-title">Placement Partners</div>
				</a>
				
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bi bi-gear"></i>
					</div>
					<div class="menu-title">Manage Settings</div>
				</a>
				<ul>
					<li> <a href="<?= base_url() ?>Admin/WhatsAppGroup"><i class="bi bi-circle"></i>WhatsApp Group</a>
					</li>
					<li> <a href="<?= base_url() ?>Admin/ManageSetting"><i class="bi bi-circle"></i>Manage Form Element</a>
					</li>
				</ul>
			</li>
			
			<?php  
			}
			else
			{
			?>
			<!--<li>
				<a class="" href="<?= base_url() ?>Admin/ManageEvent">
				<div class="parent-icon"> <i class="fadeIn animated bx bx-calendar-event"></i>
				</div>
				<div class="menu-title">Manage Events</div>
				</a>
			</li>-->
			
			
			<hr>
			
			<!-- Author Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageAuthor">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Manage Author</div>
				</a>
				
			</li>
			<!-- Trending News End Here -->
			
			<!-- Trending News Start Here -->
			<li>
				<a class="" href="<?= base_url() ?>Admin/TrendingNews">
					<div class="parent-icon"> <i class="bi bi-newspaper"></i>
					</div>
					<div class="menu-title">Trending News</div>
				</a>
			</li>
			<!-- Trending News End Here -->
			
			<!-- Trending News Start Here -->
			<li>
				<a class="" href="<?= base_url() ?>Admin/ManageTraining">
					<div class="parent-icon"> <i class="bi bi-newspaper"></i>
					</div>
					<div class="menu-title">Manage Training</div>
				</a>
			</li>
			<!-- Trending News End Here -->
			
			<!-- Category Subject Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageCourse">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Manage Course</div>
					<!--<div class="menu-title">Manage Subject</div>-->
				</a>
				
			</li>
			<!-- Category Subject End Here -->
			
			<!-- SubCategory Semester Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageSemester">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Manage Semester</div>
				</a>
				
			</li>
			<!-- SubCategory Semester End Here -->
			
			<!--  Paper Category Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/PaperCategory">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Paper Category</div>
				</a>
				
			</li>
			<!--  Paper Category End Here -->
			
			<!--  Paper Category Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageTechnology">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Manage Technology</div>
				</a>
				
			</li>
			<!--  Paper Category End Here -->
			
			<!--  Technology Pdf Category Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/TechnologyPdf">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Technology Pdf</div>
				</a>
				
			</li>
			<!--  Technology Pdf End Here -->
			
			
			<!--  Manage Videos Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageVideos">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Manage Videos</div>
				</a>
				
			</li>
			<!--  Manage Videos End Here -->
			
			
			<!--  Trending Videos Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/TrendingVideos">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Trending Videos</div>
				</a>
				
			</li>
			<!--  Trending Videos End Here -->
			
			<!--  Technology Videos Category Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageTechnologyCategory">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Technology Category</div>
				</a>
				
			</li>
			<!--  Technology Videos Category  End Here -->
			
			<!--  Manage Technology Videos Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageTechnologyVideo">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Technology Video</div>
				</a>
			</li> 
			<!--  Manage Technology Videos  End Here -->
			
			
			
			
			
			
			<!--  Batch Videos Category  Year Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageBatchCategory">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Batch Years & Category</div>
				</a>
				
			</li>
			<!--  Batch Videos Category year End Here -->
			
			
			
			<!--  Manage Technology Videos Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageTechnologyVideo">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Batch Video</div>
				</a>
			</li>
			<!--  Manage Technology Videos  End Here -->
			
			
			
			
			
			
			
			<!-- Job Category Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/JobCategory">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Job Category</div>
				</a>
			</li>
			<!-- Job Category End Here -->
			
			<!-- JobDetails Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/JobDetails">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Job Details</div>
				</a>
			</li>
			<!-- JobDetails  End Here -->
			
			<!-- JobDetails Add Start  Here -->
			<li>
				<a href="<?= base_url() ?>Admin/ManageNotification">
					<div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
					</div>
					<div class="menu-title">Manage Notification</div>
				</a>
			</li>
			
		<?php }  ?>
		<!-- JobDetails  End Here -->
		
		
        <li>
			<a href="javascript:void(0)" onclick="logout('<?= base_url('Admin/logout/logout') ?>')">
				<div class="parent-icon"><i class="bi bi-box-arrow-right"></i>
				</div>
				<div class="menu-title">Logout</div>
			</a>
		</li>
        <!-- <li>
			<a href="#">
			<div class="parent-icon"><i class="bi bi-box-arrow-right"></i>
			<div class="menu-title">Logout</div>
			</a>
		</li> -->
	</ul>
	<!--end navigation-->
</aside>		
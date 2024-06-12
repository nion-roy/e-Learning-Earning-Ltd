<div class="vertical-menu">

	<div data-simplebar class="h-100">

		@php
			$role = request()->segment(1);
		@endphp

		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">

				<li class="menu-title" key="t-menu">Menu</li>

				<li>
					<a href="{{ route('admin.dashboard') }}" class="waves-effect">
						<i class="bx bxs-dashboard"></i>
						<span>Dashboards</span>
					</a>
				</li>

				<li class="menu-title">Software Managment</li>

				<li>
					<a href="javascript: void(0);" class="waves-effect">
						<i class="bx bx-briefcase-alt-2"></i>
						<span>DYD</span>
					</a>
				</li>
				<hr class="my-1 border-dark">

				<li>
					<a href="javascript: void(0);" class="waves-effect">
						<i class="mdi mdi-certificate-outline"></i>
						<span>Certificate Verifications</span>
					</a>
				</li>
				<hr class="my-1 border-dark">

				<li class="menu-title">Website Managment</li>


				<!-- Header section start -->
				<li class="{{ request()->is($role . '/popups*') || request()->is($role . '/header-banners*') ? 'mm-active' : '' }}">
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="bx bx-bookmark"></i>
						<span>Header Section</span>
					</a>
					<ul class="sub-menu mm-collapse">
						<li><a class="{{ request()->is($role . '/popups*') ? 'active' : '' }}" href="{{ route('admin.popups.index') }}">Popup</a></li>
						<li><a class="{{ request()->is($role . '/header-banners*') ? 'active' : '' }}" href="{{ route('admin.header-banners.index') }}">Header Banners</a></li>
					</ul>
				</li>
				<hr class="my-1 border-dark">
				<!-- Header section end -->


				<!-- About us start -->
				<li class="">
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="bx bx-detail"></i>
						<span>About Us</span>
					</a>
					<ul class="sub-menu mm-collapse">
						<li><a href="javascript: void(0);">About Us</a></li>
						<li><a href="javascript: void(0);">Trainers List</a></li>
						<li><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
						<li>
							<a href="javascript: void(0);" class="has-arrow">Gallery</a>
							<ul class="sub-menu mm-collapse">
								<li><a href="javascript: void(0);">Category</a></li>
								<li><a href="javascript: void(0);">Image Gallery</a></li>
								<li><a href="javascript: void(0);">Video Gallery</a></li>
							</ul>
						</li>
						<li>
							<a href="javascript: void(0);" class="has-arrow">Team Member</a>
							<ul class="sub-menu mm-collapse">
								<li><a href="javascript: void(0);">Category</a></li>
								<li><a href="javascript: void(0);">Team Member</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<hr class="my-1 border-dark">
				<!-- About us end -->


				<!-- Service start -->
				<li>
					<a href="javascript: void(0);" class="waves-effect">
						<i class="bx bx-briefcase-alt-2"></i>
						<span>Services</span>
					</a>
				</li>
				<hr class="my-1 border-dark">
				<!-- Service end -->


				<li>
					<a href="javascript: void(0);" class="waves-effect">
						<i class="bx bx-briefcase-alt-2"></i>
						<span>Our Facilities</span>
					</a>
				</li>
				<hr class="my-1 border-dark">


				<li class="{{ request()->is($role . '/category/partner*') || request()->is($role . '/all-partners*') ? 'mm-active' : '' }}">
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="bx bx-bookmark"></i>
						<span>Partners</span>
					</a>
					<ul class="sub-menu mm-collapse">
						<li><a class="{{ request()->is($role . '/category/partner*') ? 'active' : '' }}" href="{{ route('admin.partner.category.index') }}">Category</a></li>
						<li><a class="{{ request()->is($role . '/all-partners*') ? 'active' : '' }}" href="{{ route('admin.all-partners.index') }}">Partners</a></li>
					</ul>
				</li>
				<hr class="my-1 border-dark">


				<li>
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="bx bx-bookmark"></i>
						<span>Career</span>
					</a>
					<ul class="sub-menu mm-collapse">
						<li><a href="javascript:void(0)">New Job Circular</a></li>
						<li><a href="javascript:void(0)">Job Placements</a></li>
						<li><a href="javascript:void(0)">Recent Job Placements</a></li>
						<li><a href="javascript:void(0)">Poly.Student Job Placement</a></li>
						<li><a href="javascript:void(0)">Certificate Verifications</a></li>
					</ul>
				</li>
				<hr class="my-1 border-dark">


				<li>
					<a href="{{ route('admin.user-softwares.index') }}" class="waves-effect">
						<i class="bx bx-customize"></i>
						<span>Software</span>
					</a>
				</li>
				<hr class="my-1 border-dark">


				<!-- Regular training start -->
				<li class="{{ request()->is($role . '/courses/categories*') ? 'mm-active' : '' }}">
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="bx bx-bookmark"></i>
						<span>Course or Training</span>
					</a>
					<ul class="sub-menu mm-collapse">
						<li><a class="{{ request()->is($role . '/courses/categories*') ? 'active' : '' }}" href="{{ route('admin.category.course.index') }}">Category</a></li>
						<li><a href="javascript:void(0)">All Courses</a></li>
						<li><a href="javascript:void(0)">Polytechnic Industrial Training</a></li>
						<li><a href="javascript:void(0)">Language Training</a></li>
					</ul>
				</li>
				<hr class="my-1 border-dark">
				<!-- Regular training end -->


				<!-- IT Traning Start -->
				<li class="{{ request()->is($role . '/categories/it-training*') || request()->is($role . '/it-training*') ? 'mm-active' : '' }}">
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="bx bx-bookmark"></i>
						<span>IT Training</span>
					</a>
					<ul class="sub-menu mm-collapse">
						<li><a class="{{ request()->is($role . '/categories/it-training*') ? 'active' : '' }}" href="{{ route('admin.category.it-training.index') }}">Category</a> </li>
						<li><a class="{{ request()->is($role . '/it-training**') ? 'active' : '' }}" href="{{ route('admin.it-trainings.index') }}">IT Traning</a> </li>
					</ul>
				</li>
				<hr class="my-1 border-dark">
				<!-- IT Traning End -->


				<li class="{{ request()->is($role . '/branches*') ? 'mm-active' : '' }}">
					<a href="{{ route('admin.branches.index') }}" class="waves-effect {{ request()->is($role . '/branches*') ? 'active' : '' }}">
						<i class="bx bxs-map-pin"></i>
						<span>Branches</span>
					</a>
				</li>
				<hr class="my-1 border-dark">


				<li>
					<a href="javascript: void(0)" class="waves-effect">
						<i class="bx bx-customize"></i>
						<span>Contact Users</span>
					</a>
				</li>
				<hr class="my-1 border-dark">


				@if (auth()->user()->can('view role') || auth()->user()->can('view user'))
					<li class="{{ request()->is($role . '/roles-permissions*') || request()->is($role . '/users*') ? 'mm-active' : '' }}">
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="bx bx-user-plus"></i>
							<span>Users</span>
						</a>
						<ul class="sub-menu mm-collapse">
							@if (auth()->user()->can('view role'))
								<li><a class="{{ request()->is($role . '/roles-permissions*') ? 'active' : '' }}" href="{{ route('admin.roles-permissions.index') }}">Roles & Permissions</a></li>
							@endif

							@if (auth()->user()->can('view user'))
								<li><a class="{{ request()->is($role . '/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">All Users</a></li>
							@endif
						</ul>
					</li>

					<hr class="my-1 border-dark">
				@endif


				<li>
					<a href="javascript: void(0);" class="has-arrow waves-effect">
						<i class="bx bx-cog"></i>
						<span>Settings</span>
					</a>
					<ul class="sub-menu mm-collapse">
						<li><a href="{{ route('admin.setting') }}">General Setting</a></li>
						<li><a href="{{ route('admin.social-setting.index') }}">Social Setting</a></li>
						<li><a href="{{ route('admin.social-setting.index') }}">Database Backup</a></li>
						<li><a href="{{ route('admin.clear.cache') }}">Cache Clear</a></li>
					</ul>
				</li>

				<hr class="my-1 border-dark">

				<li>
					<a href="{{ route('admin.logout') }}" class="waves-effect">
						<i class="bx bx-log-out"></i>
						<span>Logout</span>
					</a>
				</li>



			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>

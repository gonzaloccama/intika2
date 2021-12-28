<!-- BEGIN: Top Bar -->
<div class="top-bar">

	<!-- BEGIN: Breadcrumb -->
	<div class="-intro-x breadcrumb mr-auto hidden sm:flex">
		<a href="<?= base_url() . 'admin/dashboard' ?>"
		   class="">Dashboard
		</a>

		<i data-feather="chevron-right" class="breadcrumb__icon"></i>

		<a href="<?= base_url() . 'admin/' . $this->uri->segment(2) ?>"
		   class="<?= $this->uri->segment(3) != null ? '' : 'breadcrumb--active' ?>">
			<?= $info['page_title'] ?>
		</a>
		<i data-feather="chevron-right"
		   class="<?= $this->uri->segment(3) != null ? '' : 'hidden' ?> breadcrumb__icon"></i>

		<a href="" class="breadcrumb--active"><?= ucfirst($this->uri->segment(3)) ?></a>
	</div>
	<!-- END: Breadcrumb -->

	<!-- BEGIN: Search -->
	<div class="intro-x relative mr-3 sm:mr-6">
		<div class="search hidden sm:block">
			<input type="text" class="search__input form-control border-transparent placeholder-theme-13"
				   placeholder="Buscar...">
			<i data-feather="search" class="search__icon dark:text-gray-300"></i>
		</div>
		<a class="notification sm:hidden" href=""> <i data-feather="search"
													  class="notification__icon dark:text-gray-300"></i> </a>
		<div class="search-result">
			<div class="search-result__content">
				<div class="search-result__content__title">Pages</div>
				<div class="mb-5">
					<a href="" class="flex items-center">
						<div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"><i
									class="w-4 h-4" data-feather="inbox"></i></div>
						<div class="ml-3">Mail Settings</div>
					</a>
				</div>

			</div>
		</div>
	</div>
	<!-- END: Search -->

	<!-- BEGIN: Notifications -->
	<div class="intro-x dropdown mr-auto sm:mr-6">
		<div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
			 aria-expanded="false"><i data-feather="bell" class="notification__icon dark:text-gray-300"></i></div>
		<div class="notification-content pt-2 dropdown-menu">
			<div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
				<div class="notification-content__title">Notifications</div>
				<div class="cursor-pointer relative flex items-center ">
					<div class="w-12 h-12 flex-none image-fit mr-1">
						<img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
							 src="<?= base_url('assets/admin/dist/images/profile-13.jpg') ?>">
						<div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
					</div>
					<div class="ml-2 overflow-hidden">
						<div class="flex items-center">
							<a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
							<div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
						</div>
						<div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader
							will be distracted by the readable content of a page when looking at its layout. The point
							of using Lorem
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Notifications -->
	<!-- BEGIN: Account Menu -->
	<div class="intro-x dropdown w-8 h-8">
		<div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
			 aria-expanded="false">
			<img alt="Midone Tailwind HTML Admin Template"
				 src="<?= base_url('assets/admin/dist/images/profile-6.jpg') ?>">
		</div>
		<div class="dropdown-menu w-56">
			<div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
				<div class="p-4 border-b border-theme-27 dark:border-dark-3">
					<div class="font-medium"><?= $this->session->userdata('name') ?></div>
					<div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">
						<?= $this->session->userdata('role_id') == 1 ? 'ADMIN' : ''; ?>
					</div>
				</div>
				<div class="p-2">
					<a href=""
					   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
						<i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
					<a href=""
					   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
						<i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
					<a href=""
					   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
						<i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
					<a href=""
					   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
						<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
				</div>
				<div class="p-2 border-t border-theme-27 dark:border-dark-3">
					<a href="<?= base_url() . 'auth/login/logout' ?>"
					   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
						<i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->





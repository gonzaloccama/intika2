<!-- BEGIN: Content -->
<div class="content">
	<!-- BEGIN: Top Bar -->
	<?php $this->load->view('admin/top_bar'); ?>


	<!-- END: Top Bar -->
	<h2 class="intro-y text-lg font-medium mt-10">
		DASHBOARD
	</h2>

	<div class="grid grid-cols-12 gap-6 mt-5">
		<?php
		if (0):
		?>
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<button class="btn btn-primary shadow-md mr-2">Nuevo slider</button>
			<div class="dropdown">
				<button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
						<span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
																				   data-feather="plus"></i> </span>
				</button>
				<div class="dropdown-menu w-40">
					<div class="dropdown-menu__content box dark:bg-dark-1 p-2">
						<a href=""
						   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
							<i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
						<a href=""
						   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
							<i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
						<a href=""
						   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
							<i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
					</div>
				</div>
			</div>
			<div class="hidden md:block mx-auto text-gray-600">Mostrando 1 a 10 de 150 entradas</div>
			<div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
				<div class="w-56 relative text-gray-700 dark:text-gray-300">
					<input type="text" class="form-control w-56 box pr-10 placeholder-theme-13"
						   placeholder="Search...">
					<i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
				</div>
			</div>
		</div>
		<!-- BEGIN: Data List -->
		<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
			<table class="table table-report -mt-2">
				<thead>
				<tr>
					<th class="whitespace-nowrap">IMAGES</th>
					<th class="whitespace-nowrap">PRODUCT NAME</th>
					<th class="text-center whitespace-nowrap">STOCK</th>
					<th class="text-center whitespace-nowrap">STATUS</th>
					<th class="text-center whitespace-nowrap">ACTIONS</th>
				</tr>
				</thead>
				<tbody>
				<tr class="intro-x">
					<td class="w-40">
						<div class="flex">
							<div class="w-10 h-10 image-fit zoom-in">
								<img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full"
									 src="<?= base_url() ?>assets/admin/dist/images/preview-4.jpg"
									 title="Uploaded at 24 October 2022">
							</div>
							<div class="w-10 h-10 image-fit zoom-in -ml-5">
								<img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full"
									 src="<?= base_url() ?>assets/admin/dist/images/preview-10.jpg"
									 title="Uploaded at 24 October 2022">
							</div>
							<div class="w-10 h-10 image-fit zoom-in -ml-5">
								<img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full"
									 src="<?= base_url() ?>assets/admin/dist/images/preview-14.jpg"
									 title="Uploaded at 24 October 2022">
							</div>
						</div>
					</td>
					<td>
						<a href="" class="font-medium whitespace-nowrap">Sony A7 III</a>
						<div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">Photography</div>
					</td>
					<td class="text-center">87</td>
					<td class="w-40">
						<div class="flex items-center justify-center text-theme-9"><i data-feather="check-square"
																					  class="w-4 h-4 mr-2"></i>
							Active
						</div>
					</td>
					<td class="table-report__action w-56">
						<div class="flex justify-center items-center">
							<a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square"
																					  class="w-4 h-4 mr-1"></i> Edit
							</a>
							<a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
							   data-target="#delete-confirmation-modal"> <i data-feather="trash-2"
																			class="w-4 h-4 mr-1"></i> Delete </a>
						</div>
					</td>
				</tr>

				</tbody>
			</table>
		</div>
		<!-- END: Data List -->
		<!-- BEGIN: Pagination -->
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
			<ul class="pagination">
				<li>
					<a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
				</li>
				<li>
					<a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
				</li>
				<li><a class="pagination__link" href="">...</a></li>
				<li><a class="pagination__link" href="">1</a></li>
				<li><a class="pagination__link pagination__link--active" href="">2</a></li>
				<li><a class="pagination__link" href="">3</a></li>
				<li><a class="pagination__link" href="">...</a></li>
				<li>
					<a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
				</li>
				<li>
					<a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
				</li>
			</ul>
			<select class="w-20 form-select box mt-3 sm:mt-0">
				<option>10</option>
				<option>25</option>
				<option>35</option>
				<option>50</option>
			</select>
		</div>
		<!-- END: Pagination -->
		<?php
		endif;
		?>
	</div>


	<!-- END: Delete Confirmation Modal -->
</div>
<!-- END: Content -->

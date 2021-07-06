<?php
require_once('components/Widget.php');
require_once('components/Helper.php');

$histories = isset($params['histories']) ? $params['histories'] : null;

$title = 'Tableau de bord'; ?>

	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

		<?= Widget::add('subheader', $title, $user) ?>

		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Dashboard-->
				<!--begin::Row-->
				<div class="row">
				</div>
				<!--end::Row-->
				<!--end::Dashboard-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
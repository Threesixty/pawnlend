<?php
require_once('components/Widget.php');
require_once('components/Helper.php');

$lends = isset($params['lends']) ? $params['lends'] : null;

$title = 'Liste des prêts'; ?>

	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

		<?= Widget::add('subheader', $title, $user) ?>

		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Card-->
				<div class="card card-custom">
					<div class="card-header flex-wrap py-5">
						<div class="card-title">
							<?= $title ?>
						</div>
						<div class="card-toolbar">
							<!--begin::Button-->
							<a href="<?= Helper::getUrl('pret') ?>" class="btn btn-primary font-weight-bolder">
								<i class="la la-plus"></i> Nouveau prêt
							</a>
							<!--end::Button-->
						</div>
					</div>
					<div class="card-body">

						<span id="kt_quick_panel_toggle" class="d-none"></span>
						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable table-responsive" id="kt_datatable_lend">
							<thead>
								<tr>
									<th>ID</th>
									<th>Reference</th>
									<th>Loueur</th>
									<th>Date du prêt</th>
									<th>Date de restitution</th>
									<th>Prescripteur</th>
									<th>Statut</th>
									<th>Date de création</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if (null !== $lends) {
									foreach ($lends as $key => $lend) {
										$lend = (object) $lend;

										$lendColor = 'primary'; ?>

										<tr class="<?= $lend->status == 0 ? 'bg-dark-o-20' : '' ?>">
											<td class="m-3">#<?= $lend->id ?></td>
											<td class="product-name"><a href="<?= Helper::getUrl('pret', ['id' => $lend->id]) ?>" class="font-weight-bolder"><?= $lend->reference ?></a></td>
											<td><?= $lend->client_id ?></td>
											<td><?= $lend->startdate ?></td>
											<td><?= $lend->enddate ?></td>
											<td><?= $lend->user_id ?></td>
											<td><span class="label label-lg font-weight-bold label-light-<?= $lend->status == 1 ? 'success' : 'danger' ?> label-inline"><?= $lend->status == 1 ? 'Actif' : 'Désactivé' ?></span></td>
											<td data-order="<?= $lend->created_at ?>"><?= strftime('%e %B %Y', $lend->created_at) ?></td>
											<td nowrap="nowrap">
												<div class="dropdown dropdown-inline" data-toggle="tooltip" data-theme="dark" data-placement="left" title="Actions sur le stock">
													<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
						                                <i class="fas fa-shipping-fast"></i>
						                            </a>
												  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
														<ul class="nav nav-hoverable flex-column history-parent" data-id="<?= $lend->id ?>" data-url="<?= Helper::getUrl('historiqueProduit') ?>">

															<?php
															if ($user['role'] == 1 || $user['role'] == 3) { ?>
													    		<li class="nav-item">
													    			<a class="nav-link text-hover-primary update-modal-inc" href="javascript:void(0)" data-toggle="modal" data-target="#modalIncStock">
													    				<i class="nav-icon fas fa-plus"></i>
													    				<span>Approvisionner</span>
													    			</a>
													    		</li>
													    	<?php }

															if ($user['role'] == 2 || $user['role'] == 3) { ?>
													    		<li class="nav-item">
													    			<a class="nav-link text-hover-warning update-modal-dec" href="javascript:void(0)" data-toggle="modal" data-target="#modalDecStock">
													    				<i class="nav-icon fas fa-share"></i>
													    				<span>Expédier</span>
													    			</a>
													    		</li>
													    	<?php } ?>
												    		<li>
												    			<hr style="margin: 0; border-color: #eee;">
												    		</li>
												    		<li class="nav-item">
												    			<a class="nav-link text-hover-dark kt_quick_panel_toggle" href="javascript:void(0)">
												    				<i class="nav-icon fas la-list"></i>
												    				<span class="text-hover-dark">Historique</span>
												    			</a>
												    		</li>
														</ul>
												  	</div>
												</div>
												<a href="<?= Helper::getUrl('pret', ['id' => $lend->id]) ?>" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" data-theme="dark" title="Éditer">
													<i class="icon-xl la la-edit"></i>
												</a>
												<a href="<?= Helper::getUrl('prets', ['del' => $lend->id]) ?>" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" data-theme="dark" data-placement="right" title="Supprimer">
													<i class="icon-xl la la-trash"></i>
												</a>
											</td>
										</tr>

									<?php }
								} ?>
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
<?php
require_once('components/Widget.php');
require_once('components/Helper.php');

$productLots = isset($params['products']) ? $params['products'] : null;

$title = 'Liste des lots de produits'; ?>

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
							<a href="<?= Helper::getUrl('lot-produits') ?>" class="btn btn-primary font-weight-bolder">
								<i class="la la-plus"></i> Nouveau lot de produits
							</a>
							<!--end::Button-->
						</div>
					</div>
					<div class="card-body">

						<span id="kt_quick_panel_toggle" class="d-none"></span>
						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable table-responsive" id="kt_datatable_lots">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nom du lot</th>
									<th>Référence</th>
									<th>Produits</th>
									<th>Statut</th>
									<th>Date de création</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if (null !== $productLots) {
									foreach ($productLots as $key => $productLot) {
										$productLot = (object) $productLot; ?>

										<tr class="<?= $productLot->status == 0 ? 'bg-dark-o-20' : '' ?>">
											<td class="m-3">#<?= $productLot->id ?></td>
											<td class="product-name"><a href="<?= Helper::getUrl('lot-produits', ['id' => $productLot->id]) ?>" class="font-weight-bolder"><?= $productLot->name ?></a></td>
											<td class="barcode" style="white-space: nowrap;">
												<?= $productLot->reference ?>
											</td>
											<td><?= $category->name ?></td>
											<td>Liste des produits</td>
											<td><span class="label label-lg font-weight-bold label-light-<?= $productLot->status == 1 ? 'success' : 'danger' ?> label-inline"><?= $productLot->status == 1 ? 'Actif' : 'Désactivé' ?></span></td>
											<td data-order="<?= $productLot->created_at ?>"><?= strftime('%e %B %Y', $productLot->created_at) ?></td>
											<td nowrap="nowrap">
												<a href="<?= Helper::getUrl('produit', ['id' => $productLot->id]) ?>" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" data-theme="dark" title="Éditer">
													<i class="icon-xl la la-edit"></i>
												</a>
												<a href="<?= Helper::getUrl('produits', ['del' => $productLot->id]) ?>" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" data-theme="dark" data-placement="right" title="Supprimer">
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
<?php
require_once('components/Widget.php');
require_once('components/Helper.php');

$currentLend = isset($params['currentLend']) ? $params['currentLend'] : null;
$currentLendProducts = isset($params['currentLendProducts']) ? $params['currentLendProducts'] : null;

$clients = isset($params['clients']) ? $params['clients'] : null;
$products = isset($params['products']) ? $params['products'] : null;
$productLots = isset($params['productLots']) ? $params['productLots'] : null;

$title = 'Ajouter un prêt'; ?>

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
					</div>
					<div class="card-body p-0">
						<div class="wizard wizard-1" id="kt_lends_add" data-wizard-state="step-first" data-wizard-clickable="true">
							<!--begin::Wizard Nav-->
							<div class="wizard-nav border-bottom">
								<div class="wizard-steps p-8 p-lg-10">
									<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
										<div class="wizard-label">
											<span class="svg-icon svg-icon-4x wizard-icon">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
														<path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<h3 class="wizard-title"><span class="label label-lg mr-2">1</span>Identification</h3>
										</div>
										<span class="svg-icon svg-icon-xl wizard-arrow">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<div class="wizard-step" data-wizard-type="step">
										<div class="wizard-label">
											<span class="svg-icon svg-icon-4x wizard-icon">
												<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Clock.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
												        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
												    </g>
												</svg><!--end::Svg Icon-->

												<!--end::Svg Icon-->
											</span>
											<h3 class="wizard-title"><span class="label label-lg mr-2">2</span>Durée du prêt</h3>
										</div>
										<span class="svg-icon svg-icon-xl wizard-arrow">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<div class="wizard-step" data-wizard-type="step">
										<div class="wizard-label">
											<span class="svg-icon svg-icon-4x wizard-icon">
												<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Box3.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3"/>
												        <polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912"/>
												    </g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<h3 class="wizard-title"><span class="label label-lg mr-2">3</span>Produits</h3>
										</div>
										<span class="svg-icon svg-icon-xl wizard-arrow">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<div class="wizard-step" data-wizard-type="step">
										<div class="wizard-label">
											<span class="svg-icon svg-icon-4x wizard-icon">
												<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-list.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
												        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
												        <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
												        <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
												        <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
												        <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
												        <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
												        <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
												    </g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<h3 class="wizard-title"><span class="label label-lg mr-2">4</span>Résumé</h3>
										</div>
										<span class="svg-icon svg-icon-xl wizard-arrow last">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
													<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
								</div>
							</div>
							<!--end::Wizard Nav-->
							<!--begin::Wizard Body-->
							<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
								<div class="col-xl-12 col-xxl-7">
									<!--begin::Form Wizard-->
									<form class="form" id="kt_lends_add_form" method="post" enctype="multipart/form-data">
										<?php
										if (isset($_GET['id'])) { ?>
											<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
										<?php } ?>
										<input type="hidden" name="status" value="<?= isset($currentLend['status']) ? $currentLend['status'] : 0 ?>">

										<!--begin::Step 1-->
										<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
											<h3 class="mb-10 font-weight-bold text-dark text-uppercase">Identification :</h3>
											<div class="row">
												<div class="col-xl-12">
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Référence <sup class="text-danger">*</sup></label>
														<div class="col-lg-9 col-xl-9">
															<input class="form-control form-control-lg" name="reference" type="text" value="<?= isset($currentLend['reference']) ? $currentLend['reference'] : '' ?>" />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Loueur <sup class="text-danger">*</sup></label>
														<div class="col-lg-9 col-xl-9">
															<select class="form-control form-control-lg" id="kt_select2_1" name="client_id">
																<option value=""></option>
																<?php
																foreach ($clients as $key => $user) { ?>
																	<option value="<?= $user['id'] ?>" <?= isset($currentLend['client_id']) && $currentLend['client_id'] == $user['id'] ? 'selected' : '' ?>><?= ucwords($user['firstname']).' '.mb_strtoupper($user['lastname']) ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end::Step 1-->
										<!--begin::Step 2-->
										<div class="pb-5" data-wizard-type="step-content">
											<div class="row">
												<div class="col-xl-12">
													<div class="form-group row">
														<div class="col-lg-9 col-xl-9">
															<h3 class="mb-10 font-weight-bold text-dark text-uppercase">Durée du prêt</h3>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Dates de début et fin <sup class="text-danger">*</sup></label>
														<div class="col-lg-9">
															<div class="input-daterange input-group" id="kt_datepicker_5">
																<input class="form-control form-control-lg" name="startdate" type="text" value="<?= isset($currentLend['startdate']) ? $currentLend['startdate'] : date('d/m/Y') ?>" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-ellipsis-h"></i>
																	</span>
																</div>
																<input class="form-control form-control-lg" name="enddate" type="text" value="<?= isset($currentLend['enddate']) ? $currentLend['enddate'] : '' ?>" placeholder="Date de restitution programmée" />
															</div>
															<span class="form-text text-muted">Sélectionnez une date de prêt et une date de restitution</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end::Step 2-->
										<!--begin::Step 3-->
										<div class="pb-5" data-wizard-type="step-content">
											<div class="row">
												<div class="col-xl-12">
													<div class="form-group row">
														<div class="col-lg-9 col-xl-6">
															<h3 class="mb-10 font-weight-bold text-dark text-uppercase">Produits</h3>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Liste des produits et lots <sup class="text-danger">*</sup></label>
														<div class="col-lg-9 col-xl-9">
															<select id="kt_dual_listbox_2" name="products" class="dual-listbox" multiple="multiple">
																<?php
																foreach ($products as $product) {
																	$selected = null !== $currentLendProducts && array_search($product->id, array_column($currentLendProducts, 'product_id')) ? 'selected' : ''; ?>
																	<option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
																<?php }

																foreach ($productLots as $productLot) {
																	$selected = null !== $currentLendProducts && array_search($productLot->id, array_column($currentLendProducts, 'product_lot_id')) ? 'selected' : ''; ?>
																	<option value="<?= $productLot['id'] ?>">LOT - <?= $productLot['name'] ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-9 col-xl-6">
															<h3 class="mt-10 mb-10 font-weight-bold text-dark text-uppercase">Statut du prêt</h3>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label"><?= isset($currentLend['status']) ? 'Statut du prêt' : 'Démarrer le prêt maintenant' ?></label>
														<div class="col-lg-9 col-xl-9">
															<span class="switch switch-lg switch-icon">
																<label>
																	<input type="hidden" name="status" value="0" />
																	<input type="checkbox" name="status" value="1" <?= isset($currentLend['status']) && $currentLend['status'] == '1' ? 'checked' : '' ?>>
																	<span></span>
																</label>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end::Step 3-->
										<!--begin::Step 4-->
										<div class="pb-5" data-wizard-type="step-content">
											<h4 class="mb-10 font-weight-bold text-center">Vérification des données saisies</h4>
											<h6 class="font-weight-bold text-uppercase mb-3">Désignation :</h6>
											<table class="w-100">
												<tr>
													<td class="font-weight-bold text-muted">Nom du produit :</td>
													<td class="font-weight-bold text-right product-name"></td>
												</tr>
												<tr>
													<td class="font-weight-bold text-muted">Description :</td>
													<td class="font-weight-bold text-right product-description"></td>
												</tr>
												<tr>
													<td class="font-weight-bold text-muted">Photo produit :</td>
													<td class="font-weight-bold text-right product-photo">
														<span></span>
													</td>
												</tr>
											</table>
											<div class="separator separator-dashed my-5"></div>
											<h6 class="font-weight-bold text-uppercase mb-3">Identification :</h6>
											<table class="w-100">
												<tr>
													<td class="font-weight-bold text-muted">Catégorie :</td>
													<td class="font-weight-bold text-right product-category"></td>
												</tr>
												<tr>
													<td class="font-weight-bold text-muted">Référence :</td>
													<td class="font-weight-bold text-right product-reference"></td>
												</tr>
											</table>
											<div class="separator separator-dashed my-5"></div>
											<h6 class="font-weight-bold text-uppercase mb-3">Stock :</h6>
											<table class="w-100">
												<tr>
													<td class="font-weight-bold text-muted">Stock actuel :</td>
													<td class="font-weight-bold text-right product-stock"></td>
												</tr>
												<tr>
													<td class="font-weight-bold text-muted">Alerte stock mini :</td>
													<td class="font-weight-bold text-right product-stock-mini"></td>
												</tr>
											</table>
											<h6 class="font-weight-bold text-uppercase my-3">Statut du produit :</h6>
											<table class="w-100">
												<tr>
													<td class="font-weight-bold text-muted">Activé :</td>
													<td class="font-weight-bold text-right product-status"></td>
												</tr>
											</table>
										</div>
										<!--end::Step 4-->
										<!--begin::Actions-->

										<div class="d-flex justify-content-between border-top mt-5 pt-10">
											<div class="mr-2">
												<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Précédent</button>
											</div>
											<div>
												<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Valider</button>
												<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Suivant</button>
												<span class="d-block mt-2"><sup class="text-danger">*</sup> <small>Champs requis</small></span>
											</div>
										</div>
										<!--end::Actions-->
									</form>
									<!--end::Form Wizard-->
								</div>
							</div>
							<!--end::Wizard Body-->
						</div>
					</div>
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
				
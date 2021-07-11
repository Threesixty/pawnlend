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
					<div class="col-xl-12">
						<!--begin::Nav Panel Widget 1-->
						<div class="card card-custom gutter-b">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Nav Tabs-->
								<ul class="dashboard-tabs nav nav-pills nav-primary row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
									<!--begin::Item-->
									<li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0 nav-danger">
										<a class="nav-link active border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_5 ">
											<span class="nav-icon py-2 w-auto display3 p-10 font-weight-bolder">3</span>
											<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Prêts en retard</span>
										</a>
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
										<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_1">
											<span class="nav-icon py-2 w-auto display3 p-10 font-weight-bolder">22</span>
											<span class="nav-text font-size-lg py-2 font-weight-bold text-center">Prêts en cours</span>
										</a>
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
										<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_2">
											<span class="nav-icon py-2 w-auto display3 p-10 font-weight-bolder">9</span>
											<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Commandes en cours</span>
										</a>
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
										<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_3">
											<span class="nav-icon py-2 w-auto display3 p-10 font-weight-bolder">278</span>
											<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Produits en stock</span>
										</a>
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
										<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_4">
											<span class="nav-icon py-2 w-auto display3 p-10 font-weight-bolder">19</span>
											<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Lots de produits</span>
										</a>
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0">
										<a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#tab_forms_widget_5">
											<span class="nav-icon py-2 w-auto display3 p-10 font-weight-bolder">22</span>
											<span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Utilisateurs actifs</span>
										</a>
									</li>
									<!--end::Item-->
								</ul>
								<!--end::Nav Tabs-->
								<!--begin::Nav Content-->
								<div class="tab-content m-0 p-0">
									<div class="tab-pane active" id="forms_widget_tab_1" role="tabpanel"></div>
									<div class="tab-pane" id="forms_widget_tab_2" role="tabpanel"></div>
									<div class="tab-pane" id="forms_widget_tab_3" role="tabpanel"></div>
									<div class="tab-pane" id="forms_widget_tab_4" role="tabpanel"></div>
									<div class="tab-pane" id="forms_widget_tab_6" role="tabpanel"></div>
								</div>
								<!--end::Nav Content-->
							</div>
							<!--end::Body-->
						</div>
						<!--begin::Nav Panel Widget 1-->
					</div>
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row">
					<div class="col-xl-4">
						<!--begin::Nav Panel Widget 2-->
						<div class="card card-custom card-stretch gutter-b">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Wrapper-->
								<div class="d-flex justify-content-between flex-column pt-4 h-100">
									<!--begin::Container-->
									<div class="pb-5">
										<!--begin::Header-->
										<div class="d-flex flex-column flex-center">
											<!--begin::Symbol-->
											<div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
												<span class="symbol-label">
													<img src="assets/media/svg/avatars/007-boy-2.svg" class="h-75 align-self-end" alt="" />
												</span>
											</div>
											<!--end::Symbol-->
											<!--begin::Username-->
											<a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1"><?= $user['firstname'].' '.$user['lastname'] ?></a>
											<!--end::Username-->
											<!--begin::Info-->
											<div class="d-block text-uppercase pb-2 text-info pb-6"><?= Helper::getRoleName($user['role']) ?></div>
											<!--end::Info-->
										</div>
										<!--end::Header-->
									</div>
									<!--eng::Container-->
									<!--begin::Footer-->
									<div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_1" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
										<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Obtenir de l'aide</button>
									</div>
									<!--end::Footer-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Nav Panel Widget 2-->
					</div>
					<div class="col-xl-8">
						<!--begin::Engage Widget 9-->
						<div class="card card-custom card-stretch gutter-b">
							<div class="card-body d-flex p-0">
								<div class="flex-grow-1 p-20 pb-40 card-rounded flex-grow-1 bgi-no-repeat" style="background-color: #1B283F; background-position: calc(100% + 0.5rem) bottom; background-size: 50% auto; background-image: url(assets/media/svg/humans/custom-10.svg)">
									<h2 class="text-white pb-5 font-weight-bolder">Pawlend</h2>
									<p class="text-muted mb-3 font-size-h5">Pawnlend est un applicatif de gestion de prêts de matériel.
										<br>Il permet de gérer des produits, des commandes, des utilisateurs <br>et des prêts.
										<br><br>Il existe 4 profils utilsateurs :<br>
									</p>
									<ul class="mb-5">
										<li class="text-info text-uppercase">Admin</li>
										<li class="text-danger text-uppercase">Locataire</li>
										<li class="text-success text-uppercase">Magasinier</li>
										<li class="text-warning text-uppercase">Prescripteur</li>
									</ul>
									<a href="<?= Helper::getUrl('prets') ?>" class="btn btn-primary font-weight-bold py-2 px-6">Découvrir les fonctionnalités</a>
								</div>
							</div>
						</div>
						<!--end::Engage Widget 9-->
					</div>
				</div>
				<!--end::Row-->
				<!--end::Dashboard-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
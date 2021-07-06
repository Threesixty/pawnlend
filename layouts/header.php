<?php
require_once('components/Helper.php'); ?>

<!DOCTYPE html>
<html lang="fr">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<title>Pawnlend</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap"> 
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:wght@300;400;500;600;700" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />

		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-minimize-hoverable page-loading">

		<?php
		if (!empty($params['notifications'])) { ?>
			<span class="notification" data-status="<?= $params['notifications']['status'] ?>" data-msg="<?= $params['notifications']['msg'] ?>"></span>
		<?php } 
		if (!empty($params['notifications2'])) { ?>
			<span class="notification" data-status="<?= $params['notifications2']['status'] ?>" data-msg="<?= $params['notifications2']['msg'] ?>"></span>
		<?php } ?>
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="<?= Helper::getUrl('index') ?>">
				<span class="logo">
					<img alt="Logo" src="assets/media/logos/logo-dark.png">
				</span>
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_quick_user_toggle_trigger">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<div class="header-logo">
									<a href="index.html">
										<img alt="Logo" src="assets/media/logos/logo-dark.png">
									</a>
								</div>
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->
									<ul class="menu-nav">
										<li class="menu-item <?= $route == 'index' ? 'menu-item-active' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
											<a href="<?= Helper::getUrl('index') ?>" class="menu-link">
												<span class="menu-text">Tableau de bord</span>
												<i class="menu-arrow"></i>
											</a>
										</li>
										<?php
										if ($user['role'] != 2) { ?>

											<li class="menu-item menu-item-submenu position-relative <?= strpos($route, 'pret') !== false ? 'menu-item-open menu-item-here' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Gestion des prêts</span>
													<i class="menu-arrow"></i>
												</a>

												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
														<li class="menu-item <?= $route == 'prets' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('prets') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Liste des prêts</span>
															</a>
														</li>
														<li class="menu-item <?= $route == 'pret' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('pret') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Ajouter un prêt</span>
															</a>
														</li>
													</ul>
												</div>
											</li>

										<?php }

										if ($user['role'] > 1) { ?>

											<li class="menu-item menu-item-submenu position-relative <?= strpos($route, 'produit') !== false ? 'menu-item-open menu-item-here' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Gestion du stock</span>
													<i class="menu-arrow"></i>
												</a>

												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
														<li class="menu-item <?= $route == 'produits' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('produits') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Liste des produits</span>
															</a>
														</li>
														<li class="menu-item <?= $route == 'produit' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('produit') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Ajouter un produit</span>
															</a>
														</li>
													</ul>
												</div>
											</li>

										<?php }

										if ($user['role'] > 1) { ?>

											<li class="menu-item menu-item-submenu position-relative <?= strpos($route, 'commande') !== false ? 'menu-item-open menu-item-here' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Gestion des commandes</span>
													<i class="menu-arrow"></i>
												</a>

												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
														<li class="menu-item <?= $route == 'commandes' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('commandes') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Liste des commandes</span>
															</a>
														</li>
														<li class="menu-item <?= $route == 'commande' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('commande') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Ajouter une commande</span>
															</a>
														</li>
													</ul>
												</div>
											</li>

										<?php }
										
										if ($user['role'] == 3) { ?>

											<li class="menu-item menu-item-submenu position-relative <?= strpos($route, 'utilisateur') !== false ? 'menu-item-open menu-item-here' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Gestion des utilisateurs</span>
													<i class="menu-arrow"></i>
												</a>

												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
														<li class="menu-item <?= $route == 'utilisateurs' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('utilisateurs') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Liste des utilisateurs</span>
															</a>
														</li>
														<li class="menu-item <?= $route == 'utilisateur' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('utilisateur') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Ajouter un utilisateur</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu position-relative <?= strpos($route, 'categorie') !== false ? 'menu-item-open menu-item-here' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Famille de produit</span>
													<i class="menu-arrow"></i>
												</a>

												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
														<li class="menu-item <?= $route == 'categories' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('categories') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Familles de produits</span>
															</a>
														</li>
														<li class="menu-item <?= $route == 'categorie' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('categorie') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		    <rect x="0" y="0" width="24" height="24"/>
																		    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
																		    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
																		</g>
																	</svg>
																</span>
																<span class="menu-text">Ajouter une famille</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
										<?php } ?>
									</ul>
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
						</div>
					</div>


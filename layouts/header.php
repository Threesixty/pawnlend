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
	<body id="kt_body" class="header-fixed header-mobile-fixed header-mobile-primary subheader-enabled subheader-fixed aside-minimize-hoverable page-loading">

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
					<img alt="Logo" src="assets/media/logos/logo-light.png">
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

				<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto aside-primary" id="kt_aside">
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item <?= $route == 'index' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
									<a href="<?= Helper::getUrl('index') ?>" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-text">Tableau de bord</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Gestion</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>

								<?php
								if ($user['role'] != 2) { ?>

									<li class="menu-item menu-item-submenu <?= strpos($route, 'pret') !== false ? 'menu-item-open menu-item-here' : '' ?>" aria-haspopup="true" data-menu-toggle="hover">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon -->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z" fill="#000000"/>
												        <path d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z" fill="#000000" opacity="0.3"/>
												    </g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Prêts</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu">
											<i class="menu-arrow"></i>
											<ul class="menu-subnav">
												<li class="menu-item <?= $route == 'prets' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('prets') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Liste des prêts</span>
													</a>
												</li>
												<li class="menu-item <?= $route == 'pret' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('pret') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Ajouter un prêt</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

								<?php }

								if ($user['role'] > 1) { ?>

									<li class="menu-item menu-item-submenu <?= strpos($route, 'produit') !== false ? 'menu-item-open menu-item-here' : '' ?>" aria-haspopup="true" data-menu-toggle="hover">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon -->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													    <rect x="0" y="0" width="24" height="24"/>
													    <path d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z" fill="#000000"/>
													    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4" rx="1"/>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Stock</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu">
											<i class="menu-arrow"></i>
											<ul class="menu-subnav">
												<li class="menu-item <?= $route == 'produits' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('produits') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Produits</span>
													</a>
												</li>
												<li class="menu-item <?= $route == 'lots-produits' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('lots-produits') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Lots de produits</span>
													</a>
												</li>
												<li class="menu-item <?= $route == 'produit' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('produit') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Ajouter un produit</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

								<?php }

								if ($user['role'] > 1) { ?>

									<li class="menu-item menu-item-submenu <?= strpos($route, 'commande') !== false ? 'menu-item-open menu-item-here' : '' ?>" aria-haspopup="true" data-menu-toggle="hover">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon -->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M22,17 L22,21 C22,22.1045695 21.1045695,23 20,23 L4,23 C2.8954305,23 2,22.1045695 2,21 L2,17 L6.27924078,17 L6.82339262,18.6324555 C7.09562072,19.4491398 7.8598984,20 8.72075922,20 L15.381966,20 C16.1395101,20 16.8320364,19.5719952 17.1708204,18.8944272 L18.118034,17 L22,17 Z" fill="#000000"/>
												        <path d="M2.5625,15 L5.92654389,9.01947752 C6.2807805,8.38972356 6.94714834,8 7.66969497,8 L16.330305,8 C17.0528517,8 17.7192195,8.38972356 18.0734561,9.01947752 L21.4375,15 L18.118034,15 C17.3604899,15 16.6679636,15.4280048 16.3291796,16.1055728 L15.381966,18 L8.72075922,18 L8.17660738,16.3675445 C7.90437928,15.5508602 7.1401016,15 6.27924078,15 L2.5625,15 Z" fill="#000000" opacity="0.3"/>
												        <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>
												    </g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Commandes</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu">
											<i class="menu-arrow"></i>
											<ul class="menu-subnav">
												<li class="menu-item <?= $route == 'commandes' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('commandes') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Liste des commandes</span>
													</a>
												</li>
												<li class="menu-item <?= $route == 'commande' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('commande') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Ajouter une commande</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

								<?php }

								if ($user['role'] == 3) { ?>
									<li class="menu-item menu-item-submenu <?= strpos($route, 'utilisateur') !== false ? 'menu-item-open menu-item-here' : '' ?>" aria-haspopup="true" data-menu-toggle="hover">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="svg-icon menu-icon">
												<!--begin::Svg Icon-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <polygon points="0 0 24 0 24 24 0 24"/>
												        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
												        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
												    </g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-text">Utilisateurs</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu">
											<i class="menu-arrow"></i>
											<ul class="menu-subnav">
												<li class="menu-item <?= $route == 'utilisateurs' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('utilisateurs') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Liste des utilisateurs</span>
													</a>
												</li>
												<li class="menu-item <?= $route == 'utilisateur' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('utilisateur') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Ajouter un utilisateur</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="menu-item menu-item-submenu <?= strpos($route, 'categorie') !== false ? 'menu-item-open menu-item-here' : '' ?>" aria-haspopup="true" data-menu-toggle="hover">
										<a href="javascript:;" class="menu-link menu-toggle">
											<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
											</svg><!--end::Svg Icon--></span>
											<span class="menu-text">Familles de produit</span>
											<i class="menu-arrow"></i>
										</a>
										<div class="menu-submenu">
											<i class="menu-arrow"></i>
											<ul class="menu-subnav">
												<li class="menu-item <?= $route == 'categories' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('categories') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Liste des familles</span>
													</a>
												</li>
												<li class="menu-item <?= $route == 'categorie' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
													<a href="<?= Helper::getUrl('categorie') ?>" class="menu-link">
														<i class="menu-bullet menu-bullet-dot">
															<span></span>
														</i>
														<span class="menu-text">Ajouter une famille</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
								<?php } ?>
								
								<!--li class="menu-item <?= strpos($route, 'parametres') !== false ? 'menu-item-open menu-item-here' : '' ?>">
									<a href="javascript:;" class="menu-link">
										<span class="svg-icon menu-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <rect x="0" y="0" width="24" height="24"/>
											        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
											        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
											    </g>
											</svg>
										</span>
										<span class="menu-text">Paramètres</span>
									</a>
								</li-->
							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed header-primary">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<div class="header-logo">
									<a href="<?= Helper::getUrl('index') ?>">
										<img alt="Logo" src="assets/media/logos/logo-light.png">
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
													<span class="menu-text">Prêts</span>
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
																	        <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="#000000"/>
																	        <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="#000000" opacity="0.3"/>
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
																	        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																	        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
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
													<span class="menu-text">Stock</span>
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
																	        <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="#000000"/>
																	        <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="#000000" opacity="0.3"/>
																	    </g>
																	</svg>
																</span>
																<span class="menu-text">Produits</span>
															</a>
														</li>
														<li class="menu-item <?= $route == 'lots-produits' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('lots-produits') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	        <rect x="0" y="0" width="24" height="24"/>
																	        <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="1"/>
																	        <path d="M5,10 L7,10 C7.55228475,10 8,10.4477153 8,11 L8,13 C8,13.5522847 7.55228475,14 7,14 L5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,7 C14,7.55228475 13.5522847,8 13,8 L11,8 C10.4477153,8 10,7.55228475 10,7 L10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L11,14 C10.4477153,14 10,13.5522847 10,13 L10,11 C10,10.4477153 10.4477153,10 11,10 Z M17,4 L19,4 C19.5522847,4 20,4.44771525 20,5 L20,7 C20,7.55228475 19.5522847,8 19,8 L17,8 C16.4477153,8 16,7.55228475 16,7 L16,5 C16,4.44771525 16.4477153,4 17,4 Z M17,10 L19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 L17,14 C16.4477153,14 16,13.5522847 16,13 L16,11 C16,10.4477153 16.4477153,10 17,10 Z M5,16 L7,16 C7.55228475,16 8,16.4477153 8,17 L8,19 C8,19.5522847 7.55228475,20 7,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,17 C4,16.4477153 4.44771525,16 5,16 Z M11,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 L10,17 C10,16.4477153 10.4477153,16 11,16 Z M17,16 L19,16 C19.5522847,16 20,16.4477153 20,17 L20,19 C20,19.5522847 19.5522847,20 19,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,16.4477153 16.4477153,16 17,16 Z" fill="#000000"/>
																	    </g>
																	</svg>
																</span>
																<span class="menu-text">Lots de produits</span>
															</a>
														</li>
														<li class="menu-item <?= $route == 'produit' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
															<a href="<?= Helper::getUrl('produit') ?>" class="menu-link">
																<span class="svg-icon menu-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	        <rect x="0" y="0" width="24" height="24"/>
																	        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																	        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
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
													<span class="menu-text">Commandes</span>
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
																	        <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="#000000"/>
																	        <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="#000000" opacity="0.3"/>
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
																	        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																	        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
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
													<span class="menu-text">Utilisateurs</span>
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
																	        <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="#000000"/>
																	        <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="#000000" opacity="0.3"/>
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
																	        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																	        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
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
																	        <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="#000000"/>
																	        <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="#000000" opacity="0.3"/>
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
																	        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																	        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
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


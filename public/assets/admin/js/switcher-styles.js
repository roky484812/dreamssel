let html = document.querySelector('html');

//Switcher Styles
function switcherEvents() {
	'use strict';

	/***************** RTL Start*********************/
	$(document).on("click", '#myonoffswitch55', function () {
		if (this.checked) {
			$('body').addClass('rtl');
			$('body').removeClass('ltr');
			$("html[lang=en]").attr("dir", "rtl");
			$(".select2-container").attr("dir", "rtl");
			$('.fc-theme-standard').removeClass('fc-direction-ltr');
			$('.fc-theme-standard').addClass('fc-direction-rtl');
			$('.fc-header-toolbar').removeClass('fc-toolbar-ltr');
			$('.fc-header-toolbar').addClass('fc-toolbar-rtl');
			localStorage.setItem("pirhotechrtl", true);
			localStorage.removeItem("pirhotechltr");
			$("head link#style").attr("href", $(this));
			(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));

			var carousel = $('.owl-carousel');
			$.each(carousel, function (index, element) {
				// element == this
				var carouselData = $(element).data('owl.carousel');
				carouselData.settings.rtl = true; //don't know if both are necessary
				carouselData.options.rtl = true;
				$(element).trigger('refresh.owl.carousel');
			});
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
			}
		}
	});
	/***************** RTL End *********************/

	/***************** LTR Start *********************/
	$(document).on("click", '#myonoffswitch54', function () {

		if (this.checked) {
			$('body').addClass('ltr');
			$('body').removeClass('rtl');
			$("html[lang=en]").attr("dir", "ltr");
			$(".select2-container").attr("dir", "ltr");
			$('.fc-theme-standard').addClass('fc-direction-ltr');
			$('.fc-theme-standard').removeClass('fc-direction-rtl');
			$('.fc-header-toolbar').addClass('fc-toolbar-ltr');
			$('.fc-header-toolbar').removeClass('fc-toolbar-rtl');
			localStorage.setItem("pirhotechltr", true);
			localStorage.removeItem("pirhotechrtl");
			$("head link#style").attr("href", $(this));
			(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.min.css"));
			var carousel = $('.owl-carousel');
			$.each(carousel, function (index, element) {
				// element == this
				var carouselData = $(element).data('owl.carousel');
				carouselData.settings.rtl = false; //don't know if both are necessary
				carouselData.options.rtl = false;
				$(element).trigger('refresh.owl.carousel');
			});
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
			}
		} 
	});
	/***************** LTR End*********************/

	/***************** LIGHT THEME Start*********************/
	$(document).on("click", '#myonoffswitch1', function () {
		if (this.checked) {
			$('body').addClass('light-mode');
			$('body').removeClass('dark-mode');
			$('body').removeClass('light-menu');
			$('body').removeClass('dark-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('dark-header');

			$('#myonoffswitch3').prop('checked', true);
			$('#myonoffswitch6').prop('checked', true);

			localStorage.setItem('pirhotechlightMode', true)
			localStorage.removeItem('pirhotechdarkMode', false)
		} 
	});
	/***************** LIGHT THEME End *********************/

	/***************** DARK THEME Start*********************/
	$(document).on("click", '#myonoffswitch2', function () {
		if (this.checked) {
			$('body').addClass('dark-mode');
			$('body').removeClass('light-mode');
			$('body').removeClass('light-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('dark-menu');
			$('body').removeClass('dark-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-header');

			$('#myonoffswitch5').prop('checked', true);
			$('#myonoffswitch8').prop('checked', true);

			html.style.removeProperty("--dark-body");
			html.style.removeProperty("--dark-theme");
			localStorage.removeItem("pirhotechbgColor");
			localStorage.removeItem("pirhotechthemeColor");

			localStorage.setItem('pirhotechdarkMode', true);
			localStorage.removeItem('pirhotechlightMode', false);
			
		} 
	});
	/***************** Dark THEME End*********************/

	/***************** VERTICAL-MENU Start*********************/
	$(document).on("click", '#myonoffswitch34', function () {
		if (this.checked) {
			$('body').removeClass('horizontal');
			$('body').removeClass('horizontal-hover');
			$(".main-content").removeClass("horizontal-content");
			$(".main-content").addClass("app-content");
			$(".main-container").removeClass("container");
			$(".main-container").addClass("container-fluid");
			$(".app-header").removeClass("hor-header");
			$(".app-header").addClass("side-header");
			$(".app-sidebar").removeClass("horizontal-main")
			$(".main-sidemenu").removeClass("container")
			$('#slide-left').removeClass('d-none');
			$('#slide-right').removeClass('d-none');
			$('body').addClass('sidebar-mini');

			$('#myonoffswitch13').prop('checked', true);

			localStorage.setItem("pirhotechvertical", true);
			localStorage.removeItem("pirhotechhorizontal");
			localStorage.removeItem("pirhotechhorizontalHover");
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
				menuClick();
				responsive();
			}
		} 
	});
	/***************** VERTICAL-MENU End*********************/

	/***************** HORIZONTAL-CLICK-MENU Start*********************/
	$(document).on("click", '#myonoffswitch35', function () {
		if (this.checked) {
			if (window.innerWidth >= 992) {
				let li = document.querySelectorAll('.side-menu li')
				li.forEach((e, i) => {
					e.classList.remove('is-expanded')
				})
				var animationSpeed = 300;
				// first level
				var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
				var ul = parent.find('ul:visible').slideUp(animationSpeed);
				ul.removeClass('open');
				var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
				var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
				ul1.removeClass('open');
			}
			$('body').addClass('horizontal');
			$(".main-content").addClass("horizontal-content");
			$(".main-content").removeClass("app-content");
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
			$(".app-header").addClass("hor-header");
			$(".app-header").removeClass("side-header");
			$(".app-sidebar").addClass("horizontal-main")
			$(".main-sidemenu").addClass("container")
			$('body').removeClass('sidebar-mini');
			$('body').removeClass('sidenav-toggled');
			$('body').removeClass('horizontal-hover');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');

			localStorage.setItem("pirhotechhorizontal", true);
			localStorage.removeItem("pirhotechhorizontalHover");
			localStorage.removeItem("pirhotechvertical");
			// $('#slide-left').removeClass('d-none');
			// $('#slide-right').removeClass('d-none');
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
				ActiveSubmenu();
				menuClick();
				responsive();
				document.querySelector('.horizontal .side-menu').style.flexWrap = 'noWrap'
			}
		}
	});
	/***************** HORIZONTAL-CLICK-MENU End*********************/

	/***************** HORIZONTAL-HOVER-MENU Start*********************/
	$(document).on("click", '#myonoffswitch111', function () {
		if (this.checked) {
			let li = document.querySelectorAll('.side-menu li')
			li.forEach((e, i) => {
				e.classList.remove('is-expanded')
			})
			var animationSpeed = 300;
			// first level
			var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
			var ul = parent.find('ul:visible').slideUp(animationSpeed);
			ul.removeClass('open');
			var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
			var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
			ul1.removeClass('open');
			$('body').addClass('horizontal-hover');
			$('body').addClass('horizontal');
			let subNavSub = document.querySelectorAll('.sub-slide-menu');
			subNavSub.forEach((e) => {
				e.style.display = '';
			})
			let subNav = document.querySelectorAll('.slide-menu')
			subNav.forEach((e) => {
				e.style.display = '';
			})
			// $('#slide-left').addClass('d-none');
			// $('#slide-right').addClass('d-none');
			$(".main-content").addClass("horizontal-content");
			$(".main-content").removeClass("app-content");
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
			$(".app-header").addClass("hor-header");
			$(".app-header").removeClass("side-header");
			$(".app-sidebar").addClass("horizontal-main")
			$(".main-sidemenu").addClass("container")
			$('body').removeClass('sidebar-mini');
			$('body').removeClass('sidenav-toggled');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');

			localStorage.setItem("pirhotechhorizontalHover", true);
			localStorage.removeItem("pirhotechhorizontal");
			localStorage.removeItem("pirhotechvertical");
			HorizontalHovermenu();
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
				responsive();
				document.querySelector('.horizontal .side-menu').style.flexWrap = 'nowrap'
			}
		}
	});
	/***************** HORIZONTAL-HOVER-MENU End*********************/

	/***************** DEFAULT-MENU Start*********************/
	$(document).on("click", '#myonoffswitch13', function () {
		if (this.checked) {
			$('body').addClass('default-menu');
			hovermenu();
			$('body').removeClass('closed-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('sidenav-toggled');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("pirhotechdefaultmenu", true);
			localStorage.removeItem("pirhotechclosedmenu");
			localStorage.removeItem("pirhotechicontextmenu");
			localStorage.removeItem("pirhotechsideiconmenu");
			localStorage.removeItem("pirhotechhoversubmenu");
			localStorage.removeItem("pirhotechhoversubmenu1");
		}
	});
	/***************** DEFAULT-MENU End*********************/

	/***************** CLOSED-MENU Start*********************/
	$(document).on("click", '#myonoffswitch30', function () {
		if (this.checked) {
			$('body').addClass('closed-menu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("pirhotechclosedmenu", true);
			localStorage.removeItem("pirhotechdefaultmenu");
			localStorage.removeItem("pirhotechicontextmenu");
			localStorage.removeItem("pirhotechsideiconmenu");
			localStorage.removeItem("pirhotechhoversubmenu");
			localStorage.removeItem("pirhotechhoversubmenu1");
		}
	});
	/***************** CLOSED-MENU End*********************/

	/***************** ICON-TEXT-MENU Start*********************/
	$(document).on("click", '#myonoffswitch14', function () {
		if (this.checked) {
			$('body').addClass('icontext-menu');
			icontext();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("pirhotechicontextmenu", true);
			localStorage.removeItem("pirhotechdefaultmenu");
			localStorage.removeItem("pirhotechclosedmenu");
			localStorage.removeItem("pirhotechsideiconmenu");
			localStorage.removeItem("pirhotechhoversubmenu");
			localStorage.removeItem("pirhotechhoversubmenu1");

		}
	});
	/***************** ICON-TEXT-MENU End*********************/

	/***************** ICON-OVERLAY-MENU Start*********************/
	$(document).on("click", '#myonoffswitch15', function () {
		if (this.checked) {
			$('body').addClass('sideicon-menu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("pirhotechsideiconmenu", true);
			localStorage.removeItem("pirhotechdefaultmenu");
			localStorage.removeItem("pirhotechclosedmenu");
			localStorage.removeItem("pirhotechicontextmenu");
			localStorage.removeItem("pirhotechhoversubmenu");
			localStorage.removeItem("pirhotechhoversubmenu1");
		}
	});
	/***************** ICON-OVERLAY-MENU End*********************/

	/***************** HOVER-SUBMENU-MENU Start*********************/
	$(document).on("click", '#myonoffswitch32', function () {
		if (this.checked) {
			$('body').addClass('hover-submenu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("pirhotechhoversubmenu", true);
			localStorage.removeItem("pirhotechdefaultmenu");
			localStorage.removeItem("pirhotechclosedmenu");
			localStorage.removeItem("pirhotechicontextmenu");
			localStorage.removeItem("pirhotechsideiconmenu");
			localStorage.removeItem("pirhotechhoversubmenu1");
		}
	});
	/***************** HOVER-SUBMENU-MENU End*********************/

	/***************** HOVER-SUBMENU-MENU-1 Start*********************/
	$(document).on("click", '#myonoffswitch33', function () {
		if (this.checked) {
			$('body').addClass('hover-submenu1');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			localStorage.setItem("pirhotechhoversubmenu1", true);
			localStorage.removeItem("pirhotechdefaultmenu");
			localStorage.removeItem("pirhotechclosedmenu");
			localStorage.removeItem("pirhotechicontextmenu");
			localStorage.removeItem("pirhotechsideiconmenu");
			localStorage.removeItem("pirhotechhoversubmenu");
		}
	});
	/***************** HOVER-SUBMENU-MENU-1 End*********************/

	/***************** BODY-STYLE Start*********************/
	$(document).on("click", '#myonoffswitch06', function () {
		if (this.checked) {
			$('body').addClass('body-style1');
			$('body').removeClass('body-default');
			localStorage.setItem("pirhotechbodystyle", true);
			localStorage.removeItem("pirhotechdefaultbody");
		}
	});

	$(document).on("click", '#myonoffswitch07', function () {
		if (this.checked) {
			$('body').removeClass('body-style1');
			$('body').addClass('body-default');
			localStorage.setItem("pirhotechdefaultbody", true);
			localStorage.removeItem("pirhotechbodystyle");
		}
	});
	/***************** BODY-STYLE End*********************/

	/***************** LAYOUT-STYLE Start*********************/
	$(document).on("click", '#myonoffswitch9', function () {
		if (this.checked) {
			$('body').addClass('layout-fullwidth');
			$('body').removeClass('layout-boxed');
			localStorage.setItem("pirhotechfullwidth", true);
			localStorage.removeItem("pirhotechboxedwidth");
		}
	});

	$(document).on("click", '#myonoffswitch10', function () {
		if (this.checked) {
			$('body').addClass('layout-boxed');
			$('body').removeClass('layout-fullwidth');
			localStorage.setItem("pirhotechboxedwidth", true);
			localStorage.removeItem("pirhotechfullwidth");
		}
	});
	/***************** LAYOUT-STYLE End*********************/

	/***************** LAYOUT-POSITIONS Start*********************/
	$(document).on("click", '#myonoffswitch11', function () {
		if (this.checked) {
			$('body').addClass('fixed-layout');
			$('body').removeClass('scrollable-layout');
			localStorage.setItem("pirhotechfixed", true);
			localStorage.removeItem("pirhotechscrollable");
		}
	});

	$(document).on("click", '#myonoffswitch12', function () {
		if (this.checked) {
			$('body').addClass('scrollable-layout');
			$('body').removeClass('fixed-layout');
			localStorage.setItem("pirhotechscrollable", true);
			localStorage.removeItem("pirhotechfixed");
		}
	});
	/***************** LAYOUT-POSITIONS End*********************/

	/***************** MENU-STYLES Start*********************/
	$(document).on("click", '#myonoffswitch3', function () {
		if (this.checked) {
			$('body').addClass('light-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('dark-menu');
			localStorage.setItem("pirhotechlightmenu", true);
			localStorage.removeItem("pirhotechcolormenu");
			localStorage.removeItem("pirhotechdarkmenu");
		}
	});
	
	$(document).on("click", '#myonoffswitch4', function () {
		if (this.checked) {
			$('body').addClass('color-menu');
			$('body').removeClass('light-menu');
			$('body').removeClass('dark-menu');
			localStorage.setItem("pirhotechcolormenu", true);
			localStorage.removeItem("pirhotechlightmenu");
			localStorage.removeItem("pirhotechdarkmenu");
		}
	});
	
	$(document).on("click", '#myonoffswitch5', function () {
		if (this.checked) {
			$('body').addClass('dark-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('light-menu');
			localStorage.setItem("pirhotechdarkmenu", true);
			localStorage.removeItem("pirhotechlightmenu");
			localStorage.removeItem("pirhotechcolormenu");
		}
	});
	/***************** MENU-STYLES End*********************/

	/***************** HEADER-STYLES Start*********************/
	$(document).on("click", '#myonoffswitch6', function () {
		if (this.checked) {
			$('body').addClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('dark-header');
			localStorage.setItem("pirhotechlightheader", true);
			localStorage.removeItem("pirhotechcolorheader");
			localStorage.removeItem("pirhotechdarkheader");
		} 
	});

	$(document).on("click", '#myonoffswitch7', function () {
		if (this.checked) {
			$('body').addClass('color-header');
			$('body').removeClass('light-header');
			$('body').removeClass('dark-header');
			localStorage.setItem("pirhotechcolorheader", true);
			localStorage.removeItem("pirhotechlightheader");
			localStorage.removeItem("pirhotechdarkheader");
		}
	});

	$(document).on("click", '#myonoffswitch8', function () {
		if (this.checked) {
			$('body').addClass('dark-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-header');
			localStorage.setItem("pirhotechdarkheader", true);
			localStorage.removeItem("pirhotechlightheader");
			localStorage.removeItem("pirhotechcolorheader");
		}
	});
	/***************** HEADER-STYLES End*********************/


	/***************** Add Switcher Classes *********************/
	//LTR & RTL
	if (!localStorage.getItem('pirhotechrtl') && !localStorage.getItem('pirhotechltr')) {

		/***************** RTL *********************/
		// $('body').addClass('rtl');
		/***************** RTL *********************/
		/***************** LTR *********************/
		// $('body').addClass('ltr');
		/***************** LTR *********************/

	}
	//Light-mode & Dark-mode
	if (!localStorage.getItem('pirhotechlight') && !localStorage.getItem('pirhotechdark')) {
		/***************** Light THEME *********************/
		// $('body').addClass('light-theme');
		/***************** Light THEME *********************/

		/***************** DARK THEME *********************/
		// $('body').addClass('dark-theme');
		/***************** Dark THEME *********************/
	}

	//Vertical-menu & Horizontal-menu
	if (!localStorage.getItem('pirhotechvertical') && !localStorage.getItem('pirhotechhorizontal') && !localStorage.getItem('pirhotechhorizontalHover')) {
		/***************** Horizontal THEME *********************/
		// $('body').addClass('horizontal');
		/***************** Horizontal THEME *********************/

		/***************** Horizontal-Hover THEME *********************/
		// $('body').addClass('horizontal-hover');
		/***************** Horizontal-Hover THEME *********************/
	}

	//Vertical Layout Style
	if (!localStorage.getItem('pirhotechdefaultmenu') && !localStorage.getItem('pirhotechclosedmenu') && !localStorage.getItem('pirhotechicontextmenu')&& !localStorage.getItem('pirhotechsideiconmenu')&& !localStorage.getItem('pirhotechhoversubmenu')&& !localStorage.getItem('pirhotechhoversubmenu1')) {
		/**Default-Menu**/
		// $('body').addClass('default-menu');
		/**Default-Menu**/

		/**closed-Menu**/
		// $('body').addClass('closed-menu');
		/**closed-Menu**/

		/**Icon-Text-Menu**/
		// $('body').addClass('icontext-menu');
		/**Icon-Text-Menu**/

		/**Icon-Overlay-Menu**/
		// $('body').addClass('sideicon-menu');
		/**Icon-Overlay-Menu**/

		/**Hover-Sub-Menu**/
		// $('body').addClass('hover-submenu');
		/**Hover-Sub-Menu**/

		/**Hover-Sub-Menu1**/
		// $('body').addClass('hover-submenu1');
		/**Hover-Sub-Menu1**/
	}

	//Body Style
	if (!localStorage.getItem('pirhotechdefaultbody') && !localStorage.getItem('pirhotechbodystyle')) {
	// $('body').addClass('body-style1');
	}

	//Boxed Layout Style
	if (!localStorage.getItem('pirhotechfullwidth') && !localStorage.getItem('pirhotechboxedwidth')) {
	// $('body').addClass('layout-boxed');
	}

	//Scrollable-Layout Style
	if (!localStorage.getItem('pirhotechfixed') && !localStorage.getItem('pirhotechscrollable')) {
	// $('body').addClass('scrollable-layout');
	}

	//Menu Styles
	if (!localStorage.getItem('pirhotechlightmenu') && !localStorage.getItem('pirhotechcolormenu') && !localStorage.getItem('pirhotechdarkmenu')) {
		/**Light-menu**/
		// $('body').addClass('light-menu');
		/**Light-menu**/

		/**Color-menu**/
		// $('body').addClass('color-menu');
		/**Color-menu**/

		/**Dark-menu**/
		// $('body').addClass('dark-menu');
		/**Dark-menu**/
	}
	//Header Styles
	if (!localStorage.getItem('pirhotechlightheader') && !localStorage.getItem('pirhotechcolorheader') && !localStorage.getItem('pirhotechdarkheader')) {
		/**Light-Header**/
		// $('body').addClass('light-header');
		/**Light-Header**/

		/**Color-Header**/
		// $('body').addClass('color-header');
		/**Color-Header**/

		/**Dark-Header**/
		// $('body').addClass('dark-header');
		/**Dark-Header**/

	}
	/***************** Add Switcher Classes *********************/

}
switcherEvents();


(function () {
	"use strict";
	/***************** RTL HAs Class *********************/
	let bodyRtl = $('body').hasClass('rtl');
	if (bodyRtl) {
		$('body').addClass('rtl');
		$('body').removeClass('ltr');
		$("html[lang=en]").attr("dir", "rtl");
		$(".select2-container").attr("dir", "rtl");
		$("head link#style").attr("href", $(this));
		(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));

		var carousel = $('.owl-carousel');
		$.each(carousel, function (index, element) {
			// element == this
			var carouselData = $(element).data('owl.carousel');
			carouselData.settings.rtl = true; //don't know if both are necessary
			carouselData.options.rtl = true;
			$(element).trigger('refresh.owl.carousel');
		});
		if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
			checkHoriMenu();
		}

	}
	/***************** RTL HAs Class *********************/

	/***************** Horizontal HAs Class *********************/
	let bodyhorizontal = $('body').hasClass('horizontal');
	if (bodyhorizontal) {
		if (window.innerWidth >= 992) {
			let li = document.querySelectorAll('.side-menu li')
			li.forEach((e, i) => {
				e.classList.remove('is-expanded')
			})
			var animationSpeed = 300;
			// first level
			var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
			var ul = parent.find('ul:visible').slideUp(animationSpeed);
			ul.removeClass('open');
			var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
			var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
			ul1.removeClass('open');
		}
		$('body').addClass('horizontal');
		$(".main-content").addClass("horizontal-content");
		$(".main-content").removeClass("app-content");
		$(".main-container").addClass("container");
		$(".main-container").removeClass("container-fluid");
		$(".app-header").addClass("hor-header");
		$(".app-header").removeClass("side-header");
		$(".app-sidebar").addClass("horizontal-main")
		$(".main-sidemenu").addClass("container")
		$('body').removeClass('sidebar-mini');
		$('body').removeClass('sidenav-toggled');
		$('body').removeClass('horizontal-hover');
		$('body').removeClass('closed-menu');
		$('body').removeClass('hover-submenu');
		$('body').removeClass('hover-submenu1');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		// $('#slide-left').removeClass('d-none');
		// $('#slide-right').removeClass('d-none');
		if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
			checkHoriMenu();
			ActiveSubmenu();
			menuClick();
			responsive();
			document.querySelector('.horizontal .side-menu').style.flexWrap = 'noWrap'
		}
	}
	/***************** Horizontal HAs Class *********************/

	/***************** Horizontal Hover HAs Class *********************/
	let bodyhorizontalhover = $('body').hasClass('horizontal-hover');
	if (bodyhorizontalhover) {
		let li = document.querySelectorAll('.side-menu li')
		li.forEach((e, i) => {
			e.classList.remove('is-expanded')
		})
		var animationSpeed = 300;
		// first level
		var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
		var ul = parent.find('ul:visible').slideUp(animationSpeed);
		ul.removeClass('open');
		var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
		var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
		ul1.removeClass('open');
		$('body').addClass('horizontal-hover');
		$('body').addClass('horizontal');
		let subNavSub = document.querySelectorAll('.sub-slide-menu');
		subNavSub.forEach((e) => {
			e.style.display = '';
		})
		let subNav = document.querySelectorAll('.slide-menu')
		subNav.forEach((e) => {
			e.style.display = '';
		})
		// $('#slide-left').addClass('d-none');
		// $('#slide-right').addClass('d-none');
		$(".main-content").addClass("horizontal-content");
		$(".main-content").removeClass("app-content");
		$(".main-container").addClass("container");
		$(".main-container").removeClass("container-fluid");
		$(".app-header").addClass("hor-header");
		$(".app-header").removeClass("side-header");
		$(".app-sidebar").addClass("horizontal-main")
		$(".main-sidemenu").addClass("container")
		$('body').removeClass('sidebar-mini');
		$('body').removeClass('sidenav-toggled');
		$('body').removeClass('closed-menu');
		$('body').removeClass('hover-submenu');
		$('body').removeClass('hover-submenu1');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		HorizontalHovermenu();
		if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
			checkHoriMenu();
			responsive();
			document.querySelector('.horizontal .side-menu').style.flexWrap = 'nowrap'
		}
	}
	/***************** Horizontal Hover HAs Class *********************/

	/***************** CLOSEDMENU HAs Class *********************/
	let bodyclosed = $('body').hasClass('closed-menu');
	if (bodyclosed) {
		$('body').addClass('closed-menu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** CLOSEDMENU HAs Class *********************/

	/***************** ICONTEXT MENU HAs Class *********************/
	let bodyicontext = $('body').hasClass('icontext-menu');
	if (bodyicontext) {
		$('body').addClass('icontext-menu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			icontext();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** ICONTEXT MENU HAs Class *********************/

	/***************** ICONOVERLAY MENU HAs Class *********************/
	let bodyiconoverlay = $('body').hasClass('sideicon-menu');
	if (bodyiconoverlay) {
		$('body').addClass('sideicon-menu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** ICONOVERLAY MENU HAs Class *********************/

	/***************** HOVER-SUBMENU HAs Class *********************/
	let bodyhover = $('body').hasClass('hover-submenu');
	if (bodyhover) {
		$('body').addClass('hover-submenu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** HOVER-SUBMENU HAs Class *********************/

	/***************** HOVER-SUBMENU HAs Class *********************/
	let bodyhover1 = $('body').hasClass('hover-submenu1');
	if (bodyhover1) {
		$('body').addClass('hover-submenu1');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** HOVER-SUBMENU HAs Class *********************/
	checkOptions();
})()

function checkOptions() {
	'use strict'

	// horizontal
	if (document.querySelector('body').classList.contains('horizontal')) {
		$('#myonoffswitch35').prop('checked', true);
	}

	// horizontal-hover
	if (document.querySelector('body').classList.contains('horizontal-hover')) {
		$('#myonoffswitch111').prop('checked', true);
	}

	//RTL 
	if (document.querySelector('body').classList.contains('rtl')) {
		$('#myonoffswitch55').prop('checked', true);
	}

	// light header 
	if (document.querySelector('body').classList.contains('light-header')) {
		$('#myonoffswitch6').prop('checked', true);
	}
	// color header 
	if (document.querySelector('body').classList.contains('color-header')) {
		$('#myonoffswitch7').prop('checked', true);
	}
	// dark header 
	if (document.querySelector('body').classList.contains('dark-header')) {
		$('#myonoffswitch8').prop('checked', true);
	}

	// light menu
	if (document.querySelector('body').classList.contains('light-menu')) {
		$('#myonoffswitch3').prop('checked', true);
	}
	// color menu
	if (document.querySelector('body').classList.contains('color-menu')) {
		$('#myonoffswitch4').prop('checked', true);
	}
	// dark menu
	if (document.querySelector('body').classList.contains('dark-menu')) {
		$('#myonoffswitch5').prop('checked', true);
	}
	// Body style
	if (document.querySelector('body').classList.contains('body-style1')) {
		$('#myonoffswitch06').prop('checked', true);
	}
	// Boxed style
	if (document.querySelector('body').classList.contains('layout-boxed')) {
		$('#myonoffswitch10').prop('checked', true);
	}
	// scrollable-layout style
	if (document.querySelector('body').classList.contains('scrollable-layout')) {
		$('#myonoffswitch12').prop('checked', true);
	}
	// closed-menu style
	if (document.querySelector('body').classList.contains('closed-menu')) {
		$('#myonoffswitch30').prop('checked', true);
	}
	// icontext-menu style
	if (document.querySelector('body').classList.contains('icontext-menu')) {
		$('#myonoffswitch14').prop('checked', true);
	}
	// iconoverlay-menu style
	if (document.querySelector('body').classList.contains('sideicon-menu')) {
		$('#myonoffswitch15').prop('checked', true);
	}
	// hover-submenu style
	if (document.querySelector('body').classList.contains('hover-submenu')) {
		$('#myonoffswitch32').prop('checked', true);
	}
	// hover-submenu1 style
	if (document.querySelector('body').classList.contains('hover-submenu1')) {
		$('#myonoffswitch33').prop('checked', true);
	}
}
checkOptions()

function resetData() {
	'use strict'
	$('#myonoffswitch54').prop('checked', true);
	$('#myonoffswitch1').prop('checked', true);
	$('#myonoffswitch34').prop('checked', true);
	$('#myonoffswitch3').prop('checked', true);
	$('#myonoffswitch6').prop('checked', true);
	$('#myonoffswitch07').prop('checked', true);
	$('#myonoffswitch9').prop('checked', true);
	$('#myonoffswitch11').prop('checked', true);
	$('#myonoffswitch13').prop('checked', true);
	$('body')?.addClass('light-mode');
	$('body')?.removeClass('dark-mode');
	$('body')?.removeClass('dark-menu');
	$('body')?.removeClass('light-menu');
	$('body')?.removeClass('color-menu');
	$('body')?.removeClass('dark-header');
	$('body')?.removeClass('light-header');
	$('body')?.removeClass('color-header');
	$('body')?.removeClass('layout-boxed');
	$('body')?.removeClass('icontext-menu');
	$('body')?.removeClass('sideicon-menu');
	$('body')?.removeClass('closed-menu');
	$('body')?.removeClass('hover-submenu');
	$('body')?.removeClass('hover-submenu1');
	$('body')?.removeClass('scrollable-layout');
	$('body')?.removeClass('sidenav-toggled');
	$('body')?.removeClass('body-style1');
	$('body')?.removeClass('scrollable-layout');


	$('body').removeClass('horizontal');
	$('body').removeClass('horizontal-hover');
	$(".main-content").removeClass("horizontal-content");
	$(".main-content").addClass("app-content");
	$(".main-container").removeClass("container");
	$(".main-container").addClass("container-fluid");
	$(".app-header").removeClass("hor-header");
	$(".app-header").addClass("side-header");
	$(".app-sidebar").removeClass("horizontal-main")
	$(".main-sidemenu").removeClass("container")
	$('#slide-left').removeClass('d-none');
	$('#slide-right').removeClass('d-none');
	$('body').addClass('sidebar-mini');
	if (document.querySelector('body').classList.contains('horizontal') && !(document.querySelector('body').classList.contains('error-page')) ) {
		checkHoriMenu();
		menuClick();
		responsive();
	}

	$('body').addClass('ltr');
	$('body').removeClass('rtl');
	$("html[lang=en]").attr("dir", "ltr");
	$(".select2-container").attr("dir", "ltr");
	localStorage.setItem("pirhotechltr", true);
	localStorage.removeItem("pirhotechrtl");
	$("head link#style").attr("href", $(this));
	(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.min.css"));
	var carousel = $('.owl-carousel');
	$.each(carousel, function (index, element) {
		// element == this
		var carouselData = $(element).data('owl.carousel');
		carouselData.settings.rtl = false; //don't know if both are necessary
		carouselData.options.rtl = false;
		$(element).trigger('refresh.owl.carousel');
	});
	if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
		checkHoriMenu();
	}
}
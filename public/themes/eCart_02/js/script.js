
document.addEventListener("DOMContentLoaded", function (event) {

    ("use strict");

    //**************Scroll-To-Top Button **************//

    $(window).scroll(function () {
            $(this).scrollTop() >= 100 ?
                $("#return-to-top").fadeIn(200) :
                $("#return-to-top").fadeOut(200);
        }),

        $("#return-to-top").click(function () {
            $("body,html").animate({
                scrollTop: 0
            }, 500);
        });

    // preloader
    setTimeout(function () {
        $(".loader").fadeOut("slow", function () {});
    }, 3000);

    /*------ Wow Active ----*/
    new WOW().init();

    //************Dark-mode****************//

    // const btn = document.querySelector(".btn-toggle");
    // const theme = document.querySelector("#theme-link");
    // btn.addEventListener("click", function () {
    //     // Swap out the URL for the different stylesheets
    //     if (theme.getAttribute("href") == "public/themes/ekartfulllayout/css/custom.css") {
    //         theme.href = "public/themes/ekartfulllayout/css/darkmode.css";
    //     } else {
    //         theme.href = "public/themes/ekartfulllayout/css/custom.css";
    //     }
    // });

    /*--- niceSelect---*/
    $(".select_option").niceSelect();

    /*---niceSelect---*/
    $(".niceselect_option").niceSelect();

    /*---categories slideToggle---*/
    $(".title_content").on("click", function () {
        $(this).toggleClass("active");
        $(".categories_content_toggle").slideToggle("medium");
    });

    /*----------  Category more toggle  ----------*/

    $(".categories_content_toggle li.hidden").hide();
    $("#more-btn").on("click", function (e) {
        e.preventDefault();
        $(".categories_content_toggle li.hidden").toggle(500);
        var htmlBefore =
            '<i class="fa fa-minus" aria-hidden="true"></i> Less Categories';
        var htmlAfter =
            '<i class="fa fa-plus" aria-hidden="true"></i> More Categories';

        if ($(this).html() == htmlBefore) {
            $(this).html(htmlAfter);
        } else {
            $(this).html(htmlBefore);
        }
    });

    /*---search box slideToggle---*/
    $(".search-box > a").on("click", function () {
        $(this).toggleClass("active");
        $(".search_widget").slideToggle("medium");
    });

    /*---header account slideToggle---*/
    $(".header_account > a").on("click", function () {
        $(this).toggleClass("active");
        $(".dropdown_account").slideToggle("medium");
    });

    /*---slide toggle activation---*/

    /*---Category menu---*/
    function SubMenuToggle() {
        $(".categories_content_toggle li.menu_item_content > a").on(
            "click",
            function () {
                if ($(window).width() < 991) {
                    $(this).removeAttr("href");
                    var element = $(this).parent("li");
                    if (element.hasClass("open")) {
                        element.removeClass("open");
                        element.find("li").removeClass("open");
                        element.find("ul").slideUp();
                    } else {
                        element.addClass("open");
                        element.children("ul").slideDown();
                        element.siblings("li").children("ul").slideUp();
                        element.siblings("li").removeClass("open");
                        element.siblings("li").find("li").removeClass("open");
                        element.siblings("li").find("ul").slideUp();
                    }
                }
            }
        );
        $(".categories_content_toggle li.menu_item_content > a").append(
            '<span class="expand"></span>'
        );
    }
    SubMenuToggle();

    /*---mini cart activation---*/
    $(".mini_cart_wrapper > a").on("click", function () {
        $(".mini_cart,.off_canvars_overlay").addClass("active");
    });

    $(".mini_cart_close,.off_canvars_overlay").on("click", function () {
        $(".mini_cart,.off_canvars_overlay").removeClass("active");
    });

    /*---canvas menu activation---*/
    $(".mobile_canvas_open,.off_canvars_overlay").on("click", function () {
        $(".mobile_wrapper,.off_canvars_overlay").addClass("active");
    });

    $(".mobile_canvas_close,.off_canvars_overlay").on("click", function () {
        $(".mobile_wrapper,.off_canvars_overlay").removeClass("active");
    });

    /*---Off Canvas mobile Menu---*/
    var $mobilecontent = $(".offcanvas_main_menu"),
        $mobileSubMenu = $mobilecontent.find(".sub-menu");
    $mobileSubMenu
        .parent()
        .prepend(
            '<span class="menu-expand"><i class="fa fa-angle-down"></i></span>'
        );

    $mobileSubMenu.slideUp();

    $mobilecontent.on("click", "li a, li .menu-expand", function (e) {
        var $this = $(this);
        if (
            $this
            .parent()
            .attr("class")
            .match(
                /\b(menu-item-has-children|has-children|has-sub-menu)\b/
            ) &&
            ($this.attr("href") === "#" || $this.hasClass("menu-expand"))
        ) {
            e.preventDefault();
            if ($this.siblings("ul:visible").length) {
                $this.siblings("ul").slideUp("slow");
            } else {
                $this
                    .closest("li")
                    .siblings("li")
                    .find("ul:visible")
                    .slideUp("slow");
                $this.siblings("ul").slideDown("slow");
            }
        }
        if (
            $this.is("a") ||
            $this.is("span") ||
            $this.attr("clas").match(/\b(menu-expand)\b/)
        ) {
            $this.parent().toggleClass("menu-open");
        } else if (
            $this.is("li") &&
            $this.attr("class").match(/\b('menu-item-has-children')\b/)
        ) {
            $this.toggleClass("menu-open");
        }
    });

    /*---countdown activation---*/

    $("[data-countdown]").each(function () {
        var $this = $(this),
            finalDate = $(this).data("countdown");
        $this.countdown(finalDate, function (event) {
            $this.html(
                event.strftime(
                    '<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">day</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">hour</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">min</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">sec</div></div></div>'
                )
            );
        });
    });

    /* Slider active */
    $(".slider-activation").owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 3000,
      
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        dotsData: false,
        item: 1,
        rtl: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    /*---deals activation---*/
    var $deals_carousel = $(".deals_carousel");
    if ($deals_carousel.length > 0) {
        $deals_carousel
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: true,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 1,
                rtl: false,
                dots: false,
                margin: 20,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 1,
                    },
                },
            });
    }
    /*---product trending sec---*/
    var $product_right_Carousel = $(".product_right_Carousel");
    if ($product_right_Carousel.length > 0) {
        $product_right_Carousel
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: false,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 15,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                    1400: {
                        items:4,
                    },
                    1600: {
                        items: 4,
                    },
                },
            });
    }

    // popular categories
    var $popularcategory = $(".popular-cat");
    if ($popularcategory.length > 0) {
        $popularcategory
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: false,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 15,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    },
                    1600: {
                        items: 4,
                    },
                },
            });
    }

    /*---product new arrival sec---*/
    var $newarrivalcarousel = $(".new-arrival-carousel");
    if ($newarrivalcarousel.length > 0) {
        $newarrivalcarousel
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: false,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 15,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    992: {
                        items: 4,
                    },
                    1200: {
                        items: 4,
                    },
                    1400: {
                        items: 4,
                    },
                    1600: {
                        items: 4,
                    },
                },
            });
    }
	 /*---subcategories sec---*/
    var $subcategoriescarousel = $(".subcategory-carousel");
    if ($subcategoriescarousel.length > 0) {
        $subcategoriescarousel
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: false,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 15,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    992: {
                        items: 4,
                    },
                    1200: {
                        items: 4,
                    },
                    1600: {
                        items: 4,
                    },
                },
            });
    }

    /*--- featured-product activation---*/
    var $featuredproduct = $(".featured-product");
    if ($featuredproduct.length > 0) {
        $featuredproduct
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: false,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 20,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    },
                    1600: {
                        items: 4,
                    },
                },
            });
    }

    /*---single product activation---*/
    $(".single-product-active").owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        autoplayTimeout: 8000,
        items: 4,
        rtl: false,
        margin: 15,
        dots: false,
        navText: [
            '<i class="fas fa-angle-left"></i>',
            '<i class="fas fa-angle-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            320: {
                items: 4,
            },
            992: {
                items: 4,
            },
            1200: {
                items: 4,
            },
        },
    });

    /*---quick_view activation---*/
    $(".quick_view_carousel").owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        autoplayTimeout: 8000,
        items: 4,
        rtl: false,
        margin: 15,
        dots: false,
        navText: [
            '<i class="fas fa-angle-left"></i>',
            '<i class="fas fa-angle-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            320: {
                items: 4,
            },
            992: {
                items: 4,
            },
            1200: {
                items: 4,
            },
        },
    });


    /*---product-detail featured-sec---*/
    var $profeatureddetail = $(".pro-featured-detail");
    if ($profeatureddetail.length > 0) {
        $(".pro-featured-detail")
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: true,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 1,
                rtl: false,
                stagePadding: 1,
                dots: false,
                margin: 20,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 1,
                    },
                    992: {
                        items: 1,
                    },
                },
            });
    }

    /*--- similar-product sec---*/
    var $similarprocarousel = $(".similar-pro-carousel");
    if ($similarprocarousel.length > 0) {
        $similarprocarousel
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: false,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 15,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    992: {
                        items: 4,
                    },
                    1200: {
                        items: 4,
                    },
                    1400: {
                        items: 4,
                    },
                    1600: {
                        items: 4,
                    },
                },
            });
    }

    /*--- team carousel sec---*/
    var $teamcarousel = $(".team-carousel");
    if ($teamcarousel.length > 0) {
        $teamcarousel
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: true,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 10,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    992: {
                        items: 4,
                    },
                    1200: {
                        items: 4,
                    },
                },
            });
    }

    /*--- testimonial sec---*/
    var $testimonial = $(".testimonial-active");
    if ($testimonial.length > 0) {
        $testimonial
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: true,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 10,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 2,
                    },
                    1200: {
                        items: 2,
                    },
                    1600: {
                        items: 3,
                    },
                },
            });
    }

    /*--- brand partners sec---*/
    var $brandpartners = $(".brand-logo-active-2");
    if ($brandpartners.length > 0) {
        $brandpartners
            .on(
                "changed.owl.carousel initialized.owl.carousel",
                function (event) {
                    $(event.target)
                        .find(".owl-item")
                        .removeClass("last")
                        .eq(event.item.index + event.page.size - 1)
                        .addClass("last");
                }
            )
            .owlCarousel({
                loop: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 3000,
                items: 3,
                rtl: false,
                dots: false,
                margin: 10,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    992: {
                        items: 4,
                    },
                    1200: {
                        items: 4,
                    },
                },
            });
    }

    /*--- quickview sec---*/
    var $productNavactive = $(".product_navactive");
    if ($productNavactive.length > 0) {
        $(".product_navactive").owlCarousel({
            loop: true,
            nav: true,
            autoplay: false,
            autoplayTimeout: 8000,
            items: 4,
            rtl: false,
            dots: false,
            navText: [
                '<i class="fas fa-angle-left"></i>',
                '<i class="fas fa-angle-right"></i>',
            ],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                250: {
                    items: 2,
                },
                480: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
            },
        });
    }




    $(".modal").on("shown.bs.modal", function (e) {
        $(".product_navactive").resize();
    });

    $(".product_navactive a").on("click", function (e) {
        e.preventDefault();

        var $href = $(this).attr("href");

        $(".product_navactive a").removeClass("active");
        $(this).addClass("active");

        $(".product-details-large .tab-pane").removeClass(
            "active show"
        );
        $(".product-details-large " + $href).addClass("active show");
    });
    /*---elevateZoom---*/

    $("#zoom1").elevateZoom({
        gallery: "gallery_01",
        responsive: true,
        cursor: "crosshair",
        zoomWindowWidth:200,
        zoomWindowHeight: 300,
        zoomType: "inner",


    });
      $(window).resize(function (e) {
        $(".zoomContainer").remove();
        $("#zoom1").elevateZoom({
            gallery: "gallery_01",
            responsive: true,
            zoomWindowWidth:200,
        zoomWindowHeight: 300,
        zoomType: "inner",
        });
    })



    /*---shop grid activation---*/
    $(".shop_toolbar_btn > button").on("click", function (e) {
        e.preventDefault();

        $(".shop_toolbar_btn > button").removeClass("active");
        $(this).addClass("active");

        var parentsDiv = $(".right_shop_content");
        var viewMode = $(this).data("role");

        parentsDiv.removeClass("grid-view list-view").addClass(viewMode);

        if (viewMode == "grid-view") {
            parentsDiv
                .children()
                .addClass("col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6")
                .removeClass("col-lg-4 col-cust-5 col-12");
        }

        if (viewMode == "list-view") {
            parentsDiv
                .children()
                .addClass("col-12")
                .removeClass("col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-cust-5");
        }
    });
    /*---slider-range here---*/


    //************** shop left toggle **************//

    $(".categories_title").on("click", function () {
        $(this).toggleClass("active");
        $(".header_categories_toggle").slideToggle("medium");
    });

    $(".sub_categories1 > a").on("click", function () {
        $(this).toggleClass("active");
        $(".dropdown_categories1").slideToggle("medium");
    });

    $(".sub_categories2 > a").on("click", function () {
        $(this).toggleClass("active");
        $(".dropdown_categories2").slideToggle("medium");
    });

    $(".sub_categories3 > a").on("click", function () {
        $(this).toggleClass("active");
        $(".dropdown_categories3").slideToggle("medium");
    });

    // faq
    $(".faq-content .collapse").on("show.bs.collapse", function () {
        var id = $(this).attr("id");
        $('a[href="#' + id + '"]')
            .closest(".panel-heading")
            .addClass("active-accordion");
        $('a[href="#' + id + '"] .panel-title span').html(
            '<i class="fas fa-minus"></i>'
        );
    });

    $(".faq-content .collapse").on("hide.bs.collapse", function () {
        var id = $(this).attr("id");
        $('a[href="#' + id + '"]')
            .closest(".panel-heading")
            .removeClass("active-accordion");
        $('a[href="#' + id + '"] .panel-title span').html(
            '<i class="fas fa-plus"></i>'
        );
    });

    /* ---- For Footer Start ---- */

    var $headingFooterhome3 = $("footer h3");
    $(window)
        .resize(function () {
            if ($(window).width() <= 768) {
                $headingFooterhome3.attr("data-toggle", "collapse");
            } else {
                $headingFooterhome3.removeAttr("data-toggle", "collapse");
            }
        })
        .resize();
    $headingFooterhome3.on("click", function () {
        $(this).toggleClass("opened");
    });

    $("#iconfooter3 h3").click(function () {
        $(this).next("ul").slideToggle(1000);
        $(this).find("em").toggleClass("fa-angle-down fa-angle-up");
    });
    /* ---- For Footer End ---- */
    $(function () {
        $("#logintTab")
            .find("a")
            .click(function (e) {
                e.preventDefault();
                $(this.hash).show().siblings().hide();
                $("#logintTab").find("a").parent().removeClass("active");
                $(this).parent().addClass("active");
            })
            .filter(":first")
            .click();
    });

    /*---mini cart activation---*/
    $(document).on('click','.mini_cart_wrapper > a', function () {
        $('.mini_cart,.mobile_overlay').addClass('active')
    });

    $(document).on('click','.mini_cart_close,.mobile_overlay', function () {
        $('.mini_cart,.mobile_overlay').removeClass('active')
    });


});

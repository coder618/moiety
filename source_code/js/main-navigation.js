jQuery(document).ready(function ($) {
    /** NAV */
    $(".main-nav-toggler").on("click", function () {
        // $(".main-nav-toggler").toggleClass("is-active");
        $("body").toggleClass("show-nav");
    });

    /** Set navbar height equal body padding-top */
    var navar_height = $(".main-navigation").outerHeight();
    $("body").css("padding-top", navar_height);

    // mobile dropdown toggle
    $(".main-navigation-menu.for-mobile a.dropdown-toggle").on(
        "click",
        function (e) {
            e.preventDefault();
            $(this)
                .parent("li")
                .toggleClass("show-dropdown");
        }
    );

    /** Remove height width parameter  in  wordpress given custom logo  */
    $(".custom-logo-link img")
        .removeAttr("width")
        .removeAttr("height");

    // Headroom INIT
    var headroom = new Headroom($(".main-navigation")[0]);
    headroom.init({
        // offset: 100,
        // scroll tolerance in px before state changes

        // or you can specify tolerance individually for up/down scroll
        tolerance: {
            up: 500,
            down: 0
        }
    });
});
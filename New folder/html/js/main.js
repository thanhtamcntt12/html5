$( document ).ready(function() {
   // Menu Left
    $('.head-menu').click(function(){
    var menu = $('.menu-left').find('a.active');
    var id_active = menu.attr('data-target');
    $(id_active).removeClass('in');
    menu.removeClass('active');
    $(this).addClass('active');
    });

    // Filer Bar
    $("#filter-hide").click(function(){
        if ($("#filter-base").is(":visible")) {
            $(".filter-icon").click(); 
        }
        $("#filter-content").hide();
        $("#grid_grid_rec_top").addClass("reset");
    });

    $("#close-filter ").click(function(){
        $(".filter-icon").click(); 
    });

    $("#show-filter").click(function(event){
        event.preventDefault();
        var is_filter_bar = $("#grid_grid_rec_top").hasClass("reset");
        if (is_filter_bar || !$("#filter-content").is(":visible")) {       
        $("#filter-content").show();
        $("#grid_grid_rec_top").removeClass("reset");
    }

    });

});
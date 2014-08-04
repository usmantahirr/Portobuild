$(document).ready(function() {
    $("a[rel=image_group]").fancybox({
        openEasing  : 'swing',
        closeEasing : 'swing',
        nextEasing  : 'swing',
        prevEasing  : 'swing',
        padding     : 5,
        afterLoad   : addLinks,
        beforeClose : removeLinks
    });
});

function addLinks() {
    var list = $("#links");    
    if (!list.length) {    
        list = $('<ul id="links">');
        for (var i = 0; i < this.group.length; i++) {
            $('<li data-index="' + i + '"><label></label></li>').click(function() { $.fancybox.jumpto( $(this).data('index'));}).appendTo( list );
        }   
        list.appendTo( 'body' );
    }
    list.find('li').removeClass('activeDot').eq( this.index ).addClass('activeDot');
}

function removeLinks() {
    $("#links").remove();
}

/* Side Bar Toggle Button */
function hideSidebar () {
  $("#side-bar").css("left","-230px");
  $("#main-container").css("margin-left","0px");
}

function showSidebar () {
  $("#side-bar").css("left","0px");
  $("#main-container").css("margin-left","230px");
}

$(".side-bar-toggle").click(function(event) {
  var dataToggle = $(this).data('toggle');
  if(dataToggle === 1) {
    hideSidebar();
    $(".side-bar-toggle").data('toggle', 0);
  } else if (dataToggle === 0) {
    showSidebar();
    $(".side-bar-toggle").data('toggle', 1);
  }
});
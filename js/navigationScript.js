jQuery(document).ready(function() {
    jQuery("a[rel=image_group]").fancybox({
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
    var list = jQuery("#links");    
    if (!list.length) {    
        list = jQuery('<ul id="links">');
        for (var i = 0; i < this.group.length; i++) {
            jQuery('<li data-index="' + i + '"><label></label></li>').click(function() { jQuery.fancybox.jumpto( jQuery(this).data('index'));}).appendTo( list );
        }   
        list.appendTo( 'body' );
    }
    list.find('li').removeClass('activeDot').eq( this.index ).addClass('activeDot');
}

function removeLinks() {
    jQuery("#links").remove();
}

/* Side Bar Toggle Button */
function hideSidebar () {
  jQuery("#side-bar").css("left","-230px");
  jQuery("#main-container").css("margin-left","0px");
}

function showSidebar () {
  jQuery("#side-bar").css("left","0px");
  jQuery("#main-container").css("margin-left","230px");
}

jQuery(".side-bar-toggle").click(function(event) {
  var dataToggle = jQuery(this).data('toggle');
  if(dataToggle === 1) {
    hideSidebar();
    jQuery(".side-bar-toggle").data('toggle', 0);
  } else if (dataToggle === 0) {
    showSidebar();
    jQuery(".side-bar-toggle").data('toggle', 1);
  }
});
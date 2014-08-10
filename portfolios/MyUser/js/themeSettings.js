$(document).ready(function() {
    $("a[rel=fancybox]").fancybox({
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



/* Angular Settings */

var themeDataLoad = angular.module('SideMenuTheme', []);

themeDataLoad.controller('UserController', ['$scope', '$http', function($scope, $http) {
  $http.get('../../admin/data/user.json').success(function(data) {
    $scope.user = data;
  });
}]);

themeDataLoad.controller('GalleryController', ['$scope', '$http', function($scope, $http) {
  $http.get('../../admin/data/gallery.json').success(function(data) {
    $scope.galleryImages = data;
  });
}]);
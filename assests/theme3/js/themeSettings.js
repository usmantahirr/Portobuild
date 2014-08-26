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
var themeDataLoad = angular.module('SideMenuTheme', []).directive('onFinishRender', function ($timeout) {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
            if (scope.$last === true) {
                $timeout(function () {
                    scope.$emit('ngRepeatFinished');
                });
            }
        }
    }
});

themeDataLoad.controller('UserController', ['$scope', '$http', function($scope, $http) {
  $http.get('http://portobuild.dev/theme/get_details/khalid').success(function(data) {
    $scope.user = data;
  });
}]);

themeDataLoad.controller('GalleryController', ['$scope', '$http', function($scope, $http) {
  $http.get('http://portobuild.dev/api/myfeed_by_username/json/khalid').success(function(data) {
    $scope.galleryData = data;
    $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
        $( function() {
            $( '#gallery' ).jGallery( {
                'mode': 'standard'
            } );
        } );
    });
  });
}]);


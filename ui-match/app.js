/**
 * Created by Julius Alvarado on 5/23/2020.
 */

(function(){
    "use strict";

    // , 'material.svgAssetsCache'
    angular.module('hackMatchCloudApp', ['ngMaterial', 'ngMessages', 'ngMdIcons', 'ngSanitize']);

    let app = angular.module('hackMatchCloudApp');
    app.controller('MatchCtrl', ['$scope', '$mdDialog', MatchClass]);

    function MatchClass($scope, $mdDialog) {
        $scope.status = 'Wired up to AngularJS 1.7';
        $scope.data = {};

        // looking for view
        $scope.data.account = true;
        $scope.data.coding = false;
        $scope.data.mentor = false;
        $scope.data.mentee = false;
        $scope.data.openSource = false;
        $scope.data.contributors = false;
        $scope.other = false;

        $scope.s_imgPath = '/img/hack-match300.png'
        let r = Math.floor(Math.random() * (16 - 1)) + 1;
        $scope.s_avatarImg = `/img/avatars/a${r}.png`;

        // contact info view
        $scope.showHints = true;

        $scope.scMatchCtrl_showModal = function(ev) {
            $mdDialog.show({
                contentElement: '#ja-side-node',
                parent: angular.element(document.body),
                targetEvent: ev,
                clickOutsideToClose: true
            });
        };

        $scope.scMatchCtrl_listItem = function(ev) {
          console.log('Just a neat effect.');
        };
    }

})();
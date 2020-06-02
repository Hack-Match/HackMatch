/**
 * Created by Julius Alvarado on 5/23/2020.
 */

"use strict";

// , 'material.svgAssetsCache'
angular.module('cbConnectApp', ['ngMaterial', 'ngMessages', 'ngMdIcons']);

angular.module('cbConnectApp').controller('MatchCtrl', ['$scope', MatchClass]);

function MatchClass($scope) {
    $scope.status = 'Wired up to AngularJS 1.6';
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
    let r = Math.floor(Math.random() * (16-1)) + 1;
    $scope.s_avatarImg = `/img/avatars/a${r}.png`;

    // contact info view
    $scope.showHints = true;
}
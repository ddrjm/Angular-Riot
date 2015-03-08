var app = angular.module("LeagueStats", []);

app.controller('appController', handleAppController);

function handleAppController($scope, $http) {
    $scope.summonerSpells ={
            '21': 'SummonerBarrier',
            '1': 'SummonerBoost',
            '2': 'SummonerClairvoyance',
            '14': 'SummonerDot',
            '3': 'SummonerExhaust',
            '4': 'SummonerFlash',
            '6': 'SummonerHaste',
            '7': 'SummonerHeal',
            '13': 'SummonerMana',
            '17': 'SummonerOdinGarrison',
            '10': 'SummonerRevive',
            '11': 'SummonerSmite',
            '12': 'SummonerTeleport'
        };
        
    $scope.getData = function () {
        console.log("clicked!");
        $http.get("./api/featured")
                .success(function (response) {
                    $scope.data = response;
                });
       /* $http.get("./api/ddragon/summonerSpells")
                .success(function (response) {
                    result = angular.fromJson(response.data);
                    $scope.spellData = result;
                });*/
    };

}



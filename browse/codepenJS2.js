//angular.module('starter', ['ionic', 'ionic.contrib.ui.tinderCards2'])


var cardTypes;

cardTypes = [{ image: 'http://c1.staticflickr.com/1/421/19046467146_548ed09e19_n.jpg', name: 'dog' }];

var wait = 1;

var loggedID;

//promise

/*
var getProfiles = function() {
	
xmlhttp = new XMLHttpRequest();
console.log("before stuff");	
	//new stuff
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
				var myStr = JSON.parse(this.responseText);
	
				console.log(myStr);
				//console.log(myStr[name]);

				
				//trying something
				
				cardTypes = myStr;
				console.log(cardTypes);
				
				wait = 0;
				
				return(cardTypes);
	
  
            }
    };
	
xmlhttp.open("GET","getuser.php?",true);
xmlhttp.send();

}
*/


xmlhttp = new XMLHttpRequest();
console.log("before stuff");	
	//new stuff
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
				var myStr = JSON.parse(this.responseText);
				//var myStr = this.responseText;
	
				console.log(myStr);
				//console.log(myStr[name]);

				
				//trying something
				
				cardTypes = myStr;
				console.log(cardTypes);
				
				wait = 0;
				
				//return(cardTypes);
	
  
            }
    };
	
xmlhttp.open("GET","getuser.php?",true);
xmlhttp.send();


function tellMe(){
	
	console.log("in body");
	//$.ajax({url:"sessionGet.php", success: gotSess});
	
	$.ajax({url: "sessionGet.php", success: function(result){
        loggedID = result;
        console.log(loggedID);
    }});
}

function gotSess(sessIn){
  
  loggedID = sessIn;
  //loggedID = 5;
  console.log(loggedID);
  
  
}



/*
while(wait == 1)
{
	
}
*/


var ionicApp = angular.module('starter', ['ionic', 'ionic.contrib.ui.tinderCards2'])

//trying document ready
//$(document).ready(function() {
	//console.log("in document ready");
	
	
//var ionicApp = angular.module('starter', ['ionic', 'ionic.contrib.ui.tinderCards2'])


/*
ionic.Platform.ready(function(){
	console.log("in platform ready");
	//angular.bootstrap(document.body, ['starter']);
  // ajax call and other stuff
  
  
  xmlhttp = new XMLHttpRequest();
  //console.log("in platform ready");	
	//new stuff
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
				var myStr = JSON.parse(this.responseText);
	
				console.log(myStr);
				//console.log(myStr[name]);

				
				//trying something
				
				cardTypes = myStr;
				console.log(cardTypes);
				
				wait = 0;
				
				//return(cardTypes);
	
				angular.bootstrap(document.body, ['starter']);
            }
    };
	
xmlhttp.open("GET","getuser.php?",true);
xmlhttp.send();


  //angular.bootstrap(document.body, ['starter']);
})

*/

ionicApp.config(function($stateProvider, $urlRouterProvider) {

console.log("dafug");	

})


ionicApp.directive('noScroll', function($document) {

  return {
    restrict: 'A',
    link: function($scope, $element, $attr) {

      $document.on('touchmove', function(e) {
        e.preventDefault();
      });
    }
  }
})

.controller('CardsCtrl', function($scope, TDCardDelegate, $timeout, $http) {
				
				//var cardTypes = myStr;
				
				/*
					var cardTypes = [
    { image: 'http://c4.staticflickr.com/4/3924/18886530069_840bc7d2a5_n.jpg', name: 'This first step in this test case will be to have a logged in user look at another profile. At this point the system should check to see if the user has judged the profile previously. If it has then it should display what the user had previously judged the profile. If there is an error at this point, the system will show the user that there was an error retrieving previous judgement data.' },
    { image: 'http://c1.staticflickr.com/1/421/19046467146_548ed09e19_n.jpg', name: 'dog' },
    { image: 'http://c1.staticflickr.com/1/278/18452005203_a3bd2d7938_n.jpg' },
    { image: 'http://c1.staticflickr.com/1/297/19072713565_be3113bc67_n.jpg' },
    { image: 'http://c1.staticflickr.com/1/536/19072713515_5961d52357_n.jpg' },
    { image: 'http://c4.staticflickr.com/4/3937/19072713775_156a560e09_n.jpg' },
    { image: 'http://c1.staticflickr.com/1/267/19067097362_14d8ed9389_n.jpg' }
  ];
*/


  console.log("in controller");
  
  $http.get("getuser.php")
    .then(function (response) 
	
	{
	$scope.cards = {
    master: Array.prototype.slice.call(cardTypes, 0),
    active: Array.prototype.slice.call(cardTypes, 0),
    discards: [],
    liked: [],
    disliked: []
	}
  });
  
  
  
  /*
  var cardTypes;

cardTypes = [{ image: 'http://c1.staticflickr.com/1/421/19046467146_548ed09e19_n.jpg', name: 'dog' }];

var wait = 1;

xmlhttp = new XMLHttpRequest();
	
	//new stuff
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
				var myStr = JSON.parse(this.responseText);
	
				console.log(myStr);
				//console.log(myStr[name]);

				
				//trying something
				
				cardTypes = myStr;
				console.log(cardTypes);
				
				wait = 0;
				
	
  
            }
    };
	
xmlhttp.open("GET","getuser.php?",true);
xmlhttp.send();
*/

/*
  $scope.cards = {
    master: Array.prototype.slice.call(cardTypes, 0),
    active: Array.prototype.slice.call(cardTypes, 0),
    discards: [],
    liked: [],
    disliked: []
  }
  */
 

  $scope.cardDestroyed = function(index) {
    $scope.cards.active.splice(index, 1);
  };

  $scope.addCard = function() {
    var newCard = cardTypes[0];
    $scope.cards.active.push(angular.extend({}, newCard));
  }

	
  			
			
  $scope.refreshCards = function() {
    // Set $scope.cards to null so that directive reloads
    $scope.cards.active = null;
    $timeout(function() {
      $scope.cards.active = Array.prototype.slice.call($scope.cards.master, 0);
    });
  }

  $scope.$on('removeCard', function(event, element, card) {
    var discarded = $scope.cards.master.splice($scope.cards.master.indexOf(card), 1);
    $scope.cards.discards.push(discarded);
  });

  $scope.cardSwipedLeft = function(index) {
    console.log('LEFT SWIPE');
    var card = $scope.cards.active[index];
    $scope.cards.disliked.push(card);
  };
  $scope.cardSwipedRight = function(index) {
    console.log('RIGHT SWIPE');
    console.log(loggedID);
    var card = $scope.cards.active[index];
    $scope.cards.liked.push(card);
	
	//console.log($scope.cards);
	console.log(card.name);
	
	var str = card.name;
	
	obj = { "uName":"test", "liked":card.name };
	dbParam = JSON.stringify(obj);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("done");
				document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
	//xmlhttp.open("GET", "updateLikes.php?q=" + str, true);
	xmlhttp.open("GET", "updateLikes.php?x=" + dbParam, true);
	//xmlhttp.open("GET","updateLikes.php?",true);
    xmlhttp.send();

  };
  
//um dafug is this
})

.controller('CardCtrl', function($scope, TDCardDelegate) {

console.log("shit");

});

//});
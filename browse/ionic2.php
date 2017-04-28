

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

  <title>Ionic Tinder Cards 2</title>

    <link href="http://code.ionicframework.com/nightly/css/ionic.css" rel="stylesheet">
    <script src="http://code.ionicframework.com/nightly/js/ionic.bundle.js"></script>

    <script src="http://code.ionicframework.com/collide/0.0.4/collide.js"></script>
    <script src="http://www.loringdodge.com/files/ionic.tdcards2.js"></script>
    <script src="codepenJS2.js"></script>
    <link href="codepenCSS2.css" rel="stylesheet">

</head>

<body ng-app="starter" no-scroll>
<?php
ini_set('display_errors', 1);
$servername = "dogfordog.cyorizcugugl.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "dogfordog";
$dbname ="dogfordog";
$port = "3306";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
    <ion-pane ng-controller="CardsCtrl" class="background-grey">
      <ion-header-bar class="bar-default">
        <h1 class="title">TD Cards 2</h1>
      </ion-header-bar>

      <div class="td-title">
	  <div id="txtHint"><b>Person info will be listed here...</b></div>
        <div class="row">
          <div class="col">Master: <span>{{ cards.master.length }}</span></div>
          <div class="col">Cards: <span>{{ cards.active.length }}</span></div>
          <div class="col">Discards: <span>{{ cards.discards.length }}</span></div>
        </div>
        <div class="row">
          <div class="col">Liked: <span>{{ cards.liked.length }}</span></div>
          <div class="col">Disliked: <span>{{ cards.disliked.length }}</span></div>
        </div>
      </div>


      <!-- *************************
        TD Cards
        - We start off with an ng-if so that the cards are not generated
          unless $scope.cards is not 'null'
      ************************* -->
      <div ng-if="cards.active">
        <td-cards>
          <td-card ng-repeat="card in cards.active" on-destroy="cardDestroyed($index)" on-swipe-left="cardSwipedLeft($index)" on-swipe-right="cardSwipedRight($index)">
            <div class="image" ng-controller="CardCtrl">
              <div class="no-text"><i class="icon ion-thumbsdown"></i></div>
              <div class="yes-text"><i class="icon ion-thumbsup"></i></div>
              <!-- *************************
                Discard
                - The card is removed from the deck and a fly away animation is triggered.
                - onClickTransitionOut is found in ionic.tdcards.js
                - Animation can be customized by changing defaults
              ************************* -->
              <div class="discard" ng-click="onClickTransitionOut(card)">DISCARD</div>
              <img ng-src="{{ card.image }}">
			  <p>{{ card.thingy }}"</p>
            </div>
          </td-card>
          <!-- *************************
            End Card
            - 'drag' is set to false. The user cannot drag it.
            - 'refreshCards()' reloads all cards that have NOT been discarded.
          ************************* -->
          <td-card id="end-card" drag="false">
            <i class="icon ion-ios-refresh disable-user-behavior" ng-click="refreshCards()"></i>
          </td-card>
        </td-cards>
      </div>

    </ion-pane>
	
  </body>

</html>

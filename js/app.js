/**
 * Main AngularJS Web Application
 */
(function () {
    var app = angular.module('MATMapp', ['ngRoute', 'ui.bootstrap']);
	console.log("You are at line 6 in appJS");
    /**
     * Configure the Routes
     */
    app.config(configuration);

    function configuration($routeProvider) {
        $routeProvider
            .when("/", {
                templateUrl: "partials/home.html"
            })
            .when("/about", {
                templateUrl: "partials/about.html",
            })
            .when("/devos", {
                templateUrl: "partials/devos.html"
            })
            .when("/chat", {
                templateUrl: "partials/chat.html"
            })
            .when("/resources", {
                templateUrl: "partials/resources.html"
            })
            .when("/message/:type", {
                templateUrl: "partials/message.html",
                controller: "MessageController",
                controllerAs: "model"
             })
            .when("/support", {
                templateUrl: "partials/support.html"
            })
            .otherwise({
                redirectTo: "/"
            });
    }

    /**
     * Directive for the scroll position
     */
    app.directive("scroll", function ($window) {
        return function(scope, element, attrs) {
            angular.element($window).bind("scroll", function() {
                scope.scrollPos = this.pageYOffset;
                scope.$apply();
            });
        };
    });

    /**
     * Controller for the pages
     */

    app.controller('PageCtrl', pageCtrl);
    app.controller('MessageController', messageController);
	
    function pageCtrl($scope, $location,$window, $anchorScroll, $http, $sce) {
        $scope.scrollPos = 0;
		$scope.load = true;	
		$scope.loghome = false;
		$scope.supthome = true;
		$scope.suptttl = "Welcome to MYLC Support";
		$scope.suptsub = "We are here to help!";
		$scope.logmail = "";
		
        //scroll to section_id
        //$scope.scrollTo = function(id) {
        //    var old = $location.hash();
        //    $location.hash(id);
        //    $anchorScroll();
        //    //reset to old to keep any additional routing logic from kicking in
        //    $location.hash(old);
        //};

        $scope.scrollTo = function(eID) {
                // This scrolling function
                // is from http://www.itnewb.com/tutorial/Creating-the-Smooth-Scroll-Effect-with-JavaScript

				if (eID == "present") $scope.showpresent = true;
				else if (eID == "attend") $scope.showattend = true;
                var startY = currentYPosition();
                var stopY = elmYPosition(eID);
				console.log("Stop Y position is ["+stopY+"]");
                var distance = stopY > startY ? stopY - startY : startY - stopY;
                if (distance < 100) {
                    scrollTo(0, stopY); return;
                }
                var speed = Math.round(distance / 100);
                if (speed >= 20) speed = 20;
                var step = Math.round(distance / 25);
                var leapY = stopY > startY ? startY + step : startY - step;
                var timer = 0;
                if (stopY > startY) {
                    for ( var i=startY; i<stopY; i+=step ) {
                        setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
                        leapY += step; if (leapY > stopY) leapY = stopY; timer++;
                    } return;
                }
                for ( var i=startY; i>stopY; i-=step ) {
                    setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
                    leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
                }

                function currentYPosition() {
                    // Firefox, Chrome, Opera, Safari
                    if (self.pageYOffset) return self.pageYOffset;
                    // Internet Explorer 6 - standards mode
                    if (document.documentElement && document.documentElement.scrollTop)
                        return document.documentElement.scrollTop;
                    // Internet Explorer 6, 7 and 8
                    if (document.body.scrollTop) return document.body.scrollTop;
                    return 0;
                }

                function elmYPosition(eID) {
					
                    var elm = document.getElementById(eID);
					if (elm == null) {  
						alert("You do not have destination ID defined for passed ID Value ["+eID+"]");	
						eID = "header";
						var elm = document.getElementById(eID); 
						// this assumes you have header defined as an ID somewhere
					  } 
                    var y = elm.offsetTop;
                    var node = elm;
                    while (node.offsetParent && node.offsetParent != document.body) {
                        node = node.offsetParent;
                        y += node.offsetTop;
                    } return y;
                }

        };


		
        //render html code
        $scope.renderHtml = function (html_code) {
            return $sce.trustAsHtml(html_code);
        };

        //show or hide the jumbotron
        $scope.checkURl = function () {
            if ($location.url() == '/' || $location.url().indexOf('/#') > -1) return true;
            return false;
        };

        //footer class
        $scope.checkURlForFooter = function(){
            //console.log($window);
			return false;	
            // if($location.url().indexOf('message') > -1 && $window.innerWidth > 450) return true;
            // return false;
        }

        $scope.$on('$locationChangeStart', function(event) {
            $scope.checkbg = ! $scope.checkURl();
            //navigation highlight
            $scope.location = $location.url();
			$scope.load = true;
        });

		// things to declare at loading
		$scope.headTtl = "Minute at the Mic";
		$scope.subHead = "T-minus 60 seconds and counting...";
		$scope.whichbar = "header";
		$scope.whichbar = "templates/header.html";
		$scope.showpresent = false;
		$scope.showattend = false;
		
		//form: learnFm supFm stoFm actFm shrFm
        $scope.EMAIL_PATTERN = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
		$scope.SIXDIGIT = /^[0-9]*$/;

        $scope.submitFm = function (usr) {
			var api = "direct.php";
			var upa = usr.post_actions; // shortcut
			console.log("You are at submit Form with UPA ["+upa+"] and API ["+api+"] and user:");
			console.log(usr);
			$http.post(api, usr)
                .success(function (res) {
                    if (res.success) {
						console.log(res);
                        if(upa == "joinacts") $scope.msg = res.msg; //done
                        else if(upa == "radioacts") $scope.msg = res.msg; // done
                        else if(upa == "howdoacts") $scope.msg = res.msg;  // done
                        else if(upa == "youvrsn") $scope.msg = res.msg; //done
                        else if(upa == "gogl") $scope.msg = res.msg; //done			
                        else if(upa == "resend") $scope.msg = res.msg; //done (BUT NOT WORKING!!!)
						else if(upa == "status") $scope.msg = res.msg; //done 
                        else if(upa == "support") { $scope.supmsg = res.msg; $scope.supthome = false; } //done
						else if(upa == "login") { //done
							console.log(res);
							$scope.loglink = true; 
							$scope.loghome = false;
							$scope.logmail = res.user.email;
							$scope.suptttl = "MYLC Verification Code";
							$scope.suptsub = "Enter the six-digit verification code that was just sent to your email.";
						}
                        else if(upa == "story") $scope.stomsg = res.msg; // done
                        else if(upa == "actplan") $scope.actmsg = res.msg; //done 
                        else if(upa == "shre") $scope.shrmsg = res.msg;  //done
						else if(upa == "quikebk") $scope.msg = res.msg; //done
						else { 
							console.log("Undefined Post actions ["+upa+"]");
							console.log(res);
						}
                    } else {
                        console.log(res);
						if (upa == "actplan" || upa == "shre") {
							alert ("We are sorry, but there was an error and your entry did NOT GET RECORDED into our database. Code ap.242");
							// var rstrt = "https://makingyourlifecount.org/#/message/"+upa;
							var msg = "<b>The reason for the failure is</b>: "+res.msg+"<br /><br />"+
							   "Please <b>try again</b> by using this restart link.<br /><br />"+
							   "<a href=\"javascript:location.reload(true)\"><button class=\"btn btn-primary btn-xl\">Restart Entry</button></a>";
							$scope.actmsg = $scope.shrmsg = msg;
						} // actplan or shre
						else {
                        	console.log("You are at Failure 207");
							alert ("We are sorry, but your ("+upa+") information did not correctly POST to our database. Code ap.244");
						} 

                    }
                });

        };
    } // end of page Control

    function messageController($routeParams) {
        var vm = this;
        vm.type = $routeParams.type;
        //console.log(vm.type)
    }

})();

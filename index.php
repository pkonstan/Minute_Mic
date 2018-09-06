<?php

// index.php
/*
|---------------------------------------------------------------------------------------|
|  Software: CORE Software						        									|
|   Version: 3.1 -- February 2017																       	|
|   Contact: via intre.org support pages 												|
|   Info: http://help.intre.org        													|
|     Support: http://www.intre.org/index.php?a=help    								|
|---------------------------------------------------------------------------------------|
|   Author: Campus Crusade for Christ, President's Office    							|
|	Copyright (c) 2004-2012 															|
|	Integrated Resources, A Division of Campus Crusade for Christ, Inc. 				|
|	All rights reserved. 																|
|---------------------------------------------------------------------------------------|
|   Distributed under the EventCORE License Agreement (ECLA)     						|
|    http://help.intre.org/questions.php?questionid=179     							|
| 	This program is deployed on approved/contracted servers that must be officially 	|
| 	registered with Campus Crusade for Christ.  Failure to comply is a violation of the	|
| 	ECLA and may result in legal action.        										|
|---------------------------------------------------------------------------------------|
|----------------------------------------------------------------------------------
*/ 

?>
<!DOCTYPE html>
<html lang="en" ng-app="MATMapp">
<!-- AS a model for the four points... http://www.videobrewery.com/ -->

<head>
<? include("templates/mainhead.php"); ?>

    <!-- Custom CSS
    ========================================================= -->
    <link rel="stylesheet" href="css/diagonals.css" type="text/css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-73062298-1', 'auto');
        ga('send', 'pageview');

    </script>


</head>

<body id="page-top" ng-controller="PageCtrl">
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NF7RH9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF7RH9');</script>
<!-- End Google Tag Manager-->

<!-- header.html = menus || hidebar.html = no menu bar || logobar.php = only logo in bar -->
<div ng-include="'templates/hidebar.html'"></div>
<header ng-if="checkURl()" id="header">
    <div class="header-content">
        <div class="header-content-inner">
            <h4>{{headTtl}}</h4>
            <br/>
            <span class="h2"><strong>{{subHead}}</strong></span>
            <hr>
            <a href="" ng-click="scrollTo('attendee')" class="btn btn-primary btn-xl tada page-scroll">Attendee<i class="fa fa-arrow-down"></i></a>
			&nbsp;
			<a href="" ng-click="scrollTo('present')" class="btn btn-primary btn-xl tada page-scroll">Presenter<i class="fa fa-arrow-down"></i></a>
			
		</div>
    </div>
</header>
<div class="wrap" ng-cloak>
	<div ng-view></div>
	<div ng-include="'templates/footer.html'"></div>
</div>

<!-- Modernizer Javascript -->
<script src="js/modernizr.custom.js"></script>

<!-- Plugin JavaScript -->
<script src="js/wow.min.js"></script>
<script>
	new WOW().init();
</script>

<!--AngularJS
========================================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10607/angular-spinners.js"></script>
<script src="js/ui-bootstrap-tpls-1.3.2.min.js"></script>

<!--Custom AngularJS-->
<script src="js/app.js"></script>

</body>
</html>
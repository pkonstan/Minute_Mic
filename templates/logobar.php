<nav id="mainNav" class="navbar navbar-default navbar-fixed-top"
     ng-class="{'affix-top': scrollPos < 100, 'affix': scrollPos >100}" scroll>
    <div class="container-fluid" ng-class="{'bg-primary' : checkbg}" >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand " href="/" ng-click="scrollTo('mainNav')"> Making Your Life Count</a>
        </div>
    </div>
</nav>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- Styles -->
        <link rel="stylesheet" href="assets/css/main.css">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .md-demo {
                font-family: 'Roboto', sans-serif;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <example title="123">Directive not loaded.</example>
                <example2 title="123">Directive not loaded.</example2>

                    <md-content class="md-demo">
                        <h1>Material Design Demo</h1>
                        <section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
                            <md-button class="md-raised">Button</md-button>
                            <md-button class="md-raised md-primary">Primary</md-button>
                            <md-button ng-disabled="true" class="md-raised md-primary">Disabled</md-button>
                            <md-button class="md-raised md-warn">Warn</md-button>
                            <div class="label">Raised</div>
                        </section>

                        <section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
                            <md-button class="md-fab" aria-label="Eat cake">
                                <md-icon>cake</md-icon>
                            </md-button>

                            <md-button class="md-fab md-primary" aria-label="Use Android">
                                <md-icon>android</md-icon>
                            </md-button>

                            <md-button class="md-fab" ng-disabled="true" aria-label="Comment">
                                <md-icon>comment</md-icon>
                            </md-button>

                            <md-button class="md-fab md-primary md-hue-2" aria-label="Profile">
                                <md-icon>people</md-icon>
                            </md-button>

                            <md-button class="md-fab md-mini" aria-label="Eat cake">
                                <md-icon>cake</md-icon>
                            </md-button>

                            <md-button class="md-fab md-mini md-primary" aria-label="Use Android">
                                <md-icon style="color: greenyellow;">android</md-icon>
                            </md-button>
                            <div class="label">FAB</div>
                        </section>

                        <section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
                            <md-button class="md-primary md-hue-1">Primary Hue 1</md-button>
                            <md-button class="md-warn md-raised md-hue-2">Warn Hue 2</md-button>
                            <md-button class="md-accent">Accent</md-button>
                            <md-button class="md-accent md-raised md-hue-1">Accent Hue 1</md-button>
                            <div class="label">Themed</div>
                        </section>

                        <section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
                            <md-button class="md-icon-button md-primary" aria-label="Settings">
                                <md-icon md-font-icon="menu">menu</md-icon>
                            </md-button>
                            <md-button class="md-icon-button md-accent" aria-label="Favorite">
                                <md-icon md-font-icon="favorite">favorite</md-icon>
                            </md-button>
                            <md-button class="md-icon-button" aria-label="More">
                                <md-icon md-font-icon="more_vert">more_vert</md-icon>
                            </md-button>
                            <md-button href="http://google.com"
                                       title="Launch Google.com in new window"
                                       target="_blank"
                                       ng-disabled="true"
                                       aria-label="Google.com"
                                       class="md-icon-button launch" >
                                <md-icon md-font-icon="launch">launch</md-icon>
                            </md-button>
                            <div class="label">Icon Button</div>
                        </section>
                    </md-content>

            </div>
        </div>
        <script src="assets/js/main.js"></script>
    </body>
</html>

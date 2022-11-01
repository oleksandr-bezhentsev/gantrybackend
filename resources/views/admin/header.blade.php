<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/assets/css/demo.css">
</head>
<body>
<?php
$link = $_SERVER['REQUEST_URI'];

$link = explode('/', $link);
if (isset($link[3])) {
    $last_link = $link[3];
} else {
    $last_link = '';
}
if (isset($link[2])) {
    $link = $link[2];
} else {
    $link = '';
}
?>
@if(auth()->user())
    <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar bg-dark">
        <a href="/admin/" class="navbar-brand mr-0 mr-md-2 logo">
            Admin Panel
        </a>

        <div class="navbar-nav-scroll">
            <ul class="navbar-nav bd-navbar-nav flex-row">
                @if(auth()->user()->superadmin == 1)
                <li class="nav-item <?php if($link == 'video') { ?>active<?php } ?>">
                    <a class="nav-link " href="/admin/video/">
                        Videos
                    </a>
                </li>
                <li class="nav-item <?php if($link == 'users') { ?>active<?php } ?>">
                    <a class="nav-link " href="/admin/users/">
                        Users
                    </a>
                </li>
                @else

                <li class="nav-item <?php if($link == 'subscriptions') { ?>active<?php } ?>">
                    <a class="nav-link " href="/admin/subscriptions/">
                        Subscriptions
                    </a>
                </li>

                    <li class="nav-item <?php if($link == 'library') { ?>active<?php } ?>">
                        <a class="nav-link " href="/admin/library/">
                            Library
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item dropdown show">
                <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="la la-user" style="font-size: 25px; position: relative; top: 4px; left: 8px;"></i>
                <?= auth()->user()->name; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right show" aria-labelledby="bd-versions">
                    <a href="/admin/profile/" class="dropdown-item">Edit Profile</a>
                    <a class="dropdown-item" style="cursor: pointer;" href="/admin/tokens"><i
                                class="fa fa-power-off"></i> Regenerate API Token</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" style="cursor: pointer;" href="/admin/logout/"><i
                                class="fa fa-power-off"></i> Logout</a>
                </div>
            </li>
        </ul>
    </header>

@endif
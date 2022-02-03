<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PRVM FASOKO | <?= $titles; ?> </title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"><?= $_SESSION['login']; ?></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="/Logout">Déconnexion</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            PRVM
                        </div>
                    </li>
                    <li>
                        <a href="/"><i class="fa fa-home"></i> <span class="nav-label">Accueil</span></a>
                    </li>
                    <li>
                        <a href="/dashboard"><i class="fa fa-user"></i> <span class="nav-label">Membres</span></a>
                    </li>
                    <li>
                        <a href="/locaux"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Locaux/Sièges</span></a>
                    </li>
                    <li>
                        <a href="/dossiers"><i class="fa fa-folder"></i> <span class="nav-label">Dossiers</span></a>
                    </li>
                    <li>
                        <a href="/activites"><i class="fa fa-th-large"></i> <span class="nav-label">Activités</span>
                        </a>
                    </li>

                    <li>
                        <a href="/tresorerie"><i class="fa fa-th-large"></i> <span class="nav-label">Trésorerie</span>
                        </a>
                    </li>
                    <li>
                        <a href="/bureau"><i class="fa fa-th-large"></i> <span class="nav-label">Bureau</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rapport"><i class="fa fa-th-large"></i> <span class="nav-label">Rapports &
                                Statistiques</span>
                        </a>
                    </li>

                    <li>
                        <a href="/config"><i class="fa fa-cog"></i> <span class="nav-label">Config</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="#">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="/Logout">
                                <i class="fa fa-sign-out"></i>Déconnexion
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $content; ?>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                    PRVM <strong>FASOKO</strong> V1.0
                </div>
                <div>
                    <strong>COPYRIGHT</strong> PRVM FASOKO&copy; <?= date('Y'); ?>
                </div>
            </div>

        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });
    });
    </script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>



    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js "></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


</body>

</html>
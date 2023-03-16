<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/mangas.css') !!}
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/monStyle.css') !!}

</head>
<body class="body">
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar+ bvn"></span>
                </button>
                <a class="navbar-brand" href="">GSB Frais</a>
            </div>
            @if(Session::get('id')==0)
            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="getlogin" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                </ul>
            </div>
            @endif

            @if(Session::get('id')>0)
            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                <ul class="nav navbar-nav">
                    <li><a href="/plasse/ProjetGSBSpecialite/public/getListePraticiens" data-toggle="collapse" data-target=".navbar-collapse.in">Liste des praticiens</a></li>
                    <li><a href="ajouterFrais" data-toggle="collapse" data-target=".navbar-collapse.in">Rechercher un praticien</a></li>
                    <li><a href="ajouterFrais" data-toggle="collapse" data-target=".navbar-collapse.in">Ajout d'une spécialiter à un praticien</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="getLogout" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                </ul>
            </div>
            @endif
            </div><!--/.container-fluid -->
    </nav>
</div>

<div class="container">
       <h1 class="bvn">Gestion des spécialité de praticiens de la société GSB</h1>
    <br/>
    <br/>
    @yield('content')

</div>
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/jquery-2.1.3.min.js')  !!}
{!! Html::script('assets/js/ui-bootstrap-tpls.js')  !!}
{!! Html::script('assets/js/bootstrap.js')  !!}
</body>
</html>

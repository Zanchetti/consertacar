<?php
require_once './model/Veiculo.php';
require_once './model/DaoVeiculo.php';
require_once './control/ControlVeiculo.php';
require_once './model/Revisao.php';
require_once './model/DaoRevisao.php';
require_once './control/ControlRevisoes.php';

$control = new ControlRevisoes();
$controlVeiculo = new ControlVeiculo();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($control->inserir($_POST['data'], $_POST['km'], $_POST['id_veiculo'])) {
        $mensagem = "Revisão gravada com sucesso!!";
        $alerta = "";
        foreach ($control->getAlerta() as $a) {
            $alerta = $alerta . $a . "<br />";
        }
        unset($_POST);
    } else {
        $erros = "";
        foreach ($control->getErros() as $e) {
            $erros = $erros . $e . "<br />";
        }
    }
}

$veiculos = $controlVeiculo->listar();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Gerenciamento de Conteúdo</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <script src="js/bootbox.js"></script>
        <script src="js/lumino.glyphs.js"></script>      
        <script src="js/jquery-maskedinput.min.js"></script>      
        <script src="js/mascaras.js"></script>      
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">ConsertaCar</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span class="nome_usuario">Usuário Logado </span><span class="caret"></span>                                    
                            </a>
                            <ul class="dropdown-menu" role="menu">                                
                                <li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php include './menu.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">            
            <div id="carregando">
                Carregando...                        
            </div>
            <div id="conteudo">               

                <div class="row">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                        <li class="active">Revisão</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Revisão</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <form action="" method="POST" id="form">
                                <div class="panel-heading">                
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Gravar o registro" data-placement="auto"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Gravar</button>
                                    <button type="button" class="btn btn-primary voltar" data-toggle="tooltip" title="Voltar para a listagem" data-placement="auto"><svg class="glyph stroked arrow left"><use xlink:href="#stroked-arrow-left"/></svg> Voltar</button>                                  
                                </div>
                                <div class="panel-body">

                                    <?php if (isset($mensagem)) { ?>
                                        <div class="alert alert-success">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
                                            <?php echo $mensagem; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($erros)) { ?>
                                        <div class="alert alert-danger">
                                            <?php echo $erros; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($alerta)) { ?>
                                        <div class="alert alert-warning">
                                            <?php echo $alerta; ?>
                                        </div>
                                    <?php } ?>

                                    <div class="campo_esquerda">
                                        <input type="date" class="form-control" value="<?php echo (isset($_POST['data'])) ? $_POST['data'] : "" ?>" name="data" id="data" placeholder="Informe a data: " required="required" data-toggle="tooltip" title="Informe o data: " data-placement="auto"/>
                                    </div>
                                    <div class="campo_direita">
                                        <input type="text" class="form-control" value="<?php echo (isset($_POST['km'])) ? $_POST['km'] : "" ?>" name="km" id="km" placeholder="Informe os KM's: " required="required" data-toggle="tooltip" title="Informe os KM's: " data-placement="auto"/>
                                    </div>
                                    <!-- ESTÁ DANDO PROBLEMA AQUI EM BAIXO -->
                                    <div class="campo_direita">
                                        <select name="id_veiculo">
                                            <option value="0">Selecione</option>
                                            <?php foreach ($veiculos as $vei) { ?>
                                                <option value="<?php echo $vei->id ?>"><?php echo $vei->modelo ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                </div>		
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <script>
            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('#carregando').fadeOut();
                $('#conteudo').fadeIn();

                $(".voltar").click(function () {
                    $(location).attr("href", "revisoes.php");
                });

            });
        </script>

    </body>
</html>
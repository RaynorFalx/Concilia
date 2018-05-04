<?php ?>
<!doctype html>
<html lang="pt">
    <head>
        <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/js_plugins/bootstrap.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <script>
            $(document).ready(function () {

                $("#bt-modal").click(function () { //quando o bot�o fo rclicado
                    console.log("Clicou"); 
                    $("#myModal").modal();
                });
            });

            function carregaInfo(bt) {
                alert("Nome: " + bt.getAttribute('data-nome'));
                $("#span-modal-corpo").text(bt.getAttribute('data-local')); 
                
                $("#myModal").modal(); 
            }

        </script>

    </head>

    <body>



        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Abrir Modal</button>
        <br />
        <br />
        <button type="button" class="btn btn-success btn-lg" id="bt-modal">Abrir Modal JS</button>
        <br />
        <br />
        <button type="button" class="btn btn-success btn-lg" data-nome='João' data-local='Cuiabá' onclick="carregaInfo(this)">Abrir Modal Passando info</button>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <span id="span-modal-corpo">...</span>

                        <table id="tabela">
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </body>
</html>

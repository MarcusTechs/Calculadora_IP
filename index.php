<!-- Informações sobre a licença GPL e o desenvolvedor -->
<!--
Desenvolvido por MarcusTechs
Licenciado sob a Licença Pública Geral GNU (GPL)
LinkedIn: https://www.linkedin.com/in/marcus-erick-874bba268
GitHub: https://github.com/MarcusTechs
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IP/CIDR</title>
    <!-- Vinculando o arquivo CSS para aplicar o estilo hacker -->
    <link href="css/mystyle.css" media="all" rel="stylesheet" />
    <!-- Vinculando a biblioteca Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <div style="text-align: center;">
        <h1 style="font-size: 40px;">Calculadora de IP/CIDR</h1>
    <!-- Formulário para inserir o endereço IP e o prefixo CIDR -->
    <form method="GET" action="index.php">
            <label style="font-size: 20px;">Digite o endereço IP desejado:<br />
                <input id="ip" name="ip" style="font-size: 16px;" />
            </label> <br />
            <label style="font-size: 20px;">Digite o prefixo: <br />
                <input type="number" id="slash" name="slash" style="font-size: 16px;" />
            </label> <br />
            <!-- Botão para calcular o IP -->
            <input class="button" type="submit" value="Calcular" id="calculateButton" name="calculateButton"/>
        </form>
        <br />

        <hr style="border-color: green; border-width: 2px;" />
        <section id="Mainsection">
            <?php
            // Inclui o arquivo config.php que contém variáveis e funções para cálculo do IP
            include("config.php");
            ?>
        </section>
        <hr style="border-color: green; border-width: 2px;" />

        <div>
                <a href="https://br.linkedin.com/in/marcus-erick-874bba268" target="_blank" style="font-size: 24px; color: green; margin-bottom: 200px;">
                    <i class="fab fa-linkedin"></i> LinkedIn
                </a>
                &nbsp;&nbsp;&nbsp;
                <a href="https://github.com/MarcusTechs" target="_blank" style="font-size: 24px; color: green; margin-bottom: 200px;">
                    <i class="fab fa-github"></i> GitHub
                </a>
            </div>
        </section>
    </div>
</body>
</html>
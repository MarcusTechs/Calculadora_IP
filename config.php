<!-- Informações sobre a licença GPL e o desenvolvedor -->
<!--
Desenvolvido por MarcusTechs
Licenciado sob a Licença Pública Geral GNU (GPL)
LinkedIn: https://www.linkedin.com/in/marcus-erick-874bba268
GitHub: https://github.com/MarcusTechs
-->


<?php

// Verifica se o botão "Calcular" foi pressionado
if (isset($_GET["calculateButton"])) {
    // Obtém o valor do prefixo CIDR e do endereço IP informados pelo usuário
    $slash = $_GET['slash'];
    $ip_address = $_GET['ip'];

    // Verifica se o prefixo está dentro do intervalo válido (1 a 32)
    if ($slash > 32 || $slash < 1) {
        echo "Invalido!";
    } else {
        // Função para converter o prefixo CIDR em uma máscara de sub-rede no formato IP
        // Por exemplo, um prefixo CIDR de 24 se torna uma máscara de sub-rede 255.255.255.0
        function cidrToMask($slash)
        {
            $b = " ";
            for ($i = 1; $i <= 32; $i++) {
                $b .= $slash >= $i ? '1' : '0';
            }
            return long2ip(bindec($b));
        }

        // Obtém a máscara de sub-rede
        $ip_nmask = cidrToMask($slash);

        // Função para calcular e exibir informações sobre a rede e a sub-rede
        function Cidr($ip_address, $ip_nmask)
        {
            // Converte os endereços IP para números inteiros
            $ip_address_ext = ip2long($ip_address);
            $ip_nmask_ext = ip2long($ip_nmask);

            // Calcula o endereço da rede e o primeiro e último IP utilizáveis
            $ip_net = $ip_address_ext & $ip_nmask_ext;
            $ip_host_first = ((~$ip_nmask_ext) & $ip_address_ext);
            $ip_broadcast_invert = ~$ip_nmask_ext;
            $first = ($ip_address_ext ^ $ip_host_first) + 1;
            $last = ($ip_address_ext | $ip_broadcast_invert) - 1;
            $ip_broadcast = $ip_address_ext | $ip_broadcast_invert;

            // Converte os números inteiros de volta para endereços IP no formato legível
            $ip_net_short = long2ip($ip_net);
            $ip_first_short = long2ip($first);
            $ip_last_short = long2ip($last);
            $ip_broadcast_short = long2ip($ip_broadcast);

            // Exibe as informações sobre a rede e a sub-rede
            echo "Network: " . $ip_net_short . "<br>";
            echo "Broadcast: " . $ip_broadcast_short . "<br>";
            echo "Primeiro IP usável: " . $ip_first_short . "<br>";
            echo "Último IP utilizável: " . $ip_last_short . "<br>";
            echo "Máscara de sub-rede: " . $ip_nmask;
        }

        // Chama a função para calcular e exibir as informações sobre a rede e a sub-rede
        Cidr($ip_address, $ip_nmask);
    }
}
?>

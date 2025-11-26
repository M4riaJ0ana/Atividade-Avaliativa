<?php
    include_once 'config.php';

    function bancoConecta() 
    {
        global $config;
        static $link = null;

        if($link) {
            return $link;
        }

        $host = $config['HOST'];
        $usuario = $config['USUARIO'];
        $senha = $config['SENHA'];
        $banco = $config['BANCO'];

        /* abre a conexão */
        $link = mysqli_connect($host,$usuario,$senha);
        if(!$link)
        {
            /* não conseguiu abrir a conexão */
            echo "Erro de conexao: " . mysqli_connect_error();
            die();
        }

        /* seleciona o banco de dados */
        if(!mysqli_select_db($link, $banco))
        {
            /* erro ao selecionar o banco de dados */
            echo "Erro na selecao do banco: " . mysqli_error($link);
            mysqli_close($link);
            die();
        }

        register_shutdown_function(function() use ($link) {
            mysqli_close($link);
        });

        return $link;
    }

    function executaSelect($sql)
    {
        $link = bancoConecta();
	    $resposta = mysqli_query($link, $sql);
	    if($resposta)
	    {
    		$linha = mysqli_fetch_assoc($resposta);
            while($linha)
            {
                yield $linha;
                $linha = mysqli_fetch_assoc($resposta);
            }
        }
        else
        {
            echo mysqli_error($link);
        }
    }

    
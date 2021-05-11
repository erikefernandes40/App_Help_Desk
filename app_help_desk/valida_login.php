<?php
    session_start();


    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuario');

    $usuarios_app = array(
        array('id' => 1, 'email' => 'admin', 'senha' => 'admin', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'admin1', 'senha' => 'admin1', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'admin2', 'senha' => 'admin2', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'admin3', 'senha' => 'admin3', 'perfil_id' => 2),

    );

    foreach($usuarios_app as $user){
        if($user['email'] == $_POST ['email'] && $user['senha'] == $_POST ['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    };

    if($usuario_autenticado){
        echo "usuario autenticado";
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('location: home.php');

    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('location: index.php?login=erro');

    }
?>

<?php
    session_start();


    $autenticacao_usuario = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    $usuarios_app = array(
        array('id' => '1', 'email' => 'adm1@gmail.com', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => '2', 'email' => 'adm2@gmail.com', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => '3', 'email' => 'user1@gmail.com', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => '4', 'email' => 'user2@gmail.com', 'senha' => '1234', 'perfil_id' => 2)
    );

    foreach($usuarios_app as $user){
       
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $autenticacao_usuario = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if($autenticacao_usuario){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');

    }




?>
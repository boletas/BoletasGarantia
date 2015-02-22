<html>
    <head>
        <title></title>
    </head>
    <body>
        
        <?=$this->session->userdata('usuario')?>
        <a href="<?php base_url();?>login/cerrar_sesion">cerrar sesion</a>
    </body>
</html>

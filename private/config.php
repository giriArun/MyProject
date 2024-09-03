<?php
    function projectDefaultStruct( ){
        $__path = "/myproject";
        $__admin_path = "/admin";
        $__document_root = $_SERVER[ "DOCUMENT_ROOT" ];
        // server protocol
        $__protocol = empty( $_SERVER['HTTPS'] ) ? 'http' : 'https';
        // domain name
        $__domain = $_SERVER['SERVER_NAME'];

        if( $__domain == "localhost" ){
            $__root_path = $__protocol . '://' . $__domain . $__path;
            $__root_path_admin = $__root_path . $__admin_path;
        } else {
            $__root_path = $__protocol . '://' . $__domain . $__path;
            $__root_path_admin = $__root_path . $__admin_path;
        }

        return array(
            //path set
            "path" => $__path,
            "document_root" => $__document_root,
            "absolute_path" => $__document_root . $__path,
            "absolute_path_admin" => $__document_root . $__path . $__admin_path,
            "root_path" => $__root_path,
            "root_path_admin" => $__root_path_admin,
            //database
            "host" => "localhost",
            "user_name" => "root",
            "password" => "",
            "database_name" => "myproject",
        );
    }

    return projectDefaultStruct( );
?>


// base directory
    $base_dir = __DIR__;



    $doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);

    // base url
    $base_url = preg_replace("!^${doc_root}!", '', $base_dir);

    // server port
    $port = $_SERVER['SERVER_PORT'];
    $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";

    // put em all together to get the complete base URL
    $url = "${protocol}://${domain}${disp_port}${base_url}";

    echo $url;
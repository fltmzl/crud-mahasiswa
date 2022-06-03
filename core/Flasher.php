<?php 

namespace Core;

class Flasher {
    public static function setFlash($message, $action, $type)
    {
        $_SESSION["flash"] = [
            "message" => $message,
            "action" => $action,
            "type" => $type
        ];
    }

    public static function flash()
    {
        if(isset($_SESSION["flash"])) {
            echo "
                <h2>Test session " . $_SESSION["flash"]["message"] . "</h2>"
            ;
        }
    }
}
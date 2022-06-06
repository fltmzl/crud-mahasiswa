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
            $flash = $_SESSION["flash"];

            echo "
                <p class='text-red-600'>" . $flash["message"] . " " . $flash["action"] . "</p>"
            ;

            unset($_SESSION["flash"]);
        }
    }
}
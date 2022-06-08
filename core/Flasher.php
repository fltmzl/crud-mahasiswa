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

            if($flash["type"] === "success") {
                $textColor = "text-primary";
                $bgColor = "#4ade8010";
            } else {
                $textColor = "text-red-500";
                $bgColor = "#eb403410";
            }


            echo "
                <div style='background:$bgColor' class='$textColor rounded-lg py-2 px-5'>
                    <p>" . $flash["message"] . " " . $flash["action"] . "</p>
                </div>
                ";
            

            unset($_SESSION["flash"]);
        }
    }
}
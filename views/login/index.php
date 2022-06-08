<?php 
use Core\Flasher;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css">
        <title>Login</title>
    </head>
    <body>
        <div class="h-screen overflow-auto flex">
            <section class="bg-primary/30 hidden md:flex items-center justify-center basis-1/2 overflow-hidden">
                <object class="w-3/4" data="img/loginAnim.svg" type="image/svg+xml"></object>
            </section>
            <section class="px-5 flex justify-center items-center flex-1 bg-primary/5">
                <div>
                    <h1 class="mb-10 tracking-widest text-center font-bold text-4xl text-primary">LOGIN</h1>
                    <div class="text-red-500 text-sm mb-4"><?php Flasher::flash() ?></div>
                    <form action="<?= APP_URL ?>/login/authentication" method="POST">
                        <div class="space-y-5">
                            <div>
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="border-primary/20 focus:border-primary focus:ring focus:ring-primary/40" required/>
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="border-primary/20 focus:border-primary focus:ring focus:ring-primary/40" required/>
                            </div>
                            <div>
                                <input type="checkbox" id="remember" name="remember" class="border-primary/20 focus:border-primary focus:ring focus:ring-primary/40"/>
                                <label for="remember" class="text-xs text-gray-400">Remember Me</label>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-400 font-light">Belum punya akun? <a href="<?= APP_URL ?>/register" class="font-semibold text-primary">Register</a></span>
                            </div>
                            <button type="submit" class="p-2 rounded-lg btn-primary w-full">Log in</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>
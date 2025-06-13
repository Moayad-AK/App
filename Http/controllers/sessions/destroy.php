<?php

// dd('log out the user');

use Core\Authenticator;



(new Authenticator)->logout();

header('location: /');
exit();

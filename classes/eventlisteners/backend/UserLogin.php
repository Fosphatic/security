<?php

declare(strict_types=1);

namespace Adrenth\Security\Classes\EventListeners\Backend;

use Backend;
use BackendAuth;

/**
 * Class UserLogin
 *
 * @package Adrenth\Security\Classes\EventListeners\Backend
 */
class UserLogin
{
    public function handle()
    {
        $user = BackendAuth::getUser();

        if (empty($user->getAttribute('google2fa_secret'))) {
            return;
        }
        
        Backend::redirect('adrenth/security/twofactor/verify')->send();
    }
}

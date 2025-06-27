<?php

namespace App\Constants;

class ViewName
{
    // View untuk autentikasi
    public const LOGIN = 'auth.login';
    public const REGISTER = 'auth.register';

    // View untuk dashboard
    public const HOME = 'dashboard';

    // View untuk errors
    public const ERROR_403 = 'errors.403';
    public const ERROR_404 = 'errors.404';
    public const ERROR_500 = 'errors.500';
}

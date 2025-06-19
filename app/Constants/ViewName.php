<?php

namespace App\Constants;

class ViewName
{
    // View untuk autentikasi
    public const LOGIN = 'auth.login';
    public const REGISTER = 'auth.register';

    // View untuk dashboard
    public const DASHBOARD = 'dashboard';
    public const HOME = 'layouts.main';

    // View untuk layouts
    public const LAYOUT_MAIN = 'layouts.main';
    public const LAYOUT_SIDEBAR = 'layouts.sidebar';
    public const LAYOUT_CONTENT = 'layouts.content';

    // View untuk buku
    public const BOOK_INDEX = 'books.index';
    public const BOOK_CREATE = 'books.create';
    public const BOOK_EDIT = 'books.edit';
    public const BOOK_SHOW = 'books.show';

    // View untuk errors
    public const ERROR_403 = 'errors.403';
    public const ERROR_404 = 'errors.404';
    public const ERROR_500 = 'errors.500';
}

<?php

namespace Pzd\Share\Repositories;

class ShareRepo
{

    public static function successAlert( $body='عملیات با موفقیت انجام شد')
    {
        return   toast()->success($body)->timerProgressBar()->position('bottom-right');
    }
}

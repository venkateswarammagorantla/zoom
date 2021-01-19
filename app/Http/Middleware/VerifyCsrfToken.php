<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'login*',
        'forget-password*',
        'reset-password*',
        'importExportView',
        'export',
        'import',
        'ajaxdata',
        'ajaxdata/getdata',
        'ajaxdata/postdata',
        '/test*',
        'ajax_login/check*',
        'dynamic_fields*',
        'dynamic_field/insert*',
        'insertcourse*',
        'topic/topicinsert*',
        'class_timings*',
        'full-text-search*',
        'full-text-search/action*',
        'full-text-search/normal-search*',
        'newticket/insert*',
    ];
}

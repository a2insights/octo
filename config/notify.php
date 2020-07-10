<?php

return [

    'default' => 'toastr',

    'toastr' => [

        'class' => \Yoeunes\Notify\Notifiers\Toastr::class,

        'notify_js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js',
        ],

        'notify_css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css',
        ],

        'types' => [
            'error',
            'info',
            'success',
            'warning',
        ],

        'options' => [
            'closeButton'       => true,
            'closeClass'        => 'toast-close-button',
            'closeDuration'     => 500,
            'closeEasing'       => 'swing',
            'closeHtml'         => '<button><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/></svg></button>',
            'closeMethod'       => 'fadeOut',
            'closeOnHover'      => true,
            'containerId'       => 'toast-container',
            'debug'             => false,
            'escapeHtml'        => false,
            'extendedTimeOut'   => 500,
            'hideDuration'      => 500,
            'hideEasing'        => 'linear',
            'hideMethod'        => 'fadeOut',
            'iconClass'         => 'toast-info',
            'iconClasses'       => [
                'error'   => 'toast-error',
                'info'    => 'toast-info',
                'success' => 'toast-success',
                'warning' => 'toast-warning',
            ],
            'messageClass'      => 'toast-message',
            'newestOnTop'       => false,
            'onHidden'          => false,
            'onShown'           => true,
            'positionClass'     => 'toast-bottom-right',
            'preventDuplicates' => true,
            'progressBar'       => true,
            'progressClass'     => '',
            'rtl'               => false,
            'showDuration'      => 500,
            'showEasing'        => 'swing',
            'showMethod'        => 'fadeIn',
            'tapToDismiss'      => true,
            'target'            => 'body',
            'timeOut'           => 5000,
            'titleClass'        => 'toast-title',
            'toastClass'        => 'toast',
        ],
    ],

    'pnotify' => [

        'class' => \Yoeunes\Notify\Notifiers\Pnotify::class,

        'notify_js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js',
        ],

        'notify_css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css',
            'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.brighttheme.css',
        ],

        'types' => [
            'alert',
            'error',
            'info',
            'notice',
            'success',
        ],

        'options' => [],
    ],

    'sweetalert2' => [

        'class' => \Yoeunes\Notify\Notifiers\SweetAlert2::class,

        'notify_js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.min.js',
            'https://cdn.jsdelivr.net/npm/promise-polyfill/dist/polyfill.min.js',
        ],

        'notify_css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.min.css',
        ],

        'types' => [
            'error',
            'info',
            'question',
            'success',
            'warning',
        ],

        'options' => [],
    ],
];

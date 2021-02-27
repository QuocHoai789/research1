<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Deploy project
composer i
composer dump-autoload
php artisan db:seed

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=minhtruyen.ut@gmail.com
MAIL_PASSWORD=iqtrwellkrotruvm
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

DOMPDF Wrapper for Laravel
composer require barryvdh/laravel-dompdf
After updating composer, add the ServiceProvider to the providers array in config/app.php
Barryvdh\DomPDF\ServiceProvider::class,
'PDF' => Barryvdh\DomPDF\Facade::class,
<p>Configuration</p>
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
<p><b>Using</b></p>
$pdf = App::make('dompdf.wrapper');
$pdf->loadHTML('<h1>Test</h1>');
return $pdf->stream();
<p><b>Vietnamese</b></p>
font-family: firefly, DejaVu Sans, sans-serif;# research1

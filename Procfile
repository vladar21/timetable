web: vendor/bin/heroku-php-apache2 public/
RewriteCond %{HTTPS} off
RewriteRule .* https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

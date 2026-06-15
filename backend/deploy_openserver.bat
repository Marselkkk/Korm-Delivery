@echo off
chcp 65001 >nul
echo ========================================
echo   Korm Delivery — Развёртка на OpenServer
echo ========================================

set SITE_NAME=korm-delivery.local
set DOMAINS_DIR=C:\OSPanel\domains
set SITE_DIR=%DOMAINS_DIR%\%SITE_NAME%

echo [1/5] Создаём папку сайта: %SITE_DIR%
if not exist "%SITE_DIR%" mkdir "%SITE_DIR%"

echo [2/5] Копируем файлы проекта...
xcopy /E /I /Y /Q "." "%SITE_DIR%" ^
    /EXCLUDE:deploy_openserver.bat

echo [3/5] Настраиваем .env...
if not exist "%SITE_DIR%\.env" (
    copy "%SITE_DIR%\.env.openserver" "%SITE_DIR%\.env"
    echo .env создан из .env.openserver
) else (
    echo .env уже существует, пропускаем
)

echo [4/5] Устанавливаем зависимости (composer)...
cd /d "%SITE_DIR%"
call composer install --no-dev --optimize-autoloader

echo [5/5] Запускаем artisan команды...
php artisan key:generate
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo.
echo ========================================
echo   Готово!
echo   Откройте OpenServer и добавьте домен:
echo   Имя: %SITE_NAME%
echo   Папка: %SITE_DIR%\public
echo   PHP: 8.1 или выше
echo ========================================
pause

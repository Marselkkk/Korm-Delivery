@echo off
chcp 65001 >nul
echo ========================================
echo   Korm Delivery — OpenServer 5.4.3
echo ========================================

set SITE_NAME=korm-delivery.local
set DOMAINS_DIR=C:\ospanel\domains
set SITE_DIR=%DOMAINS_DIR%\%SITE_NAME%
set PHP=C:\ospanel\modules\php\PHP-8.1\php.exe
set COMPOSER=C:\ospanel\modules\composer\composer.phar

:: Проверяем что OpenServer установлен
if not exist "%DOMAINS_DIR%" (
    echo ОШИБКА: Папка %DOMAINS_DIR% не найдена.
    echo Убедись что OpenServer установлен в C:\ospanel\
    pause
    exit /b 1
)

echo [1/5] Создаём папку домена: %SITE_DIR%
if not exist "%SITE_DIR%" mkdir "%SITE_DIR%"

echo [2/5] Копируем файлы проекта...
xcopy /E /I /Y /Q "." "%SITE_DIR%"
del "%SITE_DIR%\deploy_openserver.bat" 2>nul

echo [3/5] Настраиваем .env...
cd /d "%SITE_DIR%"
if not exist ".env" (
    copy ".env.openserver" ".env"
    echo .env создан
) else (
    echo .env уже существует, пропускаем
)

echo [4/5] Composer install...
"%PHP%" "%COMPOSER%" install --no-dev --optimize-autoloader

echo [5/5] Artisan команды...
"%PHP%" artisan key:generate
"%PHP%" artisan migrate --force
"%PHP%" artisan storage:link
"%PHP%" artisan config:cache
"%PHP%" artisan route:cache
"%PHP%" artisan view:cache

echo.
echo ========================================
echo   Готово!
echo.
echo   В OpenServer 5.4.3 добавь домен:
echo   Меню (трей) - Домены - Управление доменами
echo   Имя:    %SITE_NAME%
echo   Папка:  %SITE_DIR%\public
echo   PHP:    PHP-8.1 (или PHP-8.2)
echo.
echo   Затем перезапусти сервер и открой:
echo   http://%SITE_NAME%
echo   http://%SITE_NAME%/admin  (Filament)
echo ========================================
pause

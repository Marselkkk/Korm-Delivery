@echo off
chcp 65001 >nul
echo ========================================
echo   Korm Delivery BACKEND — korm-api
echo ========================================

set SITE_NAME=korm-api
set SITE_DIR=D:\ospanel\domains\%SITE_NAME%
set PHP=D:\ospanel\modules\php\PHP-8.1\php.exe
set COMPOSER=D:\ospanel\modules\php\PHP-8.1\composer.phar

if not exist "D:\ospanel\domains" (
    echo ОШИБКА: D:\ospanel\domains не найдена
    pause & exit /b 1
)

echo [1/5] Создаём папку: %SITE_DIR%
if not exist "%SITE_DIR%" mkdir "%SITE_DIR%"

echo [2/5] Копируем файлы...
xcopy /E /I /Y /Q "." "%SITE_DIR%"
del "%SITE_DIR%\deploy_openserver.bat" 2>nul

echo [3/5] Настраиваем .env...
cd /d "%SITE_DIR%"
if not exist ".env" (
    copy ".env.openserver" ".env"
    echo .env создан
) else (
    echo .env уже есть, пропускаем
)

echo [4/5] Composer install...
"%PHP%" "%COMPOSER%" install --no-dev --optimize-autoloader

echo [5/5] Artisan...
"%PHP%" artisan key:generate
"%PHP%" artisan migrate --force
"%PHP%" artisan storage:link
"%PHP%" artisan config:cache
"%PHP%" artisan route:cache

echo.
echo ========================================
echo   Бэкенд готов!
echo   Добавь в OpenServer домен:
echo     Имя:   %SITE_NAME%
echo     Папка: %SITE_DIR%\public
echo     PHP:   8.1 или 8.2
echo   URL: http://%SITE_NAME%/api/...
echo ========================================
pause

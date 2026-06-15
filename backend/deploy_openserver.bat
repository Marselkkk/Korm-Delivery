@echo off
chcp 65001 >nul
echo ========================================
echo   Korm Delivery BACKEND
echo   D:\ospanel\domains\korm-delivery\backend
echo ========================================

set SITE_DIR=D:\ospanel\domains\korm-delivery\backend
set PHP=D:\ospanel\modules\php\PHP-8.1\php.exe
set COMPOSER=D:\ospanel\modules\php\PHP-8.1\composer.phar

if not exist "D:\ospanel\domains\korm-delivery" (
    echo ОШИБКА: папка korm-delivery не найдена в D:\ospanel\domains\
    pause & exit /b 1
)

echo [1/5] Создаём папку: %SITE_DIR%
if not exist "%SITE_DIR%" mkdir "%SITE_DIR%"

echo [2/5] Копируем файлы Laravel...
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
echo   Бэкенд готов в %SITE_DIR%
echo   Теперь запусти deploy_openserver.bat из папки frontend
echo ========================================
pause

@echo off
chcp 65001 >nul
echo ========================================
echo   Korm Delivery FRONTEND
echo   D:\ospanel\domains\korm-delivery\
echo ========================================

set SITE_DIR=D:\ospanel\domains\korm-delivery
set FRONTEND_DIR=%~dp0

if not exist "%SITE_DIR%" (
    echo ОШИБКА: папка %SITE_DIR% не найдена.
    echo Сначала запусти deploy_openserver.bat из папки backend.
    pause & exit /b 1
)

where node >nul 2>&1
if errorlevel 1 (
    echo ОШИБКА: Node.js не найден. Установи с https://nodejs.org ^(LTS^)
    pause & exit /b 1
)

echo [1/4] Устанавливаем зависимости...
cd /d "%FRONTEND_DIR%"
call npm install

echo [2/4] Копируем .env для сборки...
copy ".env.openserver" ".env" /Y

echo [3/4] Собираем статику (nuxt generate)...
call npm run generate
if errorlevel 1 (
    echo ОШИБКА: Сборка упала. Смотри вывод выше.
    pause & exit /b 1
)

echo [4/4] Копируем в домен...
xcopy /E /I /Y /Q ".output\public\*" "%SITE_DIR%"

echo.
echo ========================================
echo   Готово!
echo.
echo   В OpenServer добавь домен:
echo     Имя:   korm-delivery
echo     Папка: %SITE_DIR%
echo     PHP:   любой
echo.
echo   Открывай: http://korm-delivery
echo   Админка:  http://korm-delivery/admin
echo ========================================
pause

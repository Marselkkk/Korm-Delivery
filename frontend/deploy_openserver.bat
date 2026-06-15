@echo off
chcp 65001 >nul
echo ========================================
echo   Korm Delivery FRONTEND — korm-delivery
echo ========================================

set SITE_NAME=korm-delivery
set SITE_DIR=D:\ospanel\domains\%SITE_NAME%
set FRONTEND_DIR=%~dp0

if not exist "D:\ospanel\domains" (
    echo ОШИБКА: D:\ospanel\domains не найдена
    pause & exit /b 1
)

:: Проверяем Node.js
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

echo [4/4] Копируем в OpenServer...
if not exist "%SITE_DIR%" mkdir "%SITE_DIR%"
xcopy /E /I /Y /Q ".output\public\*" "%SITE_DIR%"

echo.
echo ========================================
echo   Фронтенд готов!
echo   Добавь в OpenServer домен:
echo     Имя:   %SITE_NAME%
echo     Папка: %SITE_DIR%
echo     PHP:   любой (статика)
echo   URL: http://%SITE_NAME%
echo ========================================
pause

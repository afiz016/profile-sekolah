@echo off
echo ========================================
echo FIX DATABASE - XAMPP di Drive D
echo ========================================
echo.

echo [1] Stopping MySQL...
taskkill /F /IM mysqld.exe 2>nul
timeout /t 2 >nul
echo.

echo [2] Backup database folder...
if not exist "D:\xampp\mysql\backup_data" mkdir "D:\xampp\mysql\backup_data"
xcopy "D:\xampp\mysql\data\profil_sekolah" "D:\xampp\mysql\backup_data\profil_sekolah_%date:~-4,4%%date:~-10,2%%date:~-7,2%" /E /I /Y 2>nul
echo Backup completed (if folder exists)
echo.

echo [3] Removing corrupt database folder...
cd D:\xampp\mysql\data
if exist "profil_sekolah" (
    echo Deleting profil_sekolah folder...
    rmdir /S /Q profil_sekolah
    echo Folder removed!
) else (
    echo Folder not found, skipping...
)
echo.

echo [4] Starting MySQL...
cd D:\xampp
start xampp-control.exe
timeout /t 3 >nul
echo.

echo [5] Waiting for MySQL to start...
timeout /t 5 >nul
echo.

echo [6] Creating new database...
D:\xampp\mysql\bin\mysql.exe -u root -e "CREATE DATABASE IF NOT EXISTS profil_sekolah CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
if %errorlevel% == 0 (
    echo Database created successfully!
) else (
    echo Failed to create database. Please create manually in phpMyAdmin.
)
echo.

echo ========================================
echo DONE!
echo ========================================
echo.
echo Next steps:
echo 1. Make sure MySQL is running in XAMPP
echo 2. Run: php artisan migrate --seed
echo 3. Login: admin@example.com / password
echo.
pause

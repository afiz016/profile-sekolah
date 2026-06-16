@echo off
echo ========================================
echo QUICK FIX MYSQL XAMPP
echo ========================================
echo.

echo [1] Checking MySQL process...
tasklist | findstr "mysqld.exe"
if %errorlevel% == 0 (
    echo MySQL is running. Stopping...
    taskkill /F /IM mysqld.exe
    timeout /t 3
) else (
    echo MySQL is not running.
)
echo.

echo [2] Backup current data folder...
if not exist "C:\xampp\mysql\data_backup" mkdir "C:\xampp\mysql\data_backup"
xcopy "C:\xampp\mysql\data" "C:\xampp\mysql\data_backup\data_%date:~-4,4%%date:~-10,2%%date:~-7,2%_%time:~0,2%%time:~3,2%%time:~6,2%" /E /I /Y
echo Backup completed!
echo.

echo [3] Removing problematic files...
cd C:\xampp\mysql\data
if exist "ibdata1" (
    echo Deleting ibdata1...
    del /F /Q ibdata1
)
if exist "ib_logfile0" (
    echo Deleting ib_logfile0...
    del /F /Q ib_logfile0
)
if exist "ib_logfile1" (
    echo Deleting ib_logfile1...
    del /F /Q ib_logfile1
)
echo Files removed!
echo.

echo [4] Starting MySQL...
cd C:\xampp
start xampp-control.exe
echo.

echo ========================================
echo DONE!
echo ========================================
echo.
echo Next steps:
echo 1. Open XAMPP Control Panel
echo 2. Click START on MySQL
echo 3. If it works, your database is fixed!
echo.
echo If still not working, read: FIX_MYSQL_XAMPP.md
echo.
pause

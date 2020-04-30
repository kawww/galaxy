@echo off 

for /f "tokens=4" %%a in ('route print^|findstr 0.0.0.0.*0.0.0.0') do (
 set IP=%%a
)

echo ******************************************************************
echo ^^
echo Your Server IP is  %IP%
@echo off 
echo ^^
echo You can open galaxy on your phone or other devices with this ip.
echo ^^
echo ******************************************************************
echo ^^
php.exe -S %IP%:80 -t galaxy

pause
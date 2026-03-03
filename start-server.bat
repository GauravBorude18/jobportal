@echo off
cd /d C:\xampp\htdocs\jobportal
REM Start CodeIgniter dev server in a new window
start "" php spark serve --host localhost --port 8080
exit

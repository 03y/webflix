# Webflix

## Running
Make sure to have git installed, xampp is installed with the script.

### UNIX-like (Linux/MacOS/BSD)
```
# Alternatively you could install this using your system's package manager.
wget https://www.apachefriends.org/xampp-files/8.1.5/xampp-linux-x64-8.1.5-0-installer.run
chmod +x xampp-linux-x64-8.1.5-0-installer.run
./xampp-linux-x64-8.1.5-0-installer.run
rm xampp-linux-x64-8.1.5-0-installer.run

cd /opt/lampp/htdocs
git clone https://github.com/03y/webflix.git GU2
sudo /opt/lampp/xampp start
xdg-open http://localhost/phpmyadmin
```

### Windows 10+
```
winget install xampp

cd C:\xampp\htdocs
git clone https://github.com/03y/webflix.git GU2
C:\xampp\xampp_start.exe
Start-Process "http://localhost/phpmyadmin"
```

*You will then need to create the `webflix` table and run `backup.sql` to create and populate tables (might get round to automating this at some point).*
Site can then be accessed at `http://localhost/GU2/`


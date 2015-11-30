useradd ulmus
cp ulmus /etc/init.d/ulmus
chmod +x /etc/init.d/ulmus
update-rc.d ulmus defaults

echo "Creating nginx document root link..."
if [ ! -d /usr/share/nginx ]; then 
  echo "/usr/share/nginx not found."
  echo "nginx might be not installed."
  echo "operation terminated."
  exit 1
else
  if [ -e /usr/share/nginx/public ]; then 
    sudo rm /usr/share/nginx/public
  fi
  sudo ln -s $(pwd)/public /usr/share/nginx/public
fi

echo "production_setup_laravel.sh successfully completed."
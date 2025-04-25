#!/bin/bash

# Задаємо змінні для вашого проекту
VHOST_NAME="fr.loc"
DOCUMENT_ROOT="/home/dasha/projects/fr.loc/public"

# Перевіряємо, чи Apache встановлений
if ! command -v apache2 &> /dev/null
then
    echo "Apache не знайдено. Встановлюємо Apache..."
    sudo apt update
    sudo apt install apache2 -y
else
    echo "Apache вже встановлений."
fi

# Створюємо конфігураційний файл для віртуального хоста
VHOST_FILE="/etc/apache2/sites-available/$VHOST_NAME.conf"
echo "Створюємо конфігураційний файл для віртуального хоста..."

sudo bash -c "cat > $VHOST_FILE <<EOL
<VirtualHost *:80>
    ServerName $VHOST_NAME
    DocumentRoot $DOCUMENT_ROOT

    <Directory $DOCUMENT_ROOT>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/$VHOST_NAME-error.log
    CustomLog \${APACHE_LOG_DIR}/$VHOST_NAME-access.log combined
</VirtualHost>
EOL"

echo "Конфігураційний файл $VHOST_FILE створено."

# Створюємо symbolic link в sites-enabled
echo "Активуємо віртуальний хост..."
sudo a2ensite $VHOST_NAME.conf

# Налаштовуємо DNS для локального хоста
echo "Налаштовуємо DNS для $VHOST_NAME..."
echo "127.0.0.1 $VHOST_NAME" | sudo tee -a /etc/hosts

# Перезавантажуємо Apache для застосування змін
echo "Перезавантажуємо Apache..."
sudo systemctl reload apache2

# Перевіряємо статус Apache
echo "Статус Apache:"
sudo systemctl status apache2

echo "Віртуальний хост $VHOST_NAME налаштовано успішно!"

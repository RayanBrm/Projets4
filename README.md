# Gestion de bibliothèque 
__2e année DUT Informatique - Valence__

Guillaume Marmorat / Axelle Delomez / Emile Canac / Rayan Barama

## Installation :
Vous devez avoir un serveur apache2 d'installé et /!\ __php >= 7.1__ /!\

Pour une installation sur Windows, utilisez [WAMP](http://www.wampserver.com), les instructions ci-dessous sont valable aussi

Configuration d'un vhost pour CodeIgniter : 

```apacheconfig
<VirtualHost *:80>
        # Votre fqdn ou pour des addresse plus propre
        ServerName sitebu.local
        # Pas vraiment utile
        ServerAdmin guillaume@localhost
        # Mettez votre path vers le projet
        DocumentRoot /var/www/html/Projets4/
        # Defini les regle pour le repertoire racine du site, évite un .htaccess
        # Remplacer par votre path vers le projet
        <Directory /var/www/html/Projets4>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
                # Ne pas oublier d'activer le module : a2enmod rewrite
                RewriteEngine on
                # Regle specifique a CodeIgniter
                RewriteBase /
                RewriteCond %{REQUEST_FILENAME} !-f
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteRule ^(.*)$ index.php?/$1 [L]
        </Directory>
        ErrorLog /var/www/html/Projets4/server/error.log
        CustomLog /var/www/html/Projets4/server/access.log combined
</VirtualHost>
```
__Configuration a a placer dans /etc/apache2/site-available/__ pour linux

__Une options est disponible dans les parametre wamp : vhosts.conf__ pour windows

__N'oubliez pas d'activer la configuration du nouveau vhost, si vous avez nommer le fichier sitebu.conf:__
        
        a2ensite sitebu.conf

Si vous voulez acceder au site via [sitebu.local](sitebu.local) comme specifier dans la conf apache ci-dessus

Rajouter au fichier : 
* /etc/hosts pour linux

* C:\Windows\System32\drivers\etc\hosts pour windows
```
    127.0.0.1 sitebu.local
```

Créez ensuite une base de donnée MySQL avec le script dans : /application/assets/db/CREATE.sql

Wamp dispose d'un GUI pour faciliter l'import de base de donnée

Sur linux attention a bien nommer la base __ProjetS4__ , windows est quant a lui case insensitive pour ça

Un utilisateur administrateur sera crée avec les identifiant : admin:admin

Vous devez aussi renseigner les identifiant MySQL dans le projet sou : /application/config/databases.php


Ci-dessous un configuration type :
```php
$db['default'] = array(
    // Remplacez ici par votre dsn 
	'dsn'	=> 'mysql:host=localhost;dbname=ProjetS4;charset=utf8',
	// Ici
	'hostname' => 'localhost',
	// Ici
	'username' => 'root',
	// Ici
	'password'=> '',
	// Et ici
	'database' => 'ProjetS4',
	'dbdriver' => 'pdo',
	'dbprefix' => '',
	...
	// Ne supprimez pas les autre champ modifiez uniquement ceux-ci
);
```

Redemarrez votre serveur, et enjoy ;)
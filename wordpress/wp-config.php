<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wpsite');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'imie');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$f:WgMDL2kEP;p~zmC+>#uI-V+QePN,N,S!xX-P#K+t{*#DYBi5}c?Y@e/O)@&nv');
define('SECURE_AUTH_KEY',  'dWMJw2jJ1S+#t~!g6|zj?@P-Pk}]Ddb%|HMcmm<Cs1@?Hww+z1}V4xSZ<{^**6M4');
define('LOGGED_IN_KEY',    'v`M8yAk*w]iv<Oyb5e:TbKcq5k P+6R>:B5<8QN(;h8B9H|HP|9NUV!kal}rq=(D');
define('NONCE_KEY',        '(&gliyDZ33yp=# )GtuVEkE^^DLMd4$!yp.a(y3z3zEzrx;6 tQgHV~Cf9}Y%e(d');
define('AUTH_SALT',        'XMPn~5/wp{T-|rvSENS/|I9Td!FiLr8CO[Y-Cp8QZAR-yeYg177c>HOXVAs~8m`R');
define('SECURE_AUTH_SALT', 'S`h@WZ<)<n}*J2kR_mJ;-d|Ey:M~Y=axV;k<|K@iAlu|eQ_b2QX&k0UL.5ak8Oqk');
define('LOGGED_IN_SALT',   '$G_oAoAK12Y}}JvDJ]KKu6jIyC{OO44H9-3|{n{f]E3uao:7OTz;Hbz!Z*z&%kho');
define('NONCE_SALT',       'IhS@+=,-aj)F;$,6z^ZxRG9n_XL)HE-J&w@;A@&x#M<ow81.Qh6%+^VPN@<8E08^');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 */
define('WP_DEBUG', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
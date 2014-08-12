<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'drs_drs');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'beatles');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'K_-}E! :C]3skP6P75%2JI94OQ.gND+?5RmCoo N6ptFWw<kq&r!q*0FkGu|?WOk'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', '+f*}MlhJ/Up@L1d$H]S|z,r@J})y<440h*.[4KqU8,gqku<q7Gr|5;ou1a#vs.=/'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', ')M&k+ul}@o+IFYEOg W7$RAHS1dYTv_P@~d<P8(]Kfu9pG|]eF&8.>n(}:<s3a*#'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '=z&)n+.nWyvu?q5{-.>aT.R+8~j4+N}{7& 1[@=hkRBq#?WT)Dh>gL+y>]HIVW)-'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'dAk,@EI/iQ<=-x{VY%~wEt9Hku?6$B7Zi6(1>D3Y-j[ c-Zv.2F}~][VFo%/HM]p'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'fOk|my<P4PH<.J`$/Bt*+J4IWO(! >-<0i=9!d{|/*;1l&csi]ZkR*d-rM]R4uxC'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '#;0$<Wj|2pkFu+cG%.ZIhjUzh<xJD_wiT;,2<_E_b<O_|BKQ??|]pA+ysmQ&bKLH'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'q#IcUzVb+S2e|1azzZ,ipL.%JqNmP=8Vg5{xkW8*t-{Ao|-!2k]UryNvrJJAO/yZ'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


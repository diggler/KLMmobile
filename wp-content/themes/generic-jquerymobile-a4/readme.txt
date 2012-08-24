/*   
# Theme Name: Generic jQuery Mobile Theme 
# Theme URI: http://frobert.com/
# Description: Generic jQuery Mobile Theme for use with mobile detector plugins.
# Author: Francis Robert
# Author URI: http://frobert.com/
# Version: 0.1
# License: GNU General Public License v2.0
# License URI: http://www.gnu.org/licenses/gpl-2.0.html
------------------------------------
WARNING! (La version française de ce texte est au bas de ce document)

Do NOT activate this theme after installation unless you plan to publish a mobile-only website! 
THE CORRECT WAY TO USE THIS THEME IS BY USING A MOBILE DETECTION PLUGIN. Keep reading for more info.

------------------------------------
NOTES

1) Release date: 2011-03-30 

2) This theme uses jQuery Mobile Alpha 3, 
a javascript framework optimized for mobile applications.
You can find more information here: http://jquerymobile.com/

3) To use this theme, you must be using a WordPress plugin that will allow you 
to detect your mobile visitors. Here are two plugins that can do such a thing: 
"WP Mobile Detector" and "WPtap Mobile Detector".
There are others of course. Make sure you fully test locally the one you choose 
so you don't get any bad surprises.

4) This theme uses the WordPress native gallery with the "attachment page". 
Whenever you change orientation when looking at an attachment (picture from your gallery), 
it will automatically be resizes to almost fit the width of the mobile screen.
No test have been done with gallery plugins such as NextGen, PhotoSmash, etc.

5) This theme uses the "Featured Image" defined in posts. 
If you are using them (optional), their thumbnail will be used on the left of each item in the post list.

6) This theme will resize YouTube videos that are iFramed (not embedded) to a mobile width. 
The "Full Screen" button still allows you to view the video full screen which is nice.

7) You can choose to deregister scripts by setting the correct names in the inc/preferences.php file
by setting the $deregister_scripts variable (array needed). 
After those predefined deregistrations are done, the following scripts are registered:
- jquery ( http://code.jquery.com/jquery-1.5.1.min.js )
- fr-mobile-wp-scripts ( get_bloginfo('template_url')."/scripts/fr-mobile-wp.js" )
- jquerymobile ( http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js )

8) You can choose to deregister styles by setting the correct names in the inc/preferences.php file
by setting the $deregister_styles variable (needs an array).

9) This theme was built only for front-end public use, not administrative use.


HOW TO CUSTOMIZE THIS THEME

1) jQuery Mobile has a default theming system which can be used and customized easily with this theme. 
In the inc/preferences.php file of this theme, you will find the "Theme Settings" lines at the top. 
Change the letters assigned to those variables to your liking. 

Basically, "a" is dark, "b" is a mix of blue and gray, "c" is all gray, "d" is gray and white and "e" is yellow.
Please refer to the jQuery Mobile official web site for more theming information.  

2) Still in the inc/preferences.php file, you can choose which basic widget you want to show  
by setting the $jqtheme_sidebar_items variable (array needed). 
The current available widgets are 'archives','pages','links','categories'. 
Feel free to check how they are implemented and add your own.



FRANÇAIS
-----------------------------------------------------
AVERTISSEMENT!

N'activez PAS ce theme après installation à moins d'avoir l'intention de servir un site uniquement pour mobiles. 
LA FAÇON CORRECTE D'UTILISER CE THEME SE FAIT A L'AIDE D'UNE EXTENSION WORDPRESS DE DETECTION DE MOBILES.
Veuillez continuer la lecture pour plus d'information.

------------------------------------
NOTES

1) Date de sortie: 2011-03-30 

2) Ce thème utilise la version Alpha 3 de jQuery Mobile, 
un framework javascript optimisé pour les applications mobiles. 
Pour plus d'information visitez http://jquerymobile.com/

3) Pour servir ce thème aux visiteurs mobiles, vous devez utiliser une extension WordPress 
qui permet de détecter les appareils mobiles et de leur servir une version adaptée de votre site. 
Voici deux extensions qui font ce travail: "WP Mobile Detector" et "WPtap Mobile Detector". 
Bien entendu il y en a d'autres. 
Assurez-vous de bien tester localement l'extension de votre choix pour ne pas avoir de mauvaises surprises.

4) Ce thème utilise le système natif de galerie de photos de WordPress. 
Dans la page "attachment.php", changer l'orientation du mobile redimensionne automatiquement 
la taille de la photo en conséquence. 
Aucun test ni développement n'a été fait avec les extensions telles que NextGen, hotoSmash, etc.

5) Ce thème fait usage des "Featured Image" définies dans les articles. 
Si vous les utilisez, leur thumbnail respectif sera utilisé à la gauche de chacun des items de la liste d'articles.

6) Ce thème redimensionne les videos YouTube placés dans un iFrame pour la largeur d'un mobile.  
L'option "Plein écran" demeure disponible et permet de voir ces vidéos plein écran.

7) Ce thème permet de dé-enregistrer des scripts en spécifiant leur nom, dans le fichier inc/preferences.php, 
à la variable $deregister_scripts (array). 
Dès que cette dé-enregistrement est complété, les scripts suivants sont enregistrés:
- jquery ( http://code.jquery.com/jquery-1.5.1.min.js )
- fr-mobile-wp-scripts ( get_bloginfo('template_url')."/scripts/fr-mobile-wp.js" )
- jquerymobile ( http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js )

8) Ce thème per met de dé-enregistrer des styles en spécifiant leur nom, dans le fichier inc/preferences.php, 
à la variable $deregister_styles (array).

9) Les fonctions administratives "front-end" n'ont jamais été considérées dans l'élaboration de ce thème. 
Ce thème a été conçu uniquement pour les visiteurs. 


COMMENT PERSONNALISER CE THÈME

1) jQuery Mobile possède son propre système de personnalisation et peut être utilisé avec ce thème. 
Dans le fichier inc/preferences.php, vous trouverez la section "Theme Settings" en haut complètement. 
Changez les valeurs de ces variables selon vos préférences. 

Rapidement, "a" est le thème foncé, "b" est un mélange de bleu et de gris, "c" est composé de gris uniquement, 
"d" est composé de gris et de blanc, et "e" est jaune. 
Veuillez vus référer au site officiel de jQuery Mobile pour plus d'information sur la personnalisation.

2) Toujours dans le fichier inc/preferences.php, vous pouvez sélectionner quel widget de base 
vous voulez en changeant la valeur de la variable $jqtheme_sidebar_items (array). 
Les widgets présentement disponibles sont 'archives','pages','links','categories'. 
Pour en ajouter d'autres, examinez le code en place et apportez-y des modifications. 

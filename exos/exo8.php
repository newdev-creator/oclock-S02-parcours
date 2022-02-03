<?php
require_once '../inc/functions.php';
require_once '../inc/bart2.php'; // fichier déclarant la variable $bartPunishment
ob_start();

/* === Exo 8 : Punitions en image ===
 *
 * Dans la continuité de l'exo précédent,
 * on voudrait que tu parcours tout le tableau $bartPunishment
 * afin d'afficher chaque phrase, suivie de son image associée
 * 
 * Il y a plusieurs façons d'arriver au résultat attendu.
 * On ne demande pas du code HTML étoffé.
 * Juste une balise <img> pour afficher chaque image
 * 
 * Info utile :
 *   - si dans ta boucle tu as besoin de distinguer une phrase d'une image
 *   - tu peux utiliser :
 *      - la fonction strstr (https://www.php.net/manual/fr/function.strstr)
 *      - ou la fonction substr (https://www.php.net/manual/fr/function.substr.php)
 * 
 * En cas de difficulté :
 *    - ne t'embête pas à afficher l'image
 *    - afficher l'URL de l'image nous suffira ;)
 */

// A toi de jouer
$sentence = strstr($bartPunishment, "sentence");
$picture = strstr($bartPunishment, "picture");

foreach ($sentence as $picture) {
    echo $bartPunishment;
}


// ------ Aide ------
// Si une chaine de caractère $string contient le mot "sentence"
// -- AVEC strstr --
// $boolean = strstr($string, "sentence");
// -- AVEC substr --
// $boolean = substr($string, 0, 8) == 'sentence';

/*
 * Tests
 * Pas touche !
 */
check(8);

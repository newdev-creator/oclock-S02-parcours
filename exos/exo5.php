<?php
require_once '../inc/functions.php';
require_once '../inc/bart.php'; // fichier déclarant la variable $bartPunishment

/* === Exo 5 : 3 punitions ===
 *
 * Après South Park, parlons d'un autre enfant calme, gentil et exemplaire : Bart Simpson !
 * 
 * Un peu plus haut, nous avons inclus un fichier "bart.php".
 * Analyse le contenu de ce fichier, et la variable $bartPunishment
 * 
 * A partir de cette variable,
 *   - stocke dans la variable $sentence1 la première phrase de la liste
 *   - stocke dans la variable $sentence4 la phrase à l'index 4 de la liste
 *   - stocke dans la variable $sentenceX l'avant-dernière phrase de la liste
 */

// A toi de jouer
$sentence1 = $bartPunishment['1'];
$sentence4 = $bartPunishment['4'];
$sentenceX = $bartPunishment['14'];
// Je ne vois pas pourquoi $sentenceX fonctionne...



/*
 * Tests
 * Pas touche !
 */
check(5);

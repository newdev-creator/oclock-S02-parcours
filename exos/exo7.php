<?php
require_once '../inc/functions.php';
require_once '../inc/bart2.php'; // fichier déclarant la variable $bartPunishment
ob_start();

/* === Exo 7 : 3 punitions et leur image ===
 *
 * Cette fois, on a ajouté une donnée supplémentaire dans le tableau des exos précédents : l'image de chaque punition
 * Ces images sont extraites du fameux générique de la série.
 * L'image de la 10e punition va te surprendre !
 * 
 * On va s'occuper de récupérer quelques informations du tableau, comme pour l'exo 4.
 * 
 * 1ère étape : ANALYSER !!
 *   - analyse le tableau $bartPunishment
 *   - la structure a bien changé !
 * 
 * 2e étape :
 *   - A partir de cette variable,
 *      - stocke dans la variable $sentence1 la première phrase de la liste
 *      - stocke dans la variable $sentence7 la 7e phrase de la liste
 *      - stocke dans la variable $sentenceX l'avant-dernière phrase de la liste
 *      - => tu peux alors constater les changements depuis l'exo 4
 *      - stocke dans la variable $image1 l'image de la première phrase de la liste
 *      - stocke dans la variable $image7 l'image de la 7e phrase de la liste
 *      - stocke dans la variable $imageX l'image de l'avant-dernière phrase de la liste
 */

// A toi de jouer
$sentence1 = $bartPunishment['sentence1'];
$sentence7 = $bartPunishment['sentence7'];
$sentenceX = $bartPunishment['sentence14'];
$image1 = $bartPunishment['picture1'];
$image7 = $bartPunishment['picture7'];
$imageX = $bartPunishment['picture14'];
/*
 * Tests
 * Pas touche !
 */
check(7);

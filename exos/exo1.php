<?php
require_once '../inc/functions.php';

/* === Exo 1 : Additionner ===
 *
 * C'est le moment d'appliquer nos connaissances sur les fonctions en PHP
 *
 * Rien d'extraordinaire dans la fonction qu'on va vous demander de définir :
 *
 * nom de la fonction : addition
 * but de la fonction : additionner 2 nombres fournis en arguments et renvoyer le résultat obtenu
 *
 * Exemples :
 * $somme = addition(1, 3); // => $somme sera égal à 4
 * $somme = addition(2, 4); // => $somme sera égal à 6
 * $somme = addition(5, 4); // => $somme sera égal à 9
 *
 * 
 * -- En bonus --
 * 
 * On aimerait pouvoir additionner 3 nombres
 * Tout en laissant la possibilité de vouloir additionner que 2 nombres
 * 
 * Exemples :
 * $somme = addition(1, 3); // => $somme sera égal à 4
 * $somme = addition(1, 3, 1); // => $somme sera égal à 5
 */
$premierNombre = 1;
$deuxiemeNombre = 1;
$troisiemeNombre = 5;


function addition ($premierNombre, $deuxiemeNombre) {
    $somme = $premierNombre + $deuxiemeNombre;
    return $somme;
}

/*
 * Tests
 * Pas touche !
 */
check(1);

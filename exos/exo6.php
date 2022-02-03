<?php
require_once '../inc/functions.php';
require_once '../inc/bart.php'; // fichier déclarant la variable $bartPunishment
ob_start();

/* === Exo 6 : Toutes les punitions ===
 *
 * Ouf, toutes les punitions, ce n'est pas pour nous, mais pour Bart...
 * Quoique, la punition serait-elle ce parcours ???!!!
 * 
 * Bon sujet de dissertation ou pas, on va désormais afficher toutes les punitions à l'écran
 * 
 * Tu l'as compris,
 *   - on utilise le même fichier "inc/bart.php" qu'à l'exercice précédent
 *   - les punitions sont dans un tableau
 *   - la tableau contient 15 éléments (de 1 à 15)
 *   - on veut afficher la valeur de chaque élément
 *
 * Si tu le souhaites, tu peux ajouter un "<br>" après chaque phrase (pour la lisibilité), mais on peut faire sans ;)
 */

// A toi de jouer
foreach ($bartPunishment as $bartPunishment) {
    echo $bartPunishment;
}



/*
 * Tests
 * Pas touche !
 */
check(6);

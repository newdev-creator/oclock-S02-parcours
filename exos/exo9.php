<?php
require_once '../inc/functions.php';

/* === Exo 9 : Paramètres d'URL ===
 *
 * Pour vérifier vos connaissances sur les paramètres d'URL,
 * on va considérer qu'on se trouve sur un site de mini-jeux 2 joueurs
 * et qu'on se trouve sur la page où le jeu a été choisi, et le nom des joueurs renseigné
 *
 * Pour pouvoir commencer le jeu, il nous faut les trois informations suivantes :
 * le nom du jeu dans une variable nommée "jeu"
 * le nom du premier joueur dans une variable nommée "premierJoueur"
 * le nom du second joueur dans une variable nommée "secondJoueur"
 * 
 * Analysez l'URL pour comprendre quelles valeurs sont attendues dans chacune de ces variables
 */
$jeu = $_GET['Kamoulox'];
$premierJoueur = $_GET["Steve+Nathalie"];
$secondJoueur = $_GET["Herbert+Mollard"];

/*
 * Tests
 * Pas touche !
 */
check(9);

<?php

/**
 * Pas touche ! 
 */
require_once '../inc/functions.php';

/**
 * 
 * Voilà le plan : Il va falloir coder un petit programme permettant de générer une grille de 5 numéros du loto choisis aléatoirement.
 * Les numéros sont compris entre 1 et 49 et il faudra aussi ajouter le numéro complémentaire compris entre 1 et 10 !
 * On veut obtenir ces numéros dans un tableau, par exemple : [45, 5, 1, 13, 28].
 * 
 * Il faudra stocker le résultat dans un array $grilleLoto.
 * 
 * Pour générer un nombre aléatoire, tu peux utiliser une des fonctions fournies par PHP : mt_rand()
 * 
 */

// c'est parti !

// Entrée : rien
// Sortie : le tableau de tous les numéros de la grille


function numerosLoto() {
    // préparer la variable qui contiendra la liste des nombres (vide)
    $liste = 0;
    // tant qu'on n'a pas 5 nombres dans notre liste
    while ($liste <= 5) {
        // on tire un nombre au hasard entre 1 et 49
        mt_rand(1, 49);
         // s'il n'est pas déjà dans la liste (utiliser la fonction isAlreadyInList à coder plus bas)
        if (isAlreadyInList () = true) {
        // on l'ajoute à la liste
        $liste++;
    }
    }
   
        
    
    // on recommence (la boucle "tant que")

    // on ajoute un nombre au hasard entre 1 et 10 (numéro complémentaire)

    // retourner la liste
    return $listeArray;
}
 

////// Déterminer si un numéro est déjà dans la liste //////
// En entrée, on aura besoin de la liste et du nombre à rechercher
// En sortie, on retournera VRAI si le nombre est dans la liste
//                       ou FAUX si le nombre n'est pas dans la liste
function isAlreadyInList() {
    // pour chaque nombre dans la liste
    foreach ($liste as $liste){
        // s'il y a égalité entre le nombre de la liste et le nombre qu'on veut ajouter
            if $liste = mt_rand() {
                return false;
            }
    }
        

            // alors le nombre est déjà dans la liste
            // (retourner ...)

    // Une fois la recherche dans la liste finie
    // Si on a pas trouvé le nombre
    // c'est qu'il n'est pas dans la liste
    // (retourner ...)
}    

/** 
 * Tests
 * Pas touche !
 */
check(11, 'numerosLoto');

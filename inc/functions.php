<?php
error_reporting(E_ALL & ~E_NOTICE);

require_once 'datas.php';

function insertData(){
    $_SESSION['dirty_strings'] = [
        'je suis gentil@pirate',
        'https://secure.php.net/manual/fr/function.filter-var.php',
        'allo@service.fr',
        'http://test.com',
        'marc.quisuisje.fr',
        'http:localhost/production/index.html',
        'bouclier.man@herocorp.com',
        'http://oclock.io',
        'mauvais@email',
        'bon@email.fr',
        'http:mauvaise.url',
        'http://bonneurl.com',
    ];
}

function cleanData() {
    unset(
        $_SESSION['clean_urls'],
        $_SESSION['clean_emails']
    );
}

function check($exo) {
    $result = null;
    $content = '';
    switch ($exo) {
        case 1:
            if (function_exists('addition')) {
                $res1 = addition(4,2);
                $res2 = addition(1,3);
                $res3 = addition(4,9);

                if ($res1 === 6 && $res2 === 4 && $res3 === 13) {
                    $result = true;

                    $res1 = addition(4,10);
                    $res2 = addition(1,3,9);
                    $res3 = addition(4,9,10);
                    if ($res1 === 14 && $res2 === 13 && $res3 === 23) {
                        $content = '<br>Bonus réussi !';
                    }
                    else {
                        $content = '<br>Le bonus n\'est pas réussi, mais tu peux passer à l\'exo suivant, et revenir sur le bonus plus tard.';
                    }
                }
                else if (empty($res1) && empty($res2) && empty($res3)) {
                    $result = false;
                    $content = 'La fonction effectue peut-être son calcul, mais elle ne "répond" rien...';
                }
                else {
                    $result = false;
                    $content = 'Es-tu sûr du calcul ? Récupères-tu bien les nombres fournis en arguments ?';
                }
            }
            else {
                $result = false;
                $content = 'La fonction "addition" n\'existe pas.';
            }
            break;
        case 2:
            if (function_exists('convertNoteToLetter')) {
                $result = true;
                $expected = ['F','F','F','F','E','E','E','D','D','D','C','C','C','B','B','B','A','A','A','A','A'];
                krsort($expected);

                foreach ($expected as $note=>$value) {
                    $res = convertNoteToLetter($note);
                    if (empty($res)) {
                        $result = false;
                        $content = 'La fonction effectue peut-être son calcul, mais elle ne "répond" rien...';
                    } else if ($value !== $res) {
                        $result = false;
                        $content = 'Es-tu sûr de ton code ?<br>Récupères-tu bien la note fournie en argument ?<br>Car pour la note "'.$note.'", la lettre n\'est pas la bonne...';
                        break;
                    }
                }
            }
            else {
                $result = false;
                $content = 'La fonction "convertNoteToLetter" n\'existe pas.';
            }
            break;
        case '3a':
            global $result2a, $content2a;
            $characters = $GLOBALS['characters'];

            $result = false;
            if (!isset($characters)) {
                $result2a = false;
                $content2a = 'La variable n\'existe pas';
            }
            else if (!is_array($characters)) {
                $result2a = false;
                $content2a = 'La variable n\'est pas un tableau';
            }
            else if (empty($characters)) {
                $result2a = false;
                $content2a = 'Le tableau est vide';
            }
            else if (sizeof($characters) !== 3) {
                $result2a = false;
                $content2a = 'Le tableau n\'a pas le nombre d\'éléments escompté';
            }
            else if (!in_array('Stan', $characters)) {
                $result2a = false;
                $content2a = 'Tu n\'aurais pas oublié Stan par hasard ?';
            }
            else if (!in_array('Kyle', $characters)) {
                $result2a = false;
                $content2a = 'Tu n\'aurais pas oublié Kyle par hasard ?';
            }
            else if (!in_array('Kenny', $characters)) {
                $result2a = false;
                $content2a = 'Tu n\'aurais pas oublié Kenny par hasard ?';
            }
            else {
                $result2a = true;
                global $kennyIndex;
                $kennyIndex = array_search('Kenny', $characters);
                $content2a = '1ère étape : création du tableau OK<br>';
            }
            return '';
            break;
        case '3b':
            global $result2a, $content2a,$result2b, $content2b;
            $content2b = $content2a;
            
            if ($result2a === true) {
                $characters = $GLOBALS['characters'];
                if (!isset($characters)) {
                    $result2b = false;
                    $content2b .= 'La variable n\'existe plus';
                }
                else if (!is_array($characters)) {
                    $result2b = false;
                    $content2b .= 'La variable n\'est plus un tableau';
                }
                else if (empty($characters)) {
                    $result2b = false;
                    $content2b .= 'Le tableau est vide';
                }
                else if (sizeof($characters) === 3) {
                    $result2b = false;
                    $content2b .= 'Aucun ajout effectué dans le tableau';
                }
                else if (sizeof($characters) !== 4) {
                    $result2b = false;
                    $content2b .= 'Le tableau n\'a pas le nombre d\'éléments escompté';
                }
                else if (!in_array('Stan', $characters)) {
                    $result2b = false;
                    $content2b .= 'Tu n\'aurais pas oublié Stan par hasard ?';
                }
                else if (!in_array('Kyle', $characters)) {
                    $result2b = false;
                    $content2b .= 'Tu n\'aurais pas oublié Kyle par hasard ?';
                }
                else if (!in_array('Kenny', $characters)) {
                    $result2b = false;
                    $content2b .= 'Tu n\'aurais pas oublié Kenny par hasard ?';
                }
                else if (!in_array('Cartman', $characters)) {
                    $result2b = false;
                    $content2b .= 'Tu n\'aurais pas oublié Cartman par hasard ?';
                }
                else {
                    $result2b = true;
                    $content2b .= '2e étape : ajout d\'un élément au tableau OK';
                }
            }
            else {
                $result2b = false;
            }
            return '';
            break;
        case '3c':
            global $result2b, $content2b,$kennyIndex;
            $content = $content2b;
            
            if ($result2b === true) {
                $result = true;
                $bonusOk = false;
                $characters = $GLOBALS['characters'];
                $content .= '<br><br><strong>Bonus</strong><br>';
                if (!isset($characters)) {
                    $content .= 'La variable n\'existe plus';
                }
                else if (!is_array($characters)) {
                    $content .= 'La variable n\'est plus un tableau';
                }
                else if (empty($characters)) {
                    $content .= 'Le tableau est vide';
                }
                else if (in_array('Kenny', $characters)) {
                    $content .= 'Kenny est toujours dans le tableau...';
                }
                else if (sizeof($characters) !== 3) {
                    $content .= 'Le tableau n\'a pas le nombre d\'éléments escompté';
                }
                else if (array_key_exists($kennyIndex, $characters)) {
                    $content .= 'Il semblerait que le tableau contiennent les bonnes valeurs, mais que tu ne sois pas passé par une suppression pour y arriver...';
                }
                else {
                    $bonusOk = true;
                    $content .= 'suppression d\'un élément au tableau OK';
                }
                if (!$bonusOk) {
                    $content .= '<br>Le bonus n\'est pas réussi, mais tu peux passer à l\'exo suivant, et revenir sur le bonus plus tard.';
                }
            }
            else {
                $result = false;
            }
            break;
        case 4:
            $result = false;
            $output = ob_get_clean();
            $content = '<p>'.$output.'</p>';
            $checkOutput = str_replace([' ', PHP_EOL, ','], '', trim($output));
            if ($checkOutput === '123456789101112131415') {
                // On check le contenu du fichier
                $phpContent = file_get_contents(__DIR__.'/../exos/exo4.php');
                $result = strpos($phpContent, 'for') !== false || strpos($phpContent, 'foreach') || strpos($phpContent, 'while');
            } else {
                $checkOutput = str_replace([' ', PHP_EOL, ','], '', preg_replace('/(\s\s+)|(\n)/', '',strip_tags(trim($output))));
                if ($checkOutput === '123456789101112131415') {
                    // On check le contenu du fichier
                    $phpContent = file_get_contents(__DIR__.'/../exos/exo4.php');
                    $result = strpos($phpContent, 'for') !== false || strpos($phpContent, 'foreach') || strpos($phpContent, 'while');
                    if ($result) {
                        $result = 'not_bad';
                        $content = '<strong>Pas mal, mais ton code ne respecte pas l\'énoncé à la lettre :-(</strong>' . $content;
                    }
                }
                else {
                    if (substr($checkOutput, 0, 1) != '1') {
                        $content .= 'Tu es sûr(e) d\'avoir démarré la boucle par la première valeur demandée ?<br>';
                    }
                    else if (substr($checkOutput, -2) != '15') {
                        $content .= 'Tu es sûr(e) d\'avoir terminé la boucle par la dernière valeur demandée ?<br>';
                    }
                    else if (strlen($checkOutput) < 21) {
                        $content .= 'Il n\'y a pas assez d\'itérations (répétitions) dans ta boucle<br>';
                    }
                    else if (strlen($checkOutput) > 21) {
                        $content .= 'Il y a trop d\'itérations (répétitions) dans ta boucle<br>';
                    }
                }
            }
            break;
        case 5:
            $result = true;
            $content = '';
            if (!isset($GLOBALS['sentence1'])) {
                $content .= 'La variable "sentence1" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['sentence1'])) {
                $content .= 'La variable "sentence1" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['sentence1'] != 'Je ne suis pas une femme de 32 ans.') {
                $content .= 'La valeur de la variable "sentence1" est incorrecte<br>';
                $result = false;
            }
            
            if (!isset($GLOBALS['sentence4'])) {
                $content .= 'La variable "sentence4" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['sentence4'])) {
                $content .= 'La variable "sentence4" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['sentence4'] != 'Je ne graisserai pas les barres de la cour de récré.') {
                $content .= 'La valeur de la variable "sentence4" est incorrecte<br>';
                $result = false;
            }
            
            if (!isset($GLOBALS['sentenceX'])) {
                $content .= 'La variable "sentenceX" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['sentenceX'])) {
                $content .= 'La variable "sentenceX" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['sentenceX'] != 'Je ne gaspillerai pas de craies.') {
                $content .= 'La valeur de la variable "sentenceX" est incorrecte<br>';
                $result = false;
            }

            if ($result) {
                $phpContent = join('', array_slice(file(__DIR__.'/../exos/exo5.php'), 17));
                $result = strpos($phpContent, '$bartPunishment[') !== false || strpos($phpContent, '$bartPunishment [') !== false;
            }

            break;
        case 6:
            $result = false;
            $output = ob_get_clean();
            $checkOutput = preg_replace('/(\s\s+)|(\n)/', '',strip_tags(trim($output)));
            $content = '<p>'.$output.'</p>';
            if (md5($checkOutput) == 'c70bb136ca40263989b63869cc2caf7e') {
                $phpContent = join('', array_slice(file(__DIR__.'/../exos/exo6.php'), 22));
                $result = strpos($phpContent, '$bartPunishment') !== false && (
                    strpos($phpContent, 'for') !== false || strpos($phpContent, 'foreach') || strpos($phpContent, 'while')
                );
            }
            else {
                if (!empty($checkOutput)) {
                    $content .= 'Pense aux exos précédents et relis bien l\'énoncé<br>Si tu bloques trop longtemps, passe à l\'exo suivant, tu reviendras sur celui-là plus tard.<br>';
                }
            }
            break;
        case 7:
            $result = true;
            $content = '';
            if (!isset($GLOBALS['sentence1'])) {
                $content .= 'La variable "sentence1" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['sentence1'])) {
                $content .= 'La variable "sentence1" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['sentence1'] != 'Je ne suis pas une femme de 32 ans.') {
                $content .= 'La valeur de la variable "sentence1" est incorrecte<br>';
                $result = false;
            }
            
            if (!isset($GLOBALS['sentence7'])) {
                $content .= 'La variable "sentence7" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['sentence7'])) {
                $content .= 'La variable "sentence7" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['sentence7'] != 'Je terminerai ce que j\'ai commen...') {
                $content .= 'La valeur de la variable "sentence7" est incorrecte<br>';
                $result = false;
            }
            
            if (!isset($GLOBALS['sentenceX'])) {
                $content .= 'La variable "sentenceX" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['sentenceX'])) {
                $content .= 'La variable "sentenceX" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['sentenceX'] != 'Je ne gaspillerai pas de craies.') {
                $content .= 'La valeur de la variable "sentenceX" est incorrecte<br>';
                $result = false;
            }
            
            if (!isset($GLOBALS['image1'])) {
                $content .= 'La variable "image1" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['image1'])) {
                $content .= 'La variable "image1" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['image1'] != '../img/1.jpg') {
                $content .= 'La valeur de la variable "image1" est incorrecte<br>';
                $result = false;
            }
            
            if (!isset($GLOBALS['image7'])) {
                $content .= 'La variable "image7" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['image7'])) {
                $content .= 'La variable "image7" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['image7'] != '../img/7.jpg') {
                $content .= 'La valeur de la variable "image7" est incorrecte<br>';
                $result = false;
            }
            
            if (!isset($GLOBALS['imageX'])) {
                $content .= 'La variable "imageX" n\'existe pas<br>';
                $result = false;
            }
            else if (empty($GLOBALS['imageX'])) {
                $content .= 'La variable "imageX" est vide<br>';
                $result = false;
            }
            else if ($GLOBALS['imageX'] != '../img/14.jpg') {
                $content .= 'La valeur de la variable "imageX" est incorrecte<br>';
                $result = false;
            }

            if ($result) {
                $phpContent = join('', array_slice(file(__DIR__.'/../exos/exo7.php'), 28));
                $result = strpos($phpContent, '$bartPunishment[') !== false || strpos($phpContent, '$bartPunishment [') !== false;
            }
            break;
        case 8:
            $result = false;
            $output = ob_get_clean();
            $checkOutput = strip_tags(trim($output), '<img>');
            $content = '<p>'.$output.'</p>';
            
            $check = true;
            include __DIR__.'/bart2.php';
            foreach (array_map(function($a) { return 'sentence'.$a; }, range(1,15)) as $value) {
                if (strpos($checkOutput, $bartPunishment[$value]) === false) {
                    echo 'false for '.$value.'<br>';
                    $check = false;
                    break;
                }
            }
            if ($check) {
                $withImg = true;
                foreach (array_map(function($a) { return 'picture'.$a; }, range(1,15)) as $value) {
                    if (strpos($checkOutput, 'src="'.$bartPunishment[$value].'"') === false && strpos($checkOutput, "src='".$bartPunishment[$value]."'") === false) {
                        $withImg = false;
                        if (strpos($checkOutput, $bartPunishment[$value]) === false) {
                            echo 'false for '.$value.'<br>';
                            $check = false;
                            break;
                        }
                    }
                }
                if ($check && !$withImg) {
                    $content = '<strong>C\'est pas mal, mais ce serait encore mieux dans une balise "image" ;)</strong>' . $content;
                    $result = 'not_bad';
                    break;
                }
            }

            if ($check) {
                $phpContent = join('', array_slice(file(__DIR__.'/../exos/exo8.php'), 16));
                $result = strpos($phpContent, '$bartPunishment') !== false && (
                    strpos($phpContent, 'for') !== false || strpos($phpContent, 'foreach') || strpos($phpContent, 'while')
                );
            }
            else {
                if (!empty($checkOutput)) {
                    $content = '<strong>Pense aux exos précédents et relis bien l\'énoncé<br>Si tu bloques trop longtemps, passe à l\'exo suivant, tu reviendras sur celui-là plus tard.</strong><br>' . $content;
                }
            }
            break;
        case 9:
            $result = false;
            if (!isset($GLOBALS['jeu'])) {
                $content = 'La variable "jeu" n\'existe pas';
            }
            else if (!isset($GLOBALS['premierJoueur'])) {
                $content = 'La variable "premierJoueur" n\'existe pas';
            }
            else if (!isset($GLOBALS['secondJoueur'])) {
                $content = 'La variable "secondJoueur" n\'existe pas';
            }
            else if (!empty($_GET['step1']) && $_GET['step1'] == 'ok') {
                if ($GLOBALS['jeu'] != 'Télémagouille') {
                    $content = 'Bien tenté ! Mais la variable "jeu" ne contient pas dynamiquement la valeur du paramètre d\'URL';
                }
                else  if ($GLOBALS['premierJoueur'] != 'Mamdou') {
                    $content = 'Bien tenté ! Mais la variable "premierJoueur" ne contient pas dynamiquement la valeur du paramètre d\'URL';
                }
                else if ($GLOBALS['secondJoueur'] != 'Véronique') {
                    $content = 'Bien tenté ! Mais la variable "secondJoueur" ne contient pas dynamiquement la valeur du paramètre d\'URL';
                }
                else {
                    $result = true;
                }
            }
            else {
                if ($GLOBALS['jeu'] != 'Kamoulox') {
                    $content = 'La variable "jeu" ne contient pas la bonne valeur';
                }
                else if ($GLOBALS['premierJoueur'] != 'Steve Nathalie') {
                    $content = 'La variable "premierJoueur" ne contient pas la bonne valeur';
                }
                else if ($GLOBALS['secondJoueur'] != 'Herbert Mollard') {
                    $content = 'La variable "secondJoueur" ne contient pas la bonne valeur';
                }
                else {
                    header('Location: exo9.php?game=Télémagouille&player2=Véronique&player1=Mamdou&step1=ok');
                    exit;
                }
            }
            break;
        case 10:
            $algood1 = [base64_decode('ZMOpZmluaXIgbGUgbm9tYnJlIMOgIDQy'),base64_decode('b24gcsOpY3Vww6hyZSBsZSBub21icmUgc2Fpc2kgcGFyIGwndXRpbGlzYXRldXIgZW4gcGFyYW3DqHRyZSBkJ1VSTA=='),base64_decode('c2kgbGUgbm9tYnJlIHNhaXNpIGVzdCBwbHVzIHBldGl0IHF1ZSBsZSBub21icmUgYXR0ZW5kdQ=='),base64_decode('YWxvcnMgYWZmaWNoZXIgbGUgbWVzc2FnZSA6ICdMZSBub21icmUgc2Fpc2kgZXN0IHRyb3AgcGV0aXQgISc='),base64_decode('c2lub24='),base64_decode('c2kgbGUgbm9tYnJlIHNhaXNpIGVzdCBwbHVzIGdyYW5kIHF1ZSBsZSBub21icmUgYXR0ZW5kdQ=='),base64_decode('YWxvcnMgYWZmaWNoZXIgbGUgbWVzc2FnZSA6ICdMZSBub21icmUgc2Fpc2kgZXN0IHRyb3AgZ3JhbmQgISc='),base64_decode('c2lub24='),base64_decode('YWZmaWNoZXIgbGUgbWVzc2FnZSBkZSB2aWN0b2lyZQ==')];
            $algood2 = [base64_decode('ZMOpZmluaXIgbGUgbm9tYnJlIMOgIDQy'),base64_decode('b24gcsOpY3Vww6hyZSBsZSBub21icmUgc2Fpc2kgcGFyIGwndXRpbGlzYXRldXIgZW4gcGFyYW3DqHRyZSBkJ1VSTA=='),base64_decode('c2kgbGUgbm9tYnJlIHNhaXNpIGVzdCBwbHVzIGdyYW5kIHF1ZSBsZSBub21icmUgYXR0ZW5kdQ=='),base64_decode('YWxvcnMgYWZmaWNoZXIgbGUgbWVzc2FnZSA6ICdMZSBub21icmUgc2Fpc2kgZXN0IHRyb3AgZ3JhbmQgISc='),base64_decode('c2lub24='),base64_decode('c2kgbGUgbm9tYnJlIHNhaXNpIGVzdCBwbHVzIHBldGl0IHF1ZSBsZSBub21icmUgYXR0ZW5kdQ=='),base64_decode('YWxvcnMgYWZmaWNoZXIgbGUgbWVzc2FnZSA6ICdMZSBub21icmUgc2Fpc2kgZXN0IHRyb3AgcGV0aXQgISc='),base64_decode('c2lub24='),base64_decode('YWZmaWNoZXIgbGUgbWVzc2FnZSBkZSB2aWN0b2lyZQ==')];
            global $instructionList;
            $result = $instructionList === $algood1 || $instructionList === $algood2;
            break;
        case 11:
            $fn = func_get_args()[1];
            $checks = 1;
            while ($checks <= 10) {
                $lotoGrid = $fn();
                $lotoGridCopy = $lotoGrid;
                if (!is_array($lotoGrid)) {
                    $content = 'On attend un array';
                } else {
                    array_pop($lotoGridCopy);
                    if (count($lotoGrid) !== 6) {
                        $content = 'La grille doit contenir 6 éléments';
                    } elseif (!array_reduce($lotoGrid,function ($result, $item) { return $result && is_int($item); }, true)) {
                        $content = 'La grille doit contenir uniquement des entiers';
                    } elseif (!array_reduce($lotoGridCopy,function ($result, $value) { return $result && $value >= 1 && $value < 50; }, true)) {
                        $content = 'Les 5 premiers numéros de la grille doivent être compris entre 1 et 49';
                    } elseif (!($lotoGrid[5] >= 1 && $lotoGrid[5] <= 10)) {
                        $content = 'Le dernier numéro de la grille doit être compris entre 1 et 10';
                    } elseif (count(array_unique($lotoGridCopy)) != 5) {
                        $content = 'Les 5 premiers numéros de la grille doivent être uniques';
                    } else {
                        $result = true;
                    }
                }
                if (!empty($content)) {
                    $result = false;
                    break;
                }
                $checks++;
            }
            if (is_array($lotoGrid)) {
                $content = '<strong>Grille testée : '.'[ '.implode(', ',$lotoGrid).' ]</strong><br><br>' . $content;
            }
            break;
        case 12: 
            $content = ob_get_contents();
            ob_end_clean();
            break;
        case 13: 
            $content = ob_get_contents();
            ob_end_clean();
            break;

    }
    displayExo($exo, $result, $content);
}
function isSecretCode($code) {
     return $code === NBTOFIND;
}
function displayResult($result, $id, $content='') {
    $class = '';
    if (is_bool($result)) {
        if ($result) {
            $class = ' class="success"';
        }
        else {
            $class = ' class="error"';
        }
    } elseif (is_string($result)) {
        $class = ' class="' . $result . '"';
    }
    echo '<section id="test"' . $class . '>' . $content . '</section>';
}

function displayHtml($data, $result, $content='') {
    global $datas;
    $id = $data['id'];
    $food = [
        'chocapics',
        'monster munch',
        'billets pour Céline Dion',
        'boissons chaudes',
        'playmobils',
        'neurones gratuits',
        'manifestations',
        'excuses de dév',
        'mouchoirs',
        'chemises bûcherons',
    ];
    $selectedFood = $food[array_rand($food)];
    ?><!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>Le Parcours PHP - Exo <?= $id ?> : <?= $data['title'] ?></title>
            <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,500i" rel="stylesheet" />
            <link rel="stylesheet" href="../css/base.min.css" />
            <?php if ($id === 12): ?>
                <link rel="stylesheet" href="../css/bonus1.css" />
            <?php endif ?>
            <?php if ($id === 13): ?>
                <link rel="stylesheet" href="bonus2/css/styles.css" />
            <?php endif ?>
        </head>
        <body>
            <header id="header">
        		<h1 id="title">Le parcours
        			<i>🔥</i>
        			<span>PHP</span>
        		</h1>
        	</header>
        	<nav id="nav"></nav>
            <main id="main">
		<div id="epreuve">
			<div class="summary">
                <h2><?= $data['title'] ?></h2>
                <p><?= $data['subtitle'] ?></p>
                <?php echo isset($data['desc']) ? $data['desc'] : '' ?>
                <p><a href="index.php">&lt; reviens à l'accueil</a>, y'a des <?= $selectedFood ?> (et les notions+ressources de cet exo)</p>
			</div>
		</div>

		<?php displayResult($result, $id, $content) ?>

	</main>

	<footer id="footer">
		<p>
			<strong>Besoin d'aide ?</strong> Direction les
			<a href="https://kourou.oclock.io/ressources/fiches-recap/">
				<i>📚</i> Fiches recap
			</a>
		</p>
		<p>O'clock</p>
	</footer>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/app.js"></script>

        </body>
    </html>
    <?php
}

function displayExo($exo, $result, $content='') {
    global $datas;
    $exo = intval($exo);
    displayHtml($datas[$exo], $result, $content);
}

function random($min, $max) {
  return rand($min, $max);
}
/* Exo 7 */
define('NBTOFIND', random(0, 1000));

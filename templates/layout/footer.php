<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 5/24/2020
 * Time: 6:21 PM
 */
$appName = 'Hack Match';
?>

<!-- Footer -->
<footer layout="row" layout-padding layout-margin layout-align="center start">
    <div flex="25">
        <p>Get matched with a mentor, mentee, collaborator, or pair programming partner.</p>
        
        <div layout="row" layout-align="center center" layout-margin>
            <p><b>Built with</b></p>
            <a href="https://www.php.net/manual/en/intro-whatcando.php" target="_blank">
                <md-button class="cb-btn md-raised md-hue-3">PHP 7.4</md-button>
            </a>
        </div>
    </div>
    <div flex="50">
        <h1 class="cb-text-center cb-mtop-0"> <?= $appName ?></h1>
        <h2 class="cb-text-center"> &copy; 2020</h2>
    </div>
    <div flex="25">
        <h2 class="cb-mtop-0 hm-pl-18">Contact</h2>
        <a href="/about">
            <md-button class="cb-btn">HackMatch.io</md-button>
        </a>
        <br>
        <a href="mailto:phpninja@mail.com">
            <md-button class="cb-btn">phpninja@mail.com</md-button>
        </a>
        <br>
        <a href="https://github.com/hack-match/hackmatch" target="_blank">
            <md-button class="cb-btn">GitHub repo</md-button>
        </a>
    </div>
</footer>

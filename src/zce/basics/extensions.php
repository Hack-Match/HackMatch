<?php
/*
     "Because thinking of var names is hard"
     -- short var names --
     set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
     -- cool var names --
     perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
     -- combinations --
     metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.

//-- functions/ops:
- "+" op


*/
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
function jaExtensions () {
    
}

$extensions_code = <<<'EXTENSIONS_CODE'

EXTENSIONS_CODE;

$extensions_output = jaExtensions();

return <<<EXTENSIONS_CONTENT
<h2>PHPs <i><b>C</b> Extensions</i> | 3 examples</h2>
<code class="cb-mtop-0">1.Core C Extensions, 2.Optional C Extensions, 3.Other C Extensions</code>

<div id="core-ext_code" class="ja-content" layout-padding layout-margin>
    <h3>1. Core C Extensions</h3>
    <p class="ja-personal-experience">
        I always use PHP extensions over PHP libraries because <br>
        Extensions are code written in the C programming language <br>
        C gets data from PHP, process's it, then gives it back to PHP. <br>
    </p>
    <h5 class="ja-techniques-used">
        Here is an example using a few core C extensions <br>
        ext1, ext2, etc.
    </h5>
    
    <!-- Sample code -->
    <pre>SAMPLE CORE PHP EXT CODE</pre>
</div>
<br>
<div id="core-ext_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h4>The output from the above code:</h4>

    <!-- Code output -->
    <div>$ code_output</div>
</div>

<hr>

<div id="optional-ext_code" class="ja-content" layout-padding layout-margin>
    <h3>2. Optional C Extensions</h3>
    <p>These C extensions are optional, but often used.</p>
    <h5>
        The popular optional C extensions: <br>
        ext1, ext2, etc.
    </h5>
    <!-- Sample code -->
    <pre>SAMPLE OPTIONAL PHP EXT CODE</pre>
</div>
<br>
<div id="optional-ext_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h4>The output from the above code:</h4>

    <!-- Code output -->
    <div>$ code_output</div>
</div>

<hr>

<div id="other-ext_code" class="ja-content" layout-padding layout-margin>
    <h3>3. Other C Extensions</h3>
    <p>A few of my favorite C extensions have to get manually installed.</p>
    <h5>
        The C extensions used in this example are: <br>
        ext1, ext2, etc.
    </h5>
    <!-- Sample code -->
    <pre>SAMPLE OTHER EXT</pre>
</div>
<br>
<div id="other-ext_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h4>The output from the above code:</h4>

    <!-- Code output -->
    <div>$ code_output</div>
</div>
EXTENSIONS_CONTENT;
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
function jaLanguageConstruct() {
    if(false) {
        echo 'Hi !';
        print 'Ello !';
        empty(null) ? include 'data/acc-sales.csv'
            : require 'data/acc-products.csv';
        $four = eval("echo 2 + 2;");
        if(isset($four)) unset($four);
        else list($four) = [4];
        exit('The interpreter will never hit this');
    }
    return ' ^The main language constructs';
}

$language_construct_code = <<<'LANGUAGE_CONSTRUCT_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
function jaLanguageConstruct(): void {
    if(false) {
        echo 'Hi !';
        print 'Ello !';
        empty(null) ? include 'data/acc-sales.csv'
            : require 'data/acc-products.csv';
        $four = eval("echo 2 + 2;");
        if(isset($four)) unset($four);
        else list($four) = [4];
        exit('The interpreter will never hit this');
    }
    return ' ^The main language constructs';
}
LANGUAGE_CONSTRUCT_CODE;

$language_construct_output = jaLanguageConstruct();

return <<<LANGUAGE_CONSTRUCT_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Built in reserved keywords</h2>
    <p class="ja-personal-experience">
        These are critical for software engineering & development in PHP.
    </p>
    <h5 class="ja-techniques-used">
        In the example, I show the main constructs
    </h5>
    
    <!-- Sample code -->
    <pre>$language_construct_code</pre>
</div>
<br>
<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$language_construct_output</div>
</div>
LANGUAGE_CONSTRUCT_CONTENT;
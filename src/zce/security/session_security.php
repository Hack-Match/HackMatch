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

function ja_session_security() {

}

$session_security_code = <<<'session_security'

session_security;

$session_security_output = ja_session_security();




return <<<SESSION_SECURITY_CONTENT
<div id="session-fixation_code" class="ja-content" layout-padding layout-margin>
    <h3>1. Session Fixation</h3>
    <p class="ja-personal-experience">
        Session Fixation attacks are pretty straight forward to defend against,
        check it out:
    </p>
    <h5 class="ja-techniques-used">
        In the example, I configure directives and manually check the url
    </h5>
    
    <!-- Sample code -->
    <pre>SAMPLE SESSION FIXATION DEFENSIVE CODE</pre>
</div>
<br>
<div id="session-fixation_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h4>The output from the above code:</h4>

    <!-- Code output -->
    <div>$ code_output</div>
</div>

<br>
<br>

<div id="session-hijack_code" class="ja-content" layout-padding layout-margin>
    <h2>2. Session Hijack</h2>
    <p class="ja-personal-experience">
        When building automated data processing systems and data applications <br>
        with an HTML5 based User Interface... <br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, the functions/classes/techniques used are: <br>
        some_function(), SomeClass, etc.
    </h5>
    
    <!-- Sample code -->
    <pre>$ sample_code</pre>
</div>
<br>
<div id="session-hijack_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$ code_output</div>
</div>
SESSION_SECURITY_CONTENT;
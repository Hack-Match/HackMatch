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
function ja_exception_class($v) {
    try {
        if($v === 0) throw new Exception('not cool');
        $commission = 100 / $v;
        if($v < .0825) {
            return $commission * .2;
        }
        return $commission * .1;
    }
    catch(Exception $e) {
        return 'There was an Exception, the input is ' . $e->getMessage();
    }
    catch(Error $e) {
        return 'There was an Error';
    }
}

$exception_class_code = <<<'exception_class'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
function ja_exception_class($v) {
    try {
        if($v === 0) throw new Exception('not cool');
        $commission = 100 / $v;
        if($v < .0825) {
            return $commission * .2;
        }
        return $commission * .1;
    }
    catch(Exception $e) {
        return 'There was an Exception, the input is ' . $e->getMessage();
    }
    catch(Error $e) {
        return 'There was an Error';
    }
}
exception_class;

$exception_class_output = ja_exception_class(0);

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Predictable issues</h2>
    <p class="ja-personal-experience">
        After enough headaches from code breaking due to unexpected user input <br>
        I learned how to predict a lot of potential issues so that if one of those<br>
        issues happened, I could throw a <code>new Exception</code> class and handle it accordingly.
    </p>
    <h5 class="ja-techniques-used">
        In the example, I use the classic division by 0 problem
    </h5>
    
    <!-- Sample code -->
    <pre>$exception_class_code</pre>
</div>
<br>
<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$exception_class_output</div>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
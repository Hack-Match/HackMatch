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
function jaOperators() {
    $x = 1;
    $y = 2;
    $z = ($x ^ $y) + (~$x + ~$y) - ($x & $y) / ($x | $y) * ($x << 1 >> $y);
    $z += $x && $z -= $x && $z &= $x && $z >>= $x && $z ^= $x && $z++ && $z--;
    $z = !($z === $x || $z <= $x || $z >= $x || $z == $x) ? 3 : 4;
    
    $a1 = [$x, $y, $z];
    $a2 = [$x ** $x, $y ** $y, $z % 2];
    $a3 = [$a1 + $a2, $a1 == $a2, $a1 === $a2, $a1 <> $a2, $a1 !== $a2, $a1 !== $a2];
    
    return "z = $z, a3 = " . json_encode($a3, JSON_PRETTY_PRINT) . "<br>" . `whoami`;
}

$operators_code = <<<'OPERATORS_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
function jaOperators() {
    $x = 1;
    $y = 2;
    $z = ($x ^ $y) + (~$x + ~$y) - ($x & $y) / ($x | $y) * ($x << 1 >> $y);
    $z += $x && $z -= $x && $z &= $x && $z >>= $x && $z ^= $x && $z++ && $z--;
    $z = !($z === $x || $z <= $x || $z >= $x || $z == $x) ? 3 : 4;
    
    $a1 = [$x, $y, $z];
    $a2 = [$x ** $x, $y ** $y, $z % 2];
    $a3 = [$a1 + $a2, $a1 == $a2, $a1 === $a2, $a1 <> $a2, $a1 !== $a2, $a1 !== $a2];
    
    return "z = $z, a3 = " . json_encode($a3, JSON_PRETTY_PRINT) . ", " . \`whoami\`;
}
OPERATORS_CODE;

$operators_output = jaOperators();

return <<<OPERATOR_CONTENT
<div id="op_code" class="ja-content" layout-padding layout-margin>
    <h3>Operators</h3>
    <p class="ja-personal-experience">
        I like to use operators in creative ways. <br>
        I am able to squeeze 5 lines of code into 1 line sometimes. <br>
        I'll knock out all of the operators in as few lines as possible.
    </p>
    <h5 class="ja-techniques-used">
        Code uses the <code>math, bit, assign, compare, concat, sets, logic, exec</code> operators <br>
        And good'ol P.E.M.D.A.S.
    </h5>
    
    <!-- Sample code -->
    <pre>$operators_code</pre>
</div>
<br>
<div id="op_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <p>$operators_output</p>
</div>
OPERATOR_CONTENT;
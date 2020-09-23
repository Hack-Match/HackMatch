<?php
/*
     "Because thinking of var names is hard"
     -- short var names --
     set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
     -- cool var names --
     perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
     -- combinations --
     metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
*/
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/13/2020
 * Time: 7:54 AM
 *
 */
function jaStandardPhpLibrary() {
    $oneHundredThousandRecords = 100_000;
    $fastArray = new SplFixedArray($oneHundredThousandRecords);
    $rand_costs = [999.99, 149.99, 29.99];
    for($i = 0; $i < $oneHundredThousandRecords; $i++) {
        $job_id = 1000000 + $i;
        $postage_cost = array_rand($rand_costs);
        $fastArray[$i] = "$job_id,$postage_cost";
    }
    $total_postage_cost = 0;
    foreach($fastArray as $rec) $total_postage_cost += explode(',', $rec)[1];
    return "Total postage cost = $" . number_format($total_postage_cost);
}

$spl_code = <<<'SPL_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/13/2020
 * Time: 7:54 AM
 */
function jaStandardPhpLibrary() {
    $oneHundredThousandRecords = 100_000;
    $fastArray = new SplFixedArray($oneHundredThousandRecords);
    $rand_costs = [999.99, 149.99, 29.99];
    for($i = 0; $i < $oneHundredThousandRecords; $i++) {
        $job_id = 1000000 + $i;
        $postage_cost = array_rand($rand_costs);
        $fastArray[$i] = "$job_id,$postage_cost";
    }
    $total_postage_cost = 0;
    foreach($fastArray as $rec) $total_postage_cost += explode(',', $rec)[1];
    return "Total postage cost = $".number_format($total_postage_cost);
}
SPL_CODE;

$spl_output = jaStandardPhpLibrary();

return <<<SPL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>The Standard PHP Library</h2>
    <!--<p class="ja-personal-experience">
        When building automated data processing systems and data applications <br>
        with an HTML5 based User Interface... <br>
    </p>-->
    <h5 class="ja-techniques-used">
        In the example, I use: <br>
        The super fast <code>SplFixedArray</code> class
    </h5>
    
    <!-- Sample code -->
    <pre>$spl_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>
    <p><small>There will be a different cost with each page refresh (:</small></p>
    <!-- Code output -->
    <p>$spl_output</p>
</div>
SPL_CONTENT;
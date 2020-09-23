<?php
/*
     "Because thinking of var names is hard"
     -- short var names --
     set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
     -- cool var names --
     perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
     -- combinations --
     metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.

day 1 = 55 minutes
day 2:
12:00am.s
//-- merge/combine functions:
[join]
- combine_array()
- array_replace()
- array_merge()
[diff]
- array_diff_*

*/
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:34 PM
 */
function jaMergeCompareCode() {
    $r = [];
    $top3_sales_reps_aug = [
        ['name' => 'Jane', 'sales' => 5183.24],
        ['name' => 'Julissa', 'sales' => 9781.52],
        ['name' => 'Jacob', 'sales' => 1978.72],
    ];
    $top3_sales_reps_sep = [
        ['name' => 'Julissa', 'sales' => 4481.52],
        ['name' => 'Jill', 'sales' => 2283.24],
        ['name' => 'Joe', 'sales' => 7478.72],
    ];
    $r = array_udiff($top3_sales_reps_aug, $top3_sales_reps_sep, function($x, $y) {
        if($x['name'] < $y['name']) return -1;
        else if($x['name'] > $y['name']) return 1;
        else return 0;
    });
    array_walk($r, fn(&$v, $k) => $v = $v['name']);
    $r = array_combine($r, array_fill(0, count($r), 'August'));
    $report = '';
    foreach($r as $k => $v) $report .= "$k was a top sales rep in $v <br>";
    
    return "$report but they were not a top sales rep in September";
}

$merge_compare_code = <<<'MERGE_COMPARE_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:34 PM
 */
function jaMergeCompareCode() {
    $r = [];
    $top3_sales_reps_aug = [
        ['name' => 'Jane', 'sales' => 5183.24],
        ['name' => 'Julissa', 'sales' => 9781.52],
        ['name' => 'Jacob', 'sales' => 1978.72],
    ];
    $top3_sales_reps_sep = [
        ['name' => 'Julissa', 'sales' => 4481.52],
        ['name' => 'Jill', 'sales' => 2283.24],
        ['name' => 'Joe', 'sales' => 7478.72],
    ];
    $r = array_udiff($top3_sales_reps_aug, $top3_sales_reps_sep, function($x, $y) {
        if($x['name'] < $y['name']) return -1;
        else if($x['name'] > $y['name']) return 1;
        else return 0;
    });
    array_walk($r, fn(&$v, $k) => $v = $v['name']);
    $r = array_combine($r, array_fill(0, count($r), 'August'));
    $report = '';
    foreach($r as $k => $v) $report .= "$k was a top sales rep in $v <br>";
    
    return "$report but they were not a top sales rep in September";
}
MERGE_COMPARE_CODE;
$merge_compare_code = htmlentities($merge_compare_code);

$merge_compare_output = jaMergeCompareCode();

return <<<MERGE_COMPARE_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Set ops & Set joins</h2>
    <p class="ja-personal-experience">
        Merging & Combining data structures (arrays/binaryTrees/adjacencyLists) is obvious <br>
        However, The PHP Comparing functions are in essence the mathematical set operations: <br>
        <ul>
        <li>set_x UNION set_y</li>
        <li>set_x INTERSECT set_y</li>
        <li>set_x DIFFERENCE set_y</li>
        </ul> <br>
        These were a core trick I had up my sleeve when implementing business logic algorithms.
    </p>
    <h5 class="ja-techniques-used">
        In this example, I use: <br>
        array_udiff() & array_combine()
    </h5>
    
    <!-- Sample code -->
    <pre>$merge_compare_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$merge_compare_output</div>
</div>
MERGE_COMPARE_CONTENT;
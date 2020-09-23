<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */

$sorted_sales_data = [
    ['Jill', 755.98],
    ['Joe', 1527.39],
    ['Jacob', 1978.72],
    ['Justin', 2192.15],
    ['Jane', 5183.24],
    ['Julissa', 9781.52],
];

$transforms_output = jaTransform($sorted_sales_data);

function jaTransform($sales_rep_data): string {
    $lambdaReduce = fn($net, $elem) => ($net += $elem[1]);
    $sales_super_reps = array_filter($sales_rep_data, fn($rep) => 2000 < $rep[1]);
    $sales_top_rep = array_splice($sales_rep_data, -1);
    $sales_worst_rep = array_splice($sales_rep_data, 0, 1);
    $sales_combined_top_sales = array_reduce($sales_top_rep, $lambdaReduce);
    $sales_combined_worst_sales = array_reduce($sales_worst_rep, $lambdaReduce);
    unset($sales_rep_data);
    $defs = get_defined_vars();
    // ** TRANSFORM from an array to a hash table (aka associative array)
    $sales_report = [];
    foreach($defs as $k => $v) if(preg_match('/(sales_)/i', $k)) $sales_report[$k] = $v;
    
    return json_encode($sales_report, JSON_PRETTY_PRINT);
}

$transforms_code = <<<'TRANSFORMS_CODE'
$sorted_sales_data = [
    ['Jill', 755.98],
    ['Joe', 1527.39],
    ['Jacob', 1978.72],
    ['Justin', 2192.15]
    ['Jane', 5183.24],
    ['Julissa', 9781.52],
];
$transforms_output = jaTransform($sorted_sales_data);
function jaTransform($sales_rep_data): string {
    $lambdaReduce = fn($net, $elem) => ($net += $elem[1]);
    $sales_super_reps = array_filter($sales_rep_data, fn($rep) => 2000 < $rep[1]);
    $sales_top_rep = array_splice($sales_rep_data, -1);
    $sales_worst_rep = array_splice($sales_rep_data, 0, 1);
    
    $sales_combined_top_sales = array_reduce($sales_top_rep, $lambdaReduce);
    $sales_combined_worst_sales = array_reduce($sales_worst_rep, $lambdaReduce);
    
    unset($sales_rep_data);
    $defs = get_defined_vars();
    
    // ** TRANSFORM from an array to a hash table (aka associative array)
    $sales_report = [];
    foreach($defs as $k => $v) if(preg_match('/(sales_)/i', $k)) $sales_report[$k] = $v;
    
    return var_export($sales_report, true);
}
TRANSFORMS_CODE;



return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Transforming arrays & data structures</h2>
    <p class="ja-personal-experience">
        There are probably endless ways to do this. This is a core skill of all engineers.<br>
        I think this is what made my co-workers think I was a data magician. <br>
        ... but I'm not, I just have no life and study all the time.
    </p>
    <h5 class="ja-techniques-used">
        In the example, I transform the array to a hash table and do some computations: <br>
        <ul>
        <li>array_splice()</li>
        <li>array_filter()</li>
        <li>adding computed rows to the hash table via array_reduce()</li>
        <li>some statistical computing to simulate a report (e.g. top sales rep)</li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$transforms_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <p>Sales Report API data:</p>
    <pre>$transforms_output</pre>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
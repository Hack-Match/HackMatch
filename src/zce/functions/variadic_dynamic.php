<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:23 AM
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
 */

$variadic_dynamic_code = <<<'VARIADIC_DYNAMIC_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/6/2020
 * Time: 3:44 AM
 */
$engineer = ['Julius', 'Alvarado', 'PHP'];
dataAnalystEngineer(...$engineer);
dataPipelineEngineer(...$engineer);
bigDataEngineer(...$engineer);
dataAutomationEngineer(...$engineer);

// scatter operator
function dataPipelineEngineer(...$engineer) {
    $first = $last = $tool = null;
    foreach($engineer as $k => $attr) {
        switch($k) {
            case 0:
                $first = $attr;
                break;
            case 1:
                $last = $attr;
                break;
            case 2:
                $tool = $attr;
                break;
        }
    }
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}
// func_get_arg()
function dataAnalystEngineer() {
    $first = func_get_arg(0);
    $last = func_get_arg(1);
    $tool = func_get_arg(2);
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}
// func_num_args()
function bigDataEngineer() {
    $max = func_num_args();
    $first = $last = $tool = null;
    for($i = 0; $i < $max; $i++) {
        if(0 === $i) $first = func_get_arg($i);
        else if(1 === $i) $last = func_get_arg($i);
        else $tool = func_get_arg($i);
    }
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}
// func_get_args()
function dataAutomationEngineer() {
    $engineer = func_get_args();
    [$first, $last, $tool] = $engineer;
    $m = __FUNCTION__;
    engEcho($first, $last, $tool, $m);
}

function engEcho($first, $last, $tool, $task) {
    $f = "\n - %s %s will use %s for %s tasks at the company\n";
    printf($f, $first, $last, $tool, $task);
}
VARIADIC_DYNAMIC_CODE;

$variadic_dynamic_output = [
    '- Julius Alvarado will use PHP for dataAnalystEngineer tasks at the company',
    '- Julius Alvarado will use PHP for dataPipelineEngineer tasks at the company',
    '- Julius Alvarado will use PHP for bigDataEngineer tasks at the company',
    '- Julius Alvarado will use PHP for dataAutomationEngineer tasks at the company',
];





return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="variadic_dynamic_code" class="ja-content" layout-padding layout-margin>
    <h2>Variadic & Dynamic functions</h2>
    <p class="ja-personal-experience">
        This is how we implement function overloading in PHP. It is useful to me when <br>
        implementing very niche business algorithms because it can be easier to comprehend <br>
        the solution by using the same function name with different params.
    </p>
    <h5 class="ja-techniques-used">
        In the example, I use: <br>
        <ul>
        <li>func_get_args()</li>
        <li>func_get_arg()</li>
        <li>func_num_args()</li>
        <li>The variadic operator aka the scatter/splat/spread operator</li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$variadic_dynamic_code</pre>
</div>
<br>
<div id="variadic_dynamic_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <p><code>$variadic_dynamic_output[0]</code></p>
    <p><code>$variadic_dynamic_output[1]</code></p>
    <p><code>$variadic_dynamic_output[2]</code></p>
    <p><code>$variadic_dynamic_output[3]</code></p>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
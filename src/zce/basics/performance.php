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
class JuliusMemLeak
{
    private static ?self $nuerovec = null;
    public array $data;
    
    public function __construct() {
        for($i = 0; $i < 100_000; $i++) {
            $this->data [] = $i;
        }
    }
    
    public static function getNuerovec() {
        if(is_null(JuliusMemLeak::$nuerovec)) {
            JuliusMemLeak::$nuerovec = new self();
        }
        return JuliusMemLeak::$nuerovec;
    }
}

function jaPerformance() {
    $mem_one = number_format(memory_get_usage()) . " kb";
    $nueronet_vector = JuliusMemLeak::getNuerovec();
    $mem_two = number_format(memory_get_usage()) . " kb";
    // ** MEMORY_LEAK
    unset($nueronet_vector);
    $ml = number_format(memory_get_usage()) . " kb";
    return "$mem_one = initial memory <br>$mem_two = memory used for \$nueronet_vector <br>$ml <b>of memory leaked</b>";
}

$performance_code = <<<'PERFORMANCE_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
class JuliusMemLeak
{
    private static ?self $nuerovec = null;
    public array $data;
    
    public function __construct() {
        for($i = 0; $i < 100_000; $i++) {
            $this->data [] = $i;
        }
    }
    
    public static function getNuerovec() {
        if(is_null(JuliusMemLeak::$nuerovec)) {
            JuliusMemLeak::$nuerovec = new self();
        }
        return JuliusMemLeak::$nuerovec;
    }
}

function jaPerformance() {
    $mem_one = number_format(memory_get_usage()) . " kb";
    $nueronet_vector = JuliusMemLeak::getNuerovec();
    $mem_two = number_format(memory_get_usage()) . " kb";
    // ** MEMORY_LEAK
    unset($nueronet_vector);
    $ml = number_format(memory_get_usage()) . " kb";
    return "$mem_one = initial memory <br>$mem_two = memory used for \$nueronet_vector <br>$ml <b>of memory leaked</b>";
}
PERFORMANCE_CODE;
$performance_code = htmlentities($performance_code);

$performance_output = jaPerformance();

return <<<PERFORMANCE_CONTENT
<h2>PHP <i>Performance</i> | 2 examples</h2>
<code class="cb-mtop-0">
1. Memory Leaks,&nbsp;
2. ZContainers & Symbol Tables
</code>

<div id="mem-leak_code" class="ja-content" layout-padding layout-margin>
    <h3>1. Memory Leaks</h3>
    <!--<p class="ja-personal-experience">
        When building automated data processing systems and data applications <br>
        with an HTML5 based User Interface... <br>
    </p>-->
    <h5 class="ja-techniques-used">
        In the example, I force a small memory leak. <br>
    </h5>
    
    <!-- Sample code -->
    <pre>$performance_code</pre>
</div>
<br>
<div id="mem-leak_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$performance_output</div>
</div>

<br>
<br>

<div id="z-table-symbols_code" class="ja-content" layout-padding layout-margin>
    <h3>2. ZContainers & Symbol Tables</h3>
    <p class="ja-personal-experience">
        I'll create an example for this as soon as I have the time <br>
        TODO. <br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, the functions/classes/techniques used are: <br>
        some_function(), SomeClass, etc.
    </h5>
    
    <!-- Sample code -->
    <pre>$ sample_code</pre>
</div>
<br>
<div id="z-table-symbols_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$ code_output</div>
</div>
PERFORMANCE_CONTENT;
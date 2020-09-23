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

function jaCallable(): array {
    class DataCluster
    {
        public static function vector() {
            return 'Cluster::vector() initialized';
        }
        
        public function matrix() {
            return 'Cluster->matrix() reduced';
        }
    }
    
    function nueronetPhp() {
        return 'The nueronet algorithm implemented in PHP has successfully classified the'
               . ' question the customer asked in the automated phone system MUCH FASTER than Python ;)';
    }
    
    $accuracy = 95.209;
    $accuracyLambda = function() use ($accuracy) {
        return "The PHP implementation of our AI is %$accuracy accurate";
    };
    
    function invokeCallable(callable $c) { return $c(); }
    
    $o = [];
    $o [] = invokeCallable('DataCluster::vector');
    $o [] = invokeCallable([new DataCluster, 'matrix']);
    $o [] = invokeCallable('nueronetPhp');
    $o [] = invokeCallable($accuracyLambda);
    $o [] = invokeCallable(function () {
        return 'PHP surely is as capable as R/Python/Scala for Data Engineering & Analysis ☺👌';
    });
    return $o;
}

$callable_code = <<<'CALLABLE_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/12/2020
 * Time: 3:24 AM
 */
function jaCallable(): array {
    class DataCluster
    {
        public static function vector() {
            return 'Cluster::vector() initialized';
        }
        
        public function matrix() {
            return 'Cluster->matrix() reduced';
        }
    }
    
    function nueronetPhp() {
        return 'The nueronet algorithm implemented in PHP has successfully classified the'
               . ' question the customer asked in the automated phone system MUCH FASTER than Python ;)';
    }
    
    $accuracy = 95.209;
    $accuracyLambda = function() use ($accuracy) {
        return "The PHP implementation of our AI is %$accuracy accurate";
    };
    
    function invokeCallable(callable $c) { return $c(); }
    
    $o = [];
    $o [] = invokeCallable('DataCluster::vector');
    $o [] = invokeCallable([new DataCluster, 'matrix']);
    $o [] = invokeCallable('nueronetPhp');
    $o [] = invokeCallable($accuracyLambda);
    $o [] = invokeCallable(function () {
        return 'PHP surely is as capable as R/Python/Scala for Data Engineering & Analysis ☺👌';
    });
    return $o;
}
CALLABLE_CODE;


$callable_output = jaCallable();

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>The Callable feature of PHP</h2>
    <p class="ja-personal-experience">
        I use functional programming when automating tasks all the time, and <br>
        all thanks to the Callable class 🙂 <br>
    </p>
    <h5 class="ja-techniques-used">
        Callable techniques I use in this example: <br>
        <ul>
        <li>static method string</li>
        <li>array with object & string</li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$callable_code</pre>
</div>
<br>
<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <p>1 - <code>$callable_output[0]</code></p>
    <p>2 - <code>$callable_output[1]</code></p>
    <p>3 - <code>$callable_output[2]</code></p>
    <p>4 - <code>$callable_output[3]</code></p>
    <p>5 - <code>$callable_output[4]</code></p>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
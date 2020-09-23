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
 *  sample config from the php.ini
 */
function ja_config() {
    // sample config from the php.ini
    return <<<'PHP_INI'
error_reporting=E_ALL
error_log="C:\xampp\php\logs\php_error.log"
display_errors=On
display_startup_errors=On
log_errors=On
log_errors_max_len=1024
html_errors=On
PHP_INI;
}

$config_code = <<<'config'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 **  sample config from the php.ini **
 */
error_reporting=E_ALL
error_log="C:\\xampp\php\logs\php_error.log"
display_errors=On
display_startup_errors=On
log_errors=On
log_errors_max_len=1024
html_errors=On
config;

$config_output = ja_config();


return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Configuring Errors</h2>
    <p class="ja-personal-experience">
        PHP has excellent logging built in for when errors occur. There is no way I could have built <br>
        automated systems without it... <br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, the directives I set are: <br>
        <ul>
        <li><code>error_reporting</code></li>
        <li><code>error_log</code></li>
        <li><code>display_errors</code></li>
        <li><code>display_startup_errors</code></li>
        <li><code>log_errors</code></li>
        <li><code>log_errors_max_len</code></li>
        <li><code>html_errors</code></li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$config_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>There is no output since this is a config file.</h3>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
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
function jaConfiguration () {
    /*
        -- manually set from the .ini file --
        memory_limit=-1
        max_execution_time=0
    */

    ini_set('date.timezone', 'America/Los_Angeles');
    $time = new DateTime();
    $time = $time->format(DateTime::COOKIE);
    $timeStr = "California date & time = $time, ";
    ini_set('date.timezone', 'America/New_York');
    $time = new DateTime();
    $time = $time->format(DateTime::COOKIE);
    
    return "$timeStr <br> New York date & time = $time";
}

$configuration_code = <<<'CONFIGURATION_CODE'
function jaConfiguration () {
    /*
        -- manually set from the .ini file --
        memory_limit=-1
        max_execution_time=0
    */

    ini_set('date.timezone', 'America/Los_Angeles');
    $time = new DateTime();
    $time = $time->format(DateTime::COOKIE);
    $timeStr = "California date & time = $time, ";
    ini_set('date.timezone', 'America/New_York');
    $time = new DateTime();
    $time = $time->format(DateTime::COOKIE);
    
    return "$timeStr, New York date & time = $time";
}
CONFIGURATION_CODE;

$configuration_output = jaConfiguration();

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Setting directives with ini_set() & in the .ini file</h2>
    <p class="ja-personal-experience">
        Most of my experience with PHP was not via web servers, but via the CLI in on-premise windows server's <br>
       (in data engineering, this is called the Data Lake). The .ini config file I managed had 2,000+ lines<br>
       However, directives that dealt with <i>Space & Time</i> were my primary concern<br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, the directives set are: <br>
        <ul>
        <li>$ memory_limit </li>
        <li>$ max_execution_time </li>
        <li>$ date.timezone </li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$configuration_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <p>$configuration_output</p>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
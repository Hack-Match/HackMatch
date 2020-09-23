<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:34 PM
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
 */

$sales_data = [
    ['Jill', 755.98],
    ['Joe', 1527.39],
    ['Julissa', 9781.52],
    ['Jane', 5183.24],
    ['Jacob', 1978.72],
];

function jaKeyValues() {
    // It's good to be aware of edge cases, especially when running an algorithm against
    // a table with 100,000+ rows. User input can get messy.
    $dataRow = function($yup) {
        return [
            '4x6 post card',
            '0' => '4x3 post card',
            4 => 'data cost .15 per piece',
            '4x6' => 'data cost .05 per piece',
            'data cost' => 1500,
            'data cost' => 500,
            1 => '1st class Priority Mail Open and Distribute shipping',
            '1st class' => 'Drop Shipping',
            'client said they want a green envelope',
            2 => 'client said they want a pink envelope',
            $yup
        ];
    };
    
    function depth_first_graph_algorithm($node) {
        return $node('PHP is also simple && faster than Python');
    }
    
    return json_encode(depth_first_graph_algorithm($dataRow), JSON_PRETTY_PRINT);
}

$key_values_code = <<<'KEY_VALUES_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:34 PM
 */
function jaKeyValues() {
    // It's good to be aware of edge cases, especially when running an algorithm against
    // a table with 100,000+ rows. User input can get messy.
    $dataRow = function($yup) {
        return [
            '4x6 post card',
            '0' => '4x3 post card',
            4 => 'data cost .15 per piece',
            '4x6' => 'data cost .05 per piece',
            'data cost' => 1500,
            'data cost' => 500,
            1 => '1st class Priority Mail Open and Distribute shipping',
            '1st class' => 'Drop Shipping',
            'client said they want a green envelope',
            2 => 'client said they want a pink envelope',
            $yup
        ];
    };
    
    function depth_first_graph_algorithm($node) {
        return $node('PHP is also simple && faster than Python');
    }
    
    return json_encode(depth_first_graph_algorithm($dataRow), JSON_PRETTY_PRINT);
}
KEY_VALUES_CODE;

$key_values_output = jaKeyValues();

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>PHP has tons of functions to do stuff to keys & values</h2>
    <p class="ja-personal-experience">
        I'm showing what happens to keys and values when key's are odd. <br>
        When job files from the internal web app got dropped in my data lake <br>
        I did what I could to cleanse that data. It's very tedious. <br>
        My PHP CLI apps were automated, so I analyzed the logs to figure out solutions.
    </p>
    <h5 class="ja-techniques-used">
        In the example, I just show data with odd keys. <br>
        Before using my fancy PHP Computer Science algorithms, I had to check & clean the data first.
    </h5>
    
    <!-- Sample code -->
    <pre>$key_values_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <p>Log from an algorithm that didn't work correctly:</p>
    <pre>$key_values_output</pre>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
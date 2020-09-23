<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
 */

function jaLoopingDataStructures() {
    $sales_data = [
        ['name' => 'Jill', 'sales' => 755.98],
        ['name' => 'Jacob', 'sales' => 1938.95],
        ['name' => 'Julissa', 'sales' => 9781.52],
    ];
    function cursorRecursive($data) {
        static $total_sales = ['', 0];
        $element = current($data);
        $total_sales[0] .= "{$element['name']}, ";
        $total_sales[1] += $element['sales'];
        if(next($data)) return cursorRecursive($data);
        return $total_sales;
    }
    
    $recursion_data = [
        ['customer' => 'Star_Mortgage', 'status' => 'returning customer',
            'products_paid_for' => ['standard mail', 'priority express', 'pmod shipping']],
        ['customer' => 'Rocketz_Marketing', 'status' => 'hot lead'],
    ];
    array_walk_recursive($recursion_data, function($v, $k) use (&$php) {
        if(!strcmp('customer', $k)) $php[] = "$v, has a ";
        else if(!strcmp('status', $k)) $php[count($php)-1] .= "status of $v. ";
        else if(
            ($last = &$php[count($php)-1]) &&
            false === strpos($last,'hot lead')
        ) $last .= "Purchase = $v, ";
    });
    
    $r = cursorRecursive($sales_data);
    $php[] = sprintf('%s got %.2f total sales', $r[0], $r[1]);
    return $php;
}

$looping_code = <<<'LOOP_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
function jaLoopingDataStructures() {
    $data = [
        ['name' => 'Jill', 'sales' => 755.98],
        ['name' => 'Jacob', 'sales' => 1938.95],
        ['name' => 'Julissa', 'sales' => 9781.52],
    ];
    function cursorRecursive($data) {
        static $total_sales = ['', 0];
        $element = current($data);
        $total_sales[0] .= "{$element['name']}, ";
        $total_sales[1] += $element['sales'];
        if(next($data)) return cursorRecursive($data);
        return $total_sales;
    }
    
    $recursion_data = [
        ['customer' => 'Star_Mortgage', 'status' => 'returning customer',
            'products_paid_for' => ['standard mail', 'priority express', 'pmod shipping']],
        ['customer' => 'Rocketz_Marketing', 'status' => 'hot lead'],
    ];
    array_walk_recursive($recursion_data, function($v, $k) use (&$php) {
        if(!strcmp('customer', $k)) $php[] = "$v, has a ";
        else if(!strcmp('status', $k)) $php[count($php)-1] .= "status of $v. ";
        else if(
            ($last = &$php[count($php)-1]) &&
            false === strpos($last,'hot lead')
        ) $last .= "Purchase = $v, ";
    });
    
    $r = cursorRecursive($data);
    $php[] = sprintf('%s got %.2f total sales', $r[0], $r[1]);
    return $php;
}
LOOP_CODE;


$looping_output = jaLoopingDataStructures();

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Looping through Data Structures</h2>
    <p class="ja-personal-experience">
        No basic looping here, I intend to show my Senior level skills. <br>
        Apps I implement real business logic in stick to the basics as often as <br>
        possible for readability though. However, it's nice to have these options.
    </p>
    <h5 class="ja-techniques-used">
        In the example, I use: <br>
        <ul>
        <li>array_walk_recursive()</li>
        <li>array cursors</li>
        <li>linear recursion</li>
        </ul>
    </h5>
    
    <p><i>
    The array_walk_recursive() does get difficult to read due to being in an unknown depth, in each recursive call. <br>
    Here is the English translation:
    <ol>
    <li>if not truthy, append a string to the \$php array.</li>
    <li>else if not truthy, append a string to the last string in the \$php array</li>
    <li>
    else if the last elem gets assigned by ref to the \$last var and 'hot lead' is not in \$last, <br>
    append the purchase... at this point we're in the 3rd level of recursion.
    </li>
    </ol>
    </i></p>
    
    <!-- Sample code -->
    <pre>$looping_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <p>$looping_output[0]</p>
    <p>$looping_output[1]</p>
    <p>$looping_output[2]</p>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
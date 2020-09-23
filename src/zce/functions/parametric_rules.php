<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:24 AM
 */
function jaParametricRules() {
    // rules_used = mandatory param, optional param, nullable param, type hint
    function computeTopSaleRep(array $salesReps, ?bool $above2k = null) {
        static $topRep = ['', 0];
        $salesRep = array_shift($salesReps);
        if(above2k($salesRep[1])) $salesRep[0] = "Super $salesRep[0]";
        if($salesRep[1] > $topRep[1]) $topRep = $salesRep;
        if($salesReps) return computeTopSaleRep($salesReps);
        return "$topRep[0] got the most sales w/$ $topRep[1] in sales!";
    }
    
    // rules_used = mandatory param, optional param/default value
    function above2k($sales, $salesRep = 'unknown sales rep'): bool {
        return $sales > 2000;
    }
    
    $sales_data = [
        ['Jill', 755.98],
        ['Joe', 1527.39],
        ['Julissa', 9781.52],
        ['Jane', 5183.24],
        ['Jacob', 1978.72]
    ];
    
    return computeTopSaleRep($sales_data);
}

$parametric_rules_code = <<<'PARAMETRIC_RULES'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:24 AM
 */
function jaParametricRules() {
    // rules_used = mandatory param, optional param, nullable param, type hint
    function computeTopSaleRep(array $salesReps, ?bool $above2k = null) {
        static $topRep = ['', 0];
        $salesRep = array_shift($salesReps);
        if(above2k($salesRep[1])) $salesRep[0] = "Super $salesRep[0]";
        if($salesRep[1] > $topRep[1]) $topRep = $salesRep;
        if($salesReps) return computeTopSaleReps($salesReps);
        return "$topRep[0] got the most sales w/$ $topRep[1] in sales!";
    }
    
    // rules_used = mandatory param, optional param/default value
    function above2k($sales, $salesRep = 'unknown sales rep'): bool {
        return $sales > 2000;
    }
    
    $sales_data = [
        ['Jill', 755.98],
        ['Joe', 1527.39],
        ['Julissa', 9781.52],
        ['Jane', 5183.24],
        ['Jacob', 1978.72]
    ];
    
    return computeTopSaleRep($sales_data);
}
PARAMETRIC_RULES;
$parametric_rules_output = jaParametricRules();

return <<<ANGULAR_JS_PARAMETRIC_RULES_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>The rules of function parameters/arguments.</h2>
    <p class="ja-personal-experience">
        I use various combinations of the function parameter rules<br>
        when building software. <br>
        
    </p>
    <h5 class="ja-functions-used">
        In this example, the parametric rules I use are:<br>
        <ul>
        <li>type hint</li>
        <li>no type hint</li>
        <li>optional arguments</li>
        <li>nullable arguments</li>
        <li>mandatory arguments</li>
        <li>default value</li>
        </ul>
    </h5>

    <!-- Sample code -->
    <pre>$parametric_rules_code</pre>
</div>

<br><br>

<div id="fs_info_op_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>Output from the parametric rules code</h3>
    
    <!-- Code output -->
    <p>$parametric_rules_output</p>
</div>
ANGULAR_JS_PARAMETRIC_RULES_CONTENT;

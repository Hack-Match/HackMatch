<?php
/*
    "Because thinking of var names is hard"
    -- short var names --
    set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
    -- cool var names --
    perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
    -- combinations --
    metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, et
*/
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:45 AM
 */
function jaLambdasClosures() {
    
    function lateBind($data): string {
        static $cost = 299;
        static $margins = [0, 0];
        $sale = array_shift($data);
        $sale_amount = $sale[1];
        // ** LATE_BIND
        $grossNetMargin = function() use (&$net, $margins) {
            if(0 == $margins[0] || $net < $margins[0]) $margins[0] = $net;
            else if($net > $margins[1]) $margins[1] = $net;
            return $margins;
        };
        $net = $sale_amount - $cost;
        if($net < 2000) $net = ($net - $net * .2875);
        else $net = ($net - $net * .4392);
        $margins = $grossNetMargin();
        if($data) return lateBind($data);
        return "Profit margins ranged from <b><code>$margins[0]</code></b> to <b><code>$margins[1]</code></b>.";
    }
    
    function bindToScope($data): string {
        class Mail
        {
            protected bool $pmod;
            public function shippingLambda(): Closure {
                $rate = 'Machinable Bulk Mail';
                return function($customer) use ($rate) {
                    if($this->pmod) $speed = 'fast';
                    else $speed = 'slow';
                    return sprintf(
                        'Thank you for your purchase %s! Your %s will be delivered %s', $customer, $rate, $speed
                    );
                };
            }
        }
        class StandardMail extends Mail{protected bool $pmod = false;}
        class FirstClassMail extends Mail{protected bool $pmod = true;}
        $first = new FirstClassMail;
        $standard = new StandardMail;
        $lambda = $first->shippingLambda();
        $o = $lambda('Google.com');
        // ** BIND_TO_SCOPE
        $lambda = $lambda->bindTo($standard);
        $o = "1. $o, 2. " . $lambda('PhpDataEngineers.org');
        return $o;
    }
    
    function Immediately_Invoked_Function_Expression(): string {
        $o1 = '' && $o2 = '';
        $outerData = 'Hi';
        $world = 'World';
        // ** super cool IIFE 😎
        (function(&$o1) {
            $outerData = 'Hello';
            $world = $world ?? 'Universe';
            $o1 = "$outerData $world";
        })($o1);
        $o2 = "$outerData $world";
        return sprintf('$o1 = %s, $o2 = %s', $o1, $o2);
    }
    
    $sales_data = [
        ['Jill', 755.98],
        ['Joe', 1527.39],
        ['Julissa', 9781.52],
        ['Jane', 5183.24],
        ['Jacob', 1978.72],
    ];
    
    return [lateBind($sales_data), bindToScope($sales_data), Immediately_Invoked_Function_Expression()];
}

$r = jaLambdasClosures();

$late_binding_code = <<<'LAMBDAS_CLOSURES_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:45 AM
 */
function lateBind($data): string {
        static $cost = 299;
        static $margins = [0, 0];
        $sale = array_shift($data);
        $sale_amount = $sale[1];
        //_** LATE_BIND
        $grossNetMargin = function() use (&$net, $margins) {
            if(0 == $margins[0] || $net < $margins[0]) $margins[0] = $net;
            else if($net > $margins[1]) $margins[1] = $net;
            return $margins;
        };
        $net = $sale_amount - $cost;
        if($net < 2000) $net = ($net - $net * .2875);
        else $net = ($net - $net * .4392);
        $margins = $grossNetMargin();
        if($data) return lateBind($data);
        return "Profit margins ranged from <b><code>$margins[0]</code></b> to <b><code>$margins[1]</code></b>.";
}
LAMBDAS_CLOSURES_CODE;
$late_binding_code = htmlentities($late_binding_code);
$late_binding_output = $r[0];

$bind_to_scope_code = <<<'BIND_TO_SCOPE'
function bindToScope($data): string {
        class Mail
        {
            protected bool $pmod;
            public function shippingLambda(): Closure {
                $rate = 'Machinable Bulk Mail';
                return function($customer) use ($rate) {
                    if($this->pmod) $speed = 'fast';
                    else $speed = 'slow';
                    return sprintf(
                        'Thank you for your purchase %s! Your %s will be delivered %s', $customer, $rate, $speed
                    );
                };
            }
        }
        class StandardMail extends Mail{protected bool $pmod = false;}
        class FirstClassMail extends Mail{protected bool $pmod = true;}
        $first = new FirstClassMail;
        $standard = new StandardMail;
        $lambda = $first->shippingLambda();
        $o = $lambda('Google.com');
        // ** BIND_TO_SCOPE
        $lambda = $lambda->bindTo($standard);
        $o = "1. $o, 2. " . $lambda('PhpDataEngineers.org');
        return $o;
}
BIND_TO_SCOPE;
$bind_to_scope_output = $r[1];

$iife_code = <<<'IIFE_CODE'
function Immediately_Invoked_Function_Expression(): string {
        $o1 = '' && $o2 = '';
        $outerData = 'Hi';
        $world = 'World';
        // ** super cool IIFE 😎
        (function(&$o1) {
            $outerData = 'Hello';
            $world = $world ?? 'Universe';
            $o1 = "$outerData $world";
        })($o1);
        $o2 = "$outerData $world";
        return sprintf('$o1 = %s, $o2 = %s', $o1, $o2);
    }
IIFE_CODE;
$iife_output = $r[2];

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<h2>PHP <i>Lambda & Closure</i> functions | 3 examples</h2>
<code class="cb-mtop-0">
1. Late Binding,&nbsp;
2. Bind to Scope,&nbsp;
3. IIFE
</code>

<br>
<br>

<!-- Late Binding -->
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>1. Late Binding</h2>
    <p class="ja-personal-experience">
        I cannot thank the C programmers writing PHP enough for this feature. <br>
        I've made <b>HEAVY</b> use of this while writing software to automate reports. <br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, the late binding will: <br>
        <ul>
        <li>use the by-ref operator</li>
        <li>update the memory's value after the closure has been defined</li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$late_binding_code</pre>
</div>
<br>
<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$late_binding_output</div>
</div>

<br>
<br>

<!---- Bind to Scope ---->
<div id="bind_to_scope_code" class="ja-content" layout-padding layout-margin>
    <h2>2. Bind to Scope</h2>
    <p class="ja-personal-experience">
        This is a feature I learned about while studying. I haven't used it in any <br>
        business system... <b>Yet</b> 🤓<br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, I dynamically create a customer purchase message. <br>
        The "bindTo()" Closure method is used.
    </h5>
    
    <!-- Sample code -->
    <pre>$bind_to_scope_code</pre>
</div>
<br>
<div id="bind_to_scope_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$bind_to_scope_output</div>
</div>

<br>
<br>

<!---- IIFE ---->
<div id="iife_code" class="ja-content" layout-padding layout-margin>
    <h2>3. IIFE</h2>
    <p class="ja-personal-experience">
        <i>"Immediately Invoked Function Expressions"</i> are really cool. I use them here and there <br>
        when I work through example's while studying. In production code I tend to stick with <br>
        formal functions and object methods.
    </p>
    <h5 class="ja-techniques-used">
        In the example, the IIFE is used much like in JavaScript it: <br>
        <ul>
        <li>defines its' own scope</li>
        <li>does NOT affect outer scoped vars</li>
        <li>gets an outer var by passing it in</li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$iife_code</pre>
</div>
<br>
<div id="iife_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$iife_output</div>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;

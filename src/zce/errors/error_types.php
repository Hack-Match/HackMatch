<?php
/*
     "Because thinking of var names is hard"
     -- short var names --
     set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
     -- cool var names --
     perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
     -- combinations --
     metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
*/
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
declare(strict_types=1);
$api_response = [139_004.57];

function businessLogic(int $i): float {
    if($i <= 4) return $i ** $i / 2;
    return 1.9 + $i / 100;
}

function ja_error_types($api_response): string {
    try {
        $ai_index = [0, 1, 2, 3];
        $ai_hash_table = ['type' => 1, 'level' => 2, 'id' => 10010101];
        // invoke a random Error or Exception
        switch(array_rand([1, 2, 3, 4, 5, 6, 7])) {
            case 1: // exception, wrong param type
                if(!is_int(current($api_response)))
                    throw new \InvalidArgumentException('The algorithms\' function expects an INTEGER');
                return "result = " . businessLogic($api_response);
            case 2: // exception, out of bounds
                if(!isset($ai_hash_table['archetype_descendent_level']))
                    throw new \OutOfBoundsException('No hash "archetype_descendent_level"');
                return "result = " . businessLogic($ai_hash_table['archetype_descendent_level']);
            case 3: // exception, out of range
                if(!isset($ai_index[10010101]))
                    throw new \OutOfRangeException('No index "10010101"');
                return "result = " . businessLogic($ai_index[10010101]);
            case 4: // exception, underflow
                $ai_dynamic_structure = 'ai_indexer';
                if(!isset($$ai_dynamic_structure))
                    throw new \UnderflowException("No Data Structure '$ai_dynamic_structure' exists... yet");
                return "result = " . businessLogic(($$ai_dynamic_structure)[0]);
            case 5: // error, wrong function return or arg type
                return "result = " . businessLogic(current($api_response));
            case 6: // error, the classic division by 0
                if(0 === $ai_index[0]) throw new DivisionByZeroError('manually thrown error');
                return "result = " . businessLogic($ai_hash_table['level']) / $ai_index[0];
            case 7: // error, arithmetic error
                $ai = 'PHP can also be used for Artificial Intelligence.';
                if(!is_numeric($ai)) throw new ArithmeticError('manually thrown error');
                return "result = " . businessLogic($ai_hash_table['id']) / $ai;
        }
    }
    catch(InvalidArgumentException $e) {
        $m = $e->getMessage();
        return "EXCEPTION - Incorrect parameter type, $m";
    }
    catch(OutOfBoundsException $e) {
        $m = $e->getMessage();
        return "EXCEPTION - An invalid key was used, $m";
    }
    catch(OutOfRangeException $e) {
        $m = $e->getMessage();
        return "EXCEPTION - An invalid index was used, $m";
    }
    catch(UnderflowException $e) {
        $m = 'EXCEPTION - Attempted to invoke a non-existent function';
        return $m;
    }
    catch(TypeError $e) {
        $m = 'ERROR - The return type or type passed to the function is incorrect';
        return $m;
    }
    catch(DivisionByZeroError $e) {
        $m = 'ERROR - Classic division by 0 error';
        return $m;
    }
    catch(ArithmeticError $e) {
        $m = 'ERROR - arithmetic on incorrect operands';
        return $m;
    }
    catch(Throwable $e) {
        $m = 'An unknown ERROR or EXCEPTION occurred';
        return $m;
    }
    return 'no exceptions or errors... Hmm, that is odd';
}

$error_types_code = <<<'error_types'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
declare(strict_types=1);
$api_response = [139_004.57];

function businessLogic(int $i): float {
    if($i <= 4) return $i ** $i / 2;
    return 1.9 + $i / 100;
}

function ja_error_types($api_response): string {
    try {
        $ai_index = [0, 1, 2, 3];
        $ai_hash_table = ['type' => 1, 'level' => 2, 'id' => 10010101];
        // invoke a random Error or Exception
        switch(array_rand([1, 2, 3, 4, 5, 6, 7])) {
            case 1: // exception, wrong param type
                if(!is_int(current($api_response)))
                    throw new \InvalidArgumentException('The algorithms\' function expects an INTEGER');
                return "result = " . businessLogic($api_response);
            case 2: // exception, out of bounds
                if(!isset($ai_hash_table['archetype_descendent_level']))
                    throw new \OutOfBoundsException('No hash "archetype_descendent_level"');
                return "result = " . businessLogic($ai_hash_table['archetype_descendent_level']);
            case 3: // exception, out of range
                if(!isset($ai_index[10010101]))
                    throw new \OutOfRangeException('No index "10010101"');
                return "result = " . businessLogic($ai_index[10010101]);
            case 4: // exception, underflow
                $ai_dynamic_structure = 'ai_indexer';
                if(!isset($$ai_dynamic_structure))
                    throw new \UnderflowException("No Data Structure '$ai_dynamic_structure' exists... yet");
                return "result = " . businessLogic(($$ai_dynamic_structure)[0]);
            case 5: // error, wrong function return or arg type
                return "result = " . businessLogic(current($api_response));
            case 6: // error, the classic division by 0
                if(0 === $ai_index[0]) throw new DivisionByZeroError('manually thrown error');
                return "result = " . businessLogic($ai_hash_table['level']) / $ai_index[0];
            case 7: // error, arithmetic error
                $ai = 'PHP can also be used for Artificial Intelligence.';
                if(!is_numeric($ai)) throw new ArithmeticError('manually thrown error');
                return "result = " . businessLogic($ai_hash_table['id']) / $ai;
        }
    }
    catch(InvalidArgumentException $e) {
        $m = $e->getMessage();
        return "EXCEPTION - Incorrect parameter type, $m";
    }
    catch(OutOfBoundsException $e) {
        $m = $e->getMessage();
        return "EXCEPTION - An invalid key was used, $m";
    }
    catch(OutOfRangeException $e) {
        $m = $e->getMessage();
        return "EXCEPTION - An invalid index was used, $m";
    }
    catch(UnderflowException $e) {
        $m = 'EXCEPTION - Attempted to invoke a non-existent function';
        return $m;
    }
    catch(TypeError $e) {
        $m = 'ERROR - The return type or type passed to the function is incorrect';
        return $m;
    }
    catch(DivisionByZeroError $e) {
        $m = 'ERROR - Classic division by 0 error';
        return $m;
    }
    catch(ArithmeticError $e) {
        $m = 'ERROR - arithmetic on incorrect operands';
        return $m;
    }
    catch(Throwable $e) {
        $m = 'An unknown ERROR or EXCEPTION occurred';
        return $m;
    }
    return 'no exceptions or errors... Hmm, that is odd';
}
error_types;

$error_types_output = ja_error_types($api_response);
echo "\n\n$error_types_output\n\n";

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Throwable Errors & Exceptions</h2>
    <p class="ja-personal-experience">
        To me, unit testing and error handling are like cousins since they both help to prevent bugs <br>
        ... and are both <b>very</b> tedious tasks.<br>
    </p>
    <h5 class="ja-techniques-used">
        <i>My apologies, in my attempt to keep it somewhat realistic and to use a decent handful of the PHPs' prebuilt
        exceptions & errors, the example got a bit lengthy.</i><br><br>
        In the example, the class's & interface I use are: <br>
        <ul>
        <li><code>InvalidArgumentException</code></li>
        <li><code>OutOfBoundsException</code></li>
        <li><code>OutOfRangeException</code></li>
        <li><code>UnderFlowException</code></li>
        <li><code>TypeError</code></li>
        <li><code>DivisionByZeroError</code></li>
        <li><code>ArithmeticError</code></li>
        <li><code>Throwable</code></li>
        </ul>
    </h5>
    
    <!-- Sample code -->
    <pre>$error_types_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>
    <p><small>There should be a different message w/each page refresh</small></p>

    <!-- Code output -->
    <div>$error_types_output</div>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
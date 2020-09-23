<?php

/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
declare(strict_types=1);

set_error_handler(function($e) {
   return '';
});

function ja_error_class($v) {
    try {
        $commissionType = function(float $v, int $commission): float {
            if($v > 25) {
                return $commission * .2;
            }
            return $commission * .1;
        };
        $commission = 100 / $v;
        return $commissionType($v, $commission);
    }
    catch(Exception $e) {
        return 'There was an Exception';
    }
    catch(Error $e) {
        return 'PHP used the Error class instead';
    }
}

$error_class_code = <<<'error_class'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
declare(strict_types=1);
function ja_error_class($v) {
    try {
        $commissionType = function(float $v, int $commission): float {
            if($v > 25) {
                return $commission * .2;
            }
            return $commission * .1;
        };
        $commission = 100 / $v;
        return $commissionType($v, $commission);
    }
    catch(Exception $e) {
        return 'There was an Exception';
    }
    catch(Error $e) {
        return 'PHP used the Error class instead';
    }
}
error_class;

$error_class_output = ja_error_class(0);

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>The new Error class for PHP 7</h2>
    <p class="ja-personal-experience">
        Like most humans, I wasn't able to predict all possible errors successfully. <br>
        So PHP helped out by providing the new <code>Error</code> class <br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, the I purposely forgot to check for the classic division by 0 error.
    </h5>
    
    <!-- Sample code -->
    <pre>$error_class_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$error_class_output</div>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;
<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/16/2020
 * Time: 2:08 AM
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
 */


$str = $data['str'] ?? null;
$arr = $data['arr'] ?? null;
$bas = $data['bas'] ?? null;
$dat = $data['dat'] ?? null;
$err = $data['err'] ?? null;
$oop = $data['oop'] ?? null;
$sec = $data['sec'] ?? null;
$sql = $data['sql'] ?? null;
$web = $data['web'] ?? null;
$tes = $data['tes'] ?? null;
$fp = $data['fp'] ?? null;
$io = $data['io'] ?? null;

if($str) {
    $debug = 1;
    // USING VARIABLE VARIABLE'S e.g. $strStruct->enc returns 'str_encodes'
    // so $$strStruct->enc becomes a var named '$str_encodes'
    /*
        $strStruct = array_shift($str);
        [
            $$strStruct->enc,
        ] = array_values($str);
    */
    
}
else if($arr) {
    $debug = 1;
}
else if($bas) {
    $debug = 1;
}
else if($dat) {
    $debug = 1;
}
else if($err) {
    $debug = 1;
}
else if($oop) {
    $debug = 1;
}
else if($sec) {
    $debug = 1;
}
else if($sql) {
    $debug = 1;
}
else if($web) {
    $debug = 1;
}
else if($tes) {
    $debug = 1;
}
else if($fp) {
    $debug = 1;
    /*
        [
            $fp_intro, $fp_parametric_rules, $fp_lambdas_closures,
            $fp_callable_class, $fp_references, $fp_scope, $fp_variadic_dynamic,
        ] = array_values($fp);
    */
}
else if($io) {
    $debug = 1;
}
else {
    $debug = 1;
    $data = var_export(get_defined_vars(), true);
    echo "<br>\n<br>\n [ JA_ERROR: slim3 passed a different $ data var than expected ] = <br>\n<br>\n", $data;
    //[$fp_intro, $fp_parametric_rules] = [$data, $data];
}


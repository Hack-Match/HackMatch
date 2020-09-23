<?php
/*
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
*/

/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/13/2020
 * Time: 1:25 AM
 */
function jaStreamResource(): string {
    //TODO: fpassthru(), flock(), all_io_combined
    static $o = '';
    static $byteLimit = 5;
    static $streams = null;
    
    static $input = [
        'fopen' => 'data/accounting-sm.csv',
        'fwrite' => 'data/accounting-xs.csv',
        'fgets' => 'data/accounting-sm2.csv',
        'fscanf' => 'data/acc-sales.csv',
        'all_io_combined' => 'data/accounting.csv',
    ];
    // this resource doesn't exist
    static $inputX = 'data/io-x.csv';
    $streams ??= [
        'fopen' => fopen($input['fopen'], 'r+'),
        'fwrite' => fopen($input['fwrite'], 'a+'),
        'fgets' => fopen($input['fgets'], 'r'),
        'fscanf' => fopen($input['fscanf'], 'r'),
        /*'fpassthru' => false, // fopen($inputX, 'x+'),
        'flock' => false,
        'all_io_combined' => fopen($input['all_io_combined'], 'w+'),*/
    ];
    
    $io = array_key_first($streams);
    $stream = array_shift($streams);
    if(false === $stream) return jaStreamResource($o);
    
    $bytesRead = 0;
    $bytes = 2;
    
    switch($io) {
        case 'fopen':
            $o .= '<h6>case fopen:</h6><p>';
            // iteration 1, r = jo
            // iteration 2, r = b_
            // first 4 bytes = job_
            while($bytesRead <= $byteLimit && !feof($stream)) {
                $r = fread($stream, $bytes);
                $bytesRead += $bytes;
                $o .= $r;
            }
            $o .= '</p>';
            break;
        case 'fwrite':
            $o .= '<h6>case fwrite:</h6><p>Wrote <code>{';
            $mockApiCall = '80163,EN HW Refi ITMA 110119,3422,Letter,11/1/2019 0:00,Ray Pruitt,246088,First Class Pre-Sort,,"[""Denver Redstone Production""]",Justin Restaino' . PHP_EOL;
            fwrite($stream, $mockApiCall);
            $o .= "$mockApiCall}</code> to the data file.";
            break;
        case 'fgets':
            $hRow = fgets($stream);
            $r1 = fgets($stream);
            $o .= "<h6>case fgets:</h6><p>top_row:<br><code>$hRow</code></p><p>row_1:<br><code>$r1</code></p>";
            break;
        case 'fscanf':
            $o .= '<h6>case fscanf:</h6><ol>';
            // sample input row
            $f = "%4d,%2d,%03d,%6d,%10f,%20s %20s\r\n";
            $c = 0;
            while($row = fscanf($stream, $f)) {
                if(0 === $c) {
                    ++$c;
                    continue;
                }
                [$year, $weekNum, $totalJobsSold, $invoice, $totalSalesAmount, $first, $last] = $row;
                $totalSalesAmount = number_format($totalSalesAmount);
                $salesRep = "$first $last";
                $o .= "<li>$salesRep sold $totalJobsSold jobs for $year week $weekNum totaling $ $totalSalesAmount";
            }
            $o .= '</ol>';
            break;
        case 'fpassthru':
            //_line-52
            break;
        case 'flock':
            //_line-54
            break;
        case 'all_io_combined':
            //_line-56
            break;
    }
    
    fclose($stream);
    if(file_exists($inputX)) unlink($inputX);
    
    if($streams) return jaStreamResource();
    return $o;
}


$fs_resource_code = <<<'FS_RESOURCE_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/31/2020
 * Time: 8:43 PM
 */
// I prefixed my initials since this function is in global scope
function jaStreamResource(&$o) {
    static $byteLimit = 5;
    static $streams = null;
    
    static $input = [
        'fopen' => 'data/accounting-sm.csv',
        'fwrite' => 'data/accounting-xs.csv',
        'fgets' => 'data/accounting-sm2.csv',
        'fscanf' => 'data/acc-sales.csv',
        'all_io_combined' => 'data/accounting.csv',
    ];
    // this resource doesn't exist
    static $inputX = 'data/io-x.csv';
    $streams ??= [
        'fopen' => fopen($input['fopen'], 'r+'),
        'fwrite' => fopen($input['fwrite'], 'a+'),
        'fgets' => fopen($input['fgets'], 'r'),
        'fscanf' => fopen($input['fscanf'], 'r'),
        /*'fpassthru' => false, // fopen($inputX, 'x+'),
        'flock' => false,
        'all_io_combined' => fopen($input['all_io_combined'], 'w+'),*/
    ];
    
    $io = array_key_first($streams);
    $stream = array_shift($streams);
    if(false === $stream) return jaStreamResource($o);
    
    $bytesRead = 0;
    $bytes = 2;
    
    switch($io) {
        case 'fopen':
            $o .= '<h6>case fopen:</h6><p>';
            // iteration 1, r = jo
            // iteration 2, r = b_
            // first 4 bytes = job_
            while($bytesRead <= $byteLimit && !feof($stream)) {
                $r = fread($stream, $bytes);
                $bytesRead += $bytes;
                $o .= $r;
            }
            $o .= '</p>';
            break;
        case 'fwrite':
            $o .= '<h6>case fwrite:</h6><p>Wrote <code>{';
            $mockApiCall = '80163,EN HW Refi ITMA 110119,3422,Letter,11/1/2019 0:00,Ray Pruitt,246088,First Class Pre-Sort,,"[""Denver Redstone Production""]",Justin Restaino' . PHP_EOL;
            fwrite($stream, $mockApiCall);
            $o .= "$mockApiCall}</code> to the data file.";
            break;
        case 'fgets':
            $hRow = fgets($stream);
            $r1 = fgets($stream);
            $o .= "<h6>case fgets:</h6><p>top_row:<br><code>$hRow</code></p><p>row_1:<br><code>$r1</code></p>";
            break;
        case 'fscanf':
            $o .= '<h6>case fscanf:</h6><ol>';
            // sample input row
            $f = "%4d,%2d,%03d,%6d,%10f,%20s %20s\r\n";
            $c = 0;
            while($row = fscanf($stream, $f)) {
                if(0 === $c) {
                    ++$c;
                    continue;
                }
                [$year, $weekNum, $totalJobsSold, $invoice, $totalSalesAmount, $first, $last] = $row;
                $totalSalesAmount = number_format($totalSalesAmount);
                $salesRep = "$first $last";
                $o .= "<li>$salesRep sold $totalJobsSold jobs for $year week $weekNum totaling $ $totalSalesAmount";
            }
            $o .= '</ol>';
            break;
        case 'fpassthru':
            //_line-52
            break;
        case 'flock':
            //_line-54
            break;
        case 'all_io_combined':
            //_line-56
            break;
    }
    
    fclose($stream);
    if(file_exists($inputX)) unlink($inputX);
    
    if($streams) return jaStreamResource($o);
    return null;
}
FS_RESOURCE_CODE;
$fs_resource_code = htmlentities($fs_resource_code);
$fs_resource_output = jaStreamResource();

return <<<ANGULAR_JS
    <!-- md-content can NOT be ng-html-bind'ed  -->
    <div id="fs_resource_code" class="ja-content" layout-padding layout-margin>
        <h2>Filesystem Operations & Resources</h2>
        <p class="ja-personal-experience">
            I made heavy use of PHPs' resource functions to build automated data processing systems. <br>
            I would scan data files on disk to perform automated <i>data analysis</i> & computations <br>
            such as figuring out the distance of each address to its' destination Post Office.
        </p>
        <h5 class="ja-functions-used">
            In this example, the io functions I use are:<br>
            fopen(), feof(), fclose(), fgets(), fscanf()
        </h5>

        <!-- Sample code -->
        <pre>$fs_resource_code</pre>
    </div>

    <br><br>

    <div id="fs_resource_output" class="ja-content" layout-padding layout-margin>
        <h3>The output from the above code:</h3>

        <!-- Code output -->
        <?= $fs_resource_output ?>
    </div>
ANGULAR_JS;
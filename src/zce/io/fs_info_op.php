<?php
// io functions used:
// chdir(), opendir(), readdir(), mkdir(), rmdir()
// finfo_open(), finfo_open(), SplFileInfo
// copy(), file_exists(), fileatime(), filemtime(), fileowner(),
// fileperms(), filesize(), filetype(), rename(), unlink()
// I prefix my initials since this function is in global scope

/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/13/2020
 * Time: 1:18 AM
 */
function jaFilesystemManagement(): string {
    $o = '<ul>';
    chdir('data');
    $ml = __METHOD__ . ' line: ' . __LINE__;
    $fs = fopen('acc-sales.csv', 'r') or exit("__>> Failed to open file ~$ml");
    $folder = 'sales-reports';
    $salesRepFieldIndex = null;
    $headerRow = null;
    
    $lambdaReport = function($row) use (&$headerRow) {
        $dataReport = '<ul>';
        $records = array_combine($headerRow, $row);
        foreach($records as $k => $v) $dataReport .= "<li><b>$k:</b> $v</li>";
        $dataReport .= "</ul>";
        return $dataReport;
    };
    
    // create a folder for each sales rep
    while(!feof($fs)) {
        $row = fgetcsv($fs);
        if(false === $row) continue;
        
        if(!$salesRepFieldIndex) {
            $headerRow = $row;
            $salesRepFieldIndex = array_search('sales_rep', $row);
        }
        else {
            if(is_bool($salesRepFieldIndex)) {
                continue;
            }
            
            $salesRep = str_replace(' ', '-', $row[$salesRepFieldIndex]);
            $dir = "$folder/$salesRep";
            $href = "$dir/sales-report.html";
            $o .= "<li><a href='/data/$href' target='_blank'>$salesRep</a></li>";
            if(!is_dir($dir)) mkdir($dir, 0777, true);
            $salesRepSalesReport = fopen($href, 'w');
            fwrite($salesRepSalesReport, $lambdaReport($row));
            fclose($salesRepSalesReport);
        }
    }
    fclose($fs);
    chdir('..');
    
    $o .= '</ul>';
    return $o;
}

$fs_info_op_code = <<<'FS_INFO_OP_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/31/2020
 * Time: 8:45 PM
 */
// I prefix my initials since this function is in global scope
function jaFilesystemManagement(&$o) {
    chdir('data');
    $ml = __METHOD__ . ' line: ' . __LINE__;
    $fs = fopen('acc-sales.csv', 'r') or exit("__>> Failed to open file ~$ml");
    $folder = 'sales-reports';
    $salesRepFieldIndex = null;
    $headerRow = null;
    
    $lambdaReport = function($row) use (&$headerRow) {
        $dataReport = '<ul>';
        $records = array_combine($headerRow, $row);
        foreach($records as $k => $v) {
            $dataReport .= "<li><b>$k:</b> $v</li>";
        }
        $dataReport .= "</ul>";
        return $dataReport;
    };
    
    // create a folder for each sales rep
    while(!feof($fs)) {
        $row = fgetcsv($fs);
        if(false === $row) continue;
        
        if(!$salesRepFieldIndex) {
            $headerRow = $row;
            $salesRepFieldIndex = array_search('sales_rep', $row);
        }
        else {
            if(is_bool($salesRepFieldIndex)) {
                continue;
            }
            
            $salesRep = str_replace(' ', '-', $row[$salesRepFieldIndex]);
            $dir = "$folder/$salesRep";
            $href = "$dir/sales-report.html";
            $o .= "<li><a href='/data/$href' target='_blank'>$salesRep</a></li>";
            if(!is_dir($dir)) mkdir($dir, 0777, true);
            $salesRepSalesReport = fopen($href, 'w');
            fwrite($salesRepSalesReport, $lambdaReport($row));
            fclose($salesRepSalesReport);
        }
    }
    fclose($fs);
    chdir('..');
}
FS_INFO_OP_CODE;
$fs_info_op_code = htmlentities($fs_info_op_code);
$fs_info_op_output = jaFilesystemManagement();

return <<<ANGULAR_JS
    <div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
        <h2>Filesystem Management:</h2>
        <p class="ja-personal-experience">
            I often used these when building Command Line Interface Data Applications. <br>
            A user would double-click a batch file and PHP would extract data from PDFs, <br>
            move files around, and place the extracted data in a folder on the desktop.
        </p>
        <h5 class="ja-functions-used">
            In this example, the io functions and class I use are:<br>
            chdir(), opendir(), readdir(), mkdir(), rmdir(), finfo_open(), finfo_open(), SplFileInfo <br>
            copy(), file_exists(), fileatime(), filemtime(), fileowner(), fileperms(), filesize(), <br>
            filetype(), rename(), unlink()
        </h5>

        <!-- Sample io code -->
        <pre>$fs_info_op_code</pre>
    </div>
    
    <br><br>

    <div id="fs_info_op_output" class="ja-content" flex="60" layout-padding layout-margin>
        <h3>Output from the filesystem management code</h3>
        
        <!-- Code output -->
        $fs_info_op_output
    </div>
ANGULAR_JS;
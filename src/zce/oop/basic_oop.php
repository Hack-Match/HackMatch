<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:26 PM
 */

use CodeBuddies\WeeklySalesReport;

// 1. The data pipeline invokes php to begin processing data e.g.
// $ pipeline.bat c:/php/php.exe c:/data-apps/analyze-sales.php

// 2. mock data PHP scans from a file on disk
$augSalesData = [
    'sales_rep' => 'Mark',
    'sales_data' => [
        ['sales_amount' => 957.25],
        ['sales_amount' => 2499.21],
        ['sales_amount' => 512.83],
        ['sales_amount' => 4278.35],
    ],
];

// 3. after scanning, PHP does automated data analysis
$salesReport = new WeeklySalesReport($augSalesData);

$code_oop_basics = <<<'CODE_OOP_BASICS'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/31/2020
 * Time: 8:39 PM
 */

class WeeklySalesReport
{
    // public access modifiers
    public bool $hitSalesGoal;
    public string $salesRep;
    
    // private access modifiers
    private int $salesGoal = 7500;
    private float $totalSales;
    private array $salesData;
    
    public function __construct($data) {
        $this->salesRep = $data['sales_rep'];
        $this->salesData = $data['sales_data'];
        $this->analyzeSalesData();
    }
    
    private function analyzeSalesData() {
        foreach($this->salesData as $job) {
            $this->totalSales += $job['sales_amount'];
        }
        if($this->totalSales > $this->salesGoal) $this->hitSalesGoal = true;
        else $this->hitSalesGoal = false;
    }
    
    public function getResult() {
        if($this->hitSalesGoal) $o = "<p>$this->salesRep hit the sales goal</p>";
        else $o = "<p>$this->salesRep  failed to hit the sales goal</p>";
        return $o;
    }
}

// 1. The data pipeline invokes php to begin processing data e.g.
// $ pipeline.bat c:/php/php.exe c:/data-apps/analyze-sales.php

// 2. mock data PHP scans from a file on disk
$augSalesData = [
    'sales_rep' => 'Mark',
    'sales_data' => [
        ['sales_amount' => 957.25],
        ['sales_amount' => 2499.21],
        ['sales_amount' => 512.83],
        ['sales_amount' => 4278.35],
    ],
];

// 3. after scanning, PHP does automated data analysis
$salesReport = new WeeklySalesReport($augSalesData);
CODE_OOP_BASICS;

$output_oop_basics = '';

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>... I'm working on this example.<br>I'll have examples of all skills between:<br>9-27-2020 to 10-10-2020</h2>
    <p class="ja-personal-experience">
        When building automated data processing systems and data applications <br>
        with an HTML5 based User Interface... <br>
    </p>
    <h5 class="ja-techniques-used">
        In the example, the functions/classes/techniques used are: <br>
        some_function(), SomeClass, etc.
    </h5>
    
    <!-- Sample code -->
    <pre>$ sample_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$ code_output</div>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;

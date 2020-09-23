<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:24 PM
 */
function jaGeneratorsStruct() {
    function q1_new_customers() {
        $janFebMar = [
            ['Property One Acquisitions', 'Mark'],
            ['5th Point Lending', 'Bill'],
            ['Hills Sisters LLC', 'Joe'],
            ['Atlantic Lending', 'Bill'],
        ];
        $total = 0;
        foreach($janFebMar as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q2_new_customers() {
        $aprMayJune = [
            ['Ultra Flow Works', 'Bill',],
            ['Print Queens USA', 'Joe'],
            ['Knit Pack Printing', 'Mark'],
        ];
        $total = 0;
        foreach($aprMayJune as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q3_new_customers() {
        $julyAugSep = [
            ['Royal Acquisitions', 'Mark'],
            ['1st Street Lending', 'Bill'],
            ['Cal Cousins Inc', 'Joe'],
            ['Pacific Lend Tech', 'Joe'],
        ];
        $total = 0;
        foreach($julyAugSep as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q4_new_customers() {
        $octNovDec = [
            ['Super Flow Works', 'Bill',],
            ['Prince Printing USA', 'Joe'],
            ['Knit Knack Mailing', 'Mark'],
            ['Fluid Works', 'Mark',],
            ['Mail Experts USA', 'Joe'],
            ['Upward Financial', 'Mark'],
        ];
        
        $total = 0;
        foreach($octNovDec as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function newCustomersDataAnalysis() {
        // data analysis
        $da = new class() {
            private int $year_total = 0;
            
            public function addTotal(int $total): void {
                $this->year_total += $total;
            }
        };
        
        $q1 = q1_new_customers();
        
        yield from $q1;
        yield from q2_new_customers();
        yield from q3_new_customers();
        yield from q4_new_customers();
        
        $da->addTotal($q1);
        $da->addTotal(q2_new_customers()->getReturn());
        $da->addTotal(q3_new_customers()->getReturn());
        $da->addTotal(q4_new_customers()->getReturn());
        
        return $da;
    }
    
    // new customers per month
    $newCustomers = []; //newCustomersDataAnalysis();
    $results = [];
    foreach($newCustomers as $salesRep => $newCustomer) {
        if(!isset($results[$salesRep])) {
            $results[$salesRep] = [$newCustomer];
        }
        else {
            $results[$salesRep] = array_merge($results[$salesRep], $newCustomer);
        }
    }
    
    return '';
}

$generator_code = <<<'GENERATOR_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 3:24 PM
 */

function ja_generators() {

}

$generators_code = <<<'generators'

generators;

$generators_output = ja_generators();

function jaGeneratorsStruct() {
    function q1_new_customers() {
        $janFebMar = [
            ['Property One Acquisitions', 'Mark'],
            ['5th Point Lending', 'Bill'],
            ['Hills Sisters LLC', 'Joe'],
            ['Atlantic Lending', 'Bill'],
        ];
        $total = 0;
        foreach($janFebMar as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q2_new_customers() {
        $aprMayJune = [
            ['Ultra Flow Works', 'Bill',],
            ['Print Queens USA', 'Joe'],
            ['Knit Pack Printing', 'Mark'],
        ];
        $total = 0;
        foreach($aprMayJune as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q3_new_customers() {
        $julyAugSep = [
            ['Royal Acquisitions', 'Mark'],
            ['1st Street Lending', 'Bill'],
            ['Cal Cousins Inc', 'Joe'],
            ['Pacific Lend Tech', 'Joe'],
        ];
        $total = 0;
        foreach($julyAugSep as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q4_new_customers() {
        $octNovDec = [
            ['Super Flow Works', 'Bill',],
            ['Prince Printing USA', 'Joe'],
            ['Knit Knack Mailing', 'Mark'],
            ['Fluid Works', 'Mark',],
            ['Mail Experts USA', 'Joe'],
            ['Upward Financial', 'Mark'],
        ];
        
        $total = 0;
        foreach($octNovDec as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function newCustomersDataAnalysis() {
        // data analysis
        $da = new class() {
            private int $year_total = 0;
            
            public function addTotal(int $total): void {
                $this->year_total += $total;
            }
        };
        
        $q1 = q1_new_customers();
        
        yield from $q1;
        yield from q2_new_customers();
        yield from q3_new_customers();
        yield from q4_new_customers();
        
        $da->addTotal($q1);
        $da->addTotal(q2_new_customers()->getReturn());
        $da->addTotal(q3_new_customers()->getReturn());
        $da->addTotal(q4_new_customers()->getReturn());
        
        return $da;
    }
    
    // new customers per month
    $newCustomers = []; //newCustomersDataAnalysis();
    $results = [];
    foreach($newCustomers as $salesRep => $newCustomer) {
        if(!isset($results[$salesRep])) {
            $results[$salesRep] = [$newCustomer];
        }
        else {
            $results[$salesRep] = array_merge($results[$salesRep], $newCustomer);
        }
    }
    
    return '';
}
GENERATOR_CODE;

$generator_output = jaGeneratorsStruct();

return <<<ANGULAR_JS_GENERATORS_CONTENT
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
    $ code_output
</div>
ANGULAR_JS_GENERATORS_CONTENT;
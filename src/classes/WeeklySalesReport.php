<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/4/2020
 * Time: 4:22 AM
 */

namespace CodeBuddies;

class WeeklySalesReport
{
    // public access modifiers
    public bool $hitSalesGoal;
    public string $salesRep;
    
    // private access modifiers
    private int $salesGoal = 7500;
    private float $totalSales = 0;
    private array $salesData;
    
    public function __construct($data) {
        $this->salesRep = $data['sales_rep'];
        $this->salesData = $data['sales_data'];
        $this->salesDataAnalysis();
    }
    
    private function salesDataAnalysis() {
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
<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:45 AM
 */


namespace CodeBuddies;


class DataTopicStruct
{
    use LandingTrait;
    
    // AngularJS content vars
    public string $intro = 'dat_data_intro';
    public string $ds = 'dat_data_structures';
    public string $date = 'dat_date_time';
    public string $json = 'dat_json';
    public string $rest = 'dat_rest';
    public string $soap = 'dat_soap';
    public string $xml = 'dat_xml';
    
    public function __construct() {
        $this->title = 'Data Services & Formats';
        $this->icon = 'memory';
        $this->href = '/julius/data';
    }
}
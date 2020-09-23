<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:56 AM
 */


namespace CodeBuddies;


class TestTopicStruct
{
    use LandingTrait;
    
    public function __construct() {
        $this->title = 'Unit Testing';
        $this->icon = 'bug_report';
        $this->href = '/julius/testing';
    }
}
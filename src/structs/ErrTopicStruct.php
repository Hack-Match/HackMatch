<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:45 AM
 */


namespace CodeBuddies;


class ErrTopicStruct
{
    use LandingTrait;
    
    public string $er_class = 'err_error_class';
    public string $config = 'err_error_configuration';
    public string $type = 'err_error_types';
    public string $intro = 'err_errors_intro';
    public string $ex_class = 'err_exception_class';
    public string $throw = 'err_throwable';
    public string $cust = 'err_custom_errors';
    public string $func = 'err_error_functions';
    public string $try = 'err_try_catch_finally';
    
    public function __construct() {
        $this->title = 'Error Handling';
        $this->icon = 'warning';
        $this->href = '/julius/errors';
    }
}
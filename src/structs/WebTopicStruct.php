<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:45 AM
 */


namespace CodeBuddies;


class WebTopicStruct
{
    use LandingTrait;
    
    // AngularJS content vars
    public string $enc = 'web_encode_decode';
    public string $file = 'web_file_uploads';
    public string $forms = 'web_html_forms';
    public string $auth = 'web_http_authentication';
    public string $req_res = 'web_http_requests_responses';
    public string $net = 'web_network_functions';
    public string $ob = 'web_output_buffer';
    public string $ses = 'web_sessions';
    public string $sup = 'web_super_globals';
    public string $intro = 'web_intro';
    
    public function __construct() {
        $this->title = 'Built-in Web Features of PHP';
        $this->icon = 'language';
        $this->href = '/julius/web';
    }
}
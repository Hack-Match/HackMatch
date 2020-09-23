<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:46 AM
 */


namespace CodeBuddies;


class SecTopicStruct
{
    // Landing page vars
    public string $icon = 'security';
    public string $title = 'Web Application Security';
    public string $href = '/julius/security';
    
    // AngularJS content vars
    public string $enc = 'sec_encryption_hashing';
    public string $file = 'sec_file_upload_security';
    public string $filter = 'sec_filter_escape';
    public string $https = 'sec_https';
    public string $per = 'sec_permissions';
    public string $rem = 'sec_remote_code_injection';
    public string $intro = 'sec_security_intro';
    public string $ses = 'sec_session_security';
    public string $sql = 'sec_sql_injection';
    public string $xsrf = 'sec_xsrf';
    public string $xss = 'sec_xss';
}
<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:47 AM
 */


namespace CodeBuddies;


class IOTopicStruct
{
    use LandingTrait;
    
    public string $info = 'io_fs_info_op';
    public string $resource = 'io_fs_resource';
    public string $intro = 'io_intro';
    public string $stream = 'io_stream';
    
    public function __construct() {
        $this->title = 'io (Input Output)';
        $this->icon = 'sync';
        $this->href = '/julius/io';
    }
}
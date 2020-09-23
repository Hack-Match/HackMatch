<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:18 AM
 */


namespace CodeBuddies;


class TopicsStruct
{
    public StrTopicStruct $str;
    public ArrTopicStruct $arr; // arrays
    public BasicTopicStruct $bas; // basics
    public DataTopicStruct $dat;
    public ErrTopicStruct $err;
    public OOPTopicStruct $oop;
    public SecTopicStruct $sec; // security
    public SQLTopicStruct $sql;
    public WebTopicStruct $web;
    public TestTopicStruct $tes; // testing
    public FPTopicStruct $fp;  // functional programming
    public IOTopicStruct $io;
    
    public function __construct() {
        $this->str = new StrTopicStruct();
        $this->arr = new ArrTopicStruct();
        $this->bas = new BasicTopicStruct();
        $this->dat = new DataTopicStruct();
        $this->err = new ErrTopicStruct();
        $this->oop = new OOPTopicStruct();
        $this->sec = new SecTopicStruct();
        $this->sql = new SQLTopicStruct();
        $this->web = new WebTopicStruct();
        $this->tes = new TestTopicStruct();
        $this->fp = new FPTopicStruct();
        $this->io = new IOTopicStruct();
    }
}
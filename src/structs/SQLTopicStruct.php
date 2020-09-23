<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/15/2020
 * Time: 2:55 AM
 */


namespace CodeBuddies;


class SQLTopicStruct
{
    // Landing page vars
    public string $title = 'SQL & Database Systems';
    public string $icon = 'storage';
    public string $href = '/julius/sql';
    
    // AngularJS content vars
    public string $agg = 'sql_aggregates';
    public string $crud = 'sql_crud_ops';
    public string $def = 'sql_data_definitions';
    public string $type = 'sql_data_types';
    public string $grp = 'sql_grouping';
    public string $join = 'sql_joins';
    public string $key = 'sql_keys_indexes';
    public string $pdo_me = 'sql_pdo_fetch_methods';
    public string $pdo_mo = 'sql_pdo_fetch_modes';
    public string $prep = 'sql_prepared_statements';
    public string $intro = 'sql_db_intro';
    public string $tr = 'sql_transactions';
}
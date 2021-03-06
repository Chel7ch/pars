<?php

namespace Prepare;

use Config\Config;

/**  Create string to query to DB */

abstract class PrepInsertQuery
{
    /**
     * @param array $data
     * @param string $tabName
     * @return string
     */
    public function prepInsert($data, $tabName = TAB_NAME )
    {
        $query = '';
        if(empty($data)){
            return $query;
        }

        if($tabName == TAB_NAME and Config::get('outputWithUrl') == 1) $firstRow = 'INSERT INTO ' . TAB_NAME . '(links,';
        else $firstRow = 'INSERT INTO ' . $tabName . '(';

        $tab = $firstRow;

        for ($i = 0; $i < Config::get('tabFields'); $i++) {
            $tab .= 'field' . ($i+1) . ',';
        }
        $val = ' VALUES';
        for ($i = 0; $i < count($data); $i++) {
            $val .= '(' . $data[$i] . '),';
        }

        $tab = substr($tab, 0, -1);
        $val = substr($val, 0, -1);
        $query = $tab . ')' . $val . ';';

        return $query;
    }
}

<?php

/**
 * Zend_Controller_Action_Helper_Csv
 *
 * @package   KA
 * @author    Konrad Abmeier
 * @copyright Copyright (c) 2011 KA :: Konrad Abmeier (http://blog.abmeier.de)
 * @license   http://creativecommons.org/licenses/by-nc-nd/3.0/de/     CC BY-NC-ND 3.0
 * @version   $Id: Csv.php 10014 2011-09-06 22:10:00Z KA $
 */
class Zend_Controller_Action_Helper_Csv extends Zend_Controller_Action_Helper_Abstract
{

    /**
     * Perform helper when called as $this->_helper->Csv() from an action controller
     *
     * @param  array $aryData
     * @param  string $strName
     * @param  bool $bolCols ; default true; zeigt Spaltenüberschriften
     * @return void
     */
    public function direct($aryData = array(), $strName = "csv", $bolCols = true)
    {
        $this->printExcel($aryData, $strName, $bolCols);
    }

    /**
     * array via fputcsv() zu csv
     *
     * @param  array $aryData
     * @param  string $strName
     * @param  bool $bolCols
     * @return void
     */
    public function printExcel($aryData = array(), $strName = "csv", $bolCols = true)
    {

        if (!is_array($aryData) || empty($aryData)) {
            exit(1);
        }

        // header
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename=" . $strName . "-export.csv");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-control: private, must-revalidate');
        header("Pragma: public");

        // Spaltenüberschriften
        if ($bolCols) {
            $aryCols = array_keys($aryData[0]);
            array_unshift($aryData, $aryCols);
        }

        // Ausgabepuffer für fputcsv
        ob_start();

        // output Stream für fputcsv
        $fp = fopen("php://output", "w");
        if (is_resource($fp)) {
            foreach ($aryData as $aryLine) {
                // ";" für Excel
                fputcsv($fp, $aryLine, ';', '"');
            }

            $strContent = ob_get_clean();

            // Excel SYLK-Bug
            // http://support.microsoft.com/kb/323626/de
            $strContent = preg_replace('/^ID/', 'id', $strContent);

            $strContent = utf8_decode($strContent);
            $intLength = mb_strlen($strContent, 'utf-8');

            // length
            header('Content-Length: ' . $intLength);

            // kein fclose($fp);

            echo $strContent;
            exit(0);
        }
        ob_end_clean();
        exit(1);
    }
}
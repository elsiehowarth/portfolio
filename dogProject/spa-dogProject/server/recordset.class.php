<?php
//classes to handle db connection and record set creation
require_once('../../Classes/pdoConnection.php');
abstract class E_RecordSet{
    protected $db;
    protected $stmt;

    function __construct(){
        $this->db = pdoDB::getConnection();
    }

    public  function getRecordSet($sql, $elementName = "ResultSet", $params = null) {
        if (is_array($params)) {
            $this->stmt = $this->db->prepare($sql);
            // execute the statement passing in the named placeholder and the value it'll have
            $this->stmt->execute($params);
        }
        else {
            $this->stmt = $this->db->query($sql);
        }
        return $this->stmt;
    }
}

class E_PDORecordSet extends E_RecordSet {
    public function getRecordSet($sql, $elementName='element', $params = null) {
        return parent::getRecordSet($sql);
    }
}

//class to wrap a record set in an xml wrapper
class E_XMLRecordSet extends E_RecordSet{
    public function getRecordSet ( $sql, $elementName='element', $params = null) {
        $stmt = parent::getRecordSet( $sql );
        $returnValue = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
        $returnValue .= "<{$elementName}s>\n";  // add an 's' for the root element
        // fetch each record as an associative array
        while ($book = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $returnValue .= "<$elementName>\n";  // element name as a tag
            /* iterate through each field in the associative array,
               see php help on foreach */
            foreach ( $book as $key => $value ) {
                // write the key as a tag enclosing its value
                $value = htmlspecialchars($value);
                $returnValue .= "\t<$key>$value</$key>\n";
            }
            $returnValue .= "</$elementName>\n";
        }
        $returnValue .= "</{$elementName}s>\n";
        return $returnValue;
    }
}

class JSONRecordSet extends E_RecordSet {
    /**
     * function to return a record set as a json encoded string
     * @param $sql         string with sql to execute to retrieve the record set
     * @param $elementName string that will be the name of the repeating elements
     * @param $params      is an array that, if passed, is used for prepared statements, it should be an assoc array of param name => value
     * @return string      a json object showing the status, number of records and the records themselves if there are any
     */
    function getRecordSet($sql, $elementName = "ResultSet", $params = null) {
        $stmt     = parent::getRecordSet($sql, '', $params);
        $recordSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nRecords = count($recordSet);
        if ($nRecords == 0) {
            $status = 'error';
            $message = array("text" => "No records found");
            $result = '[]';
        }
        else {
            $status = 'ok';
            $message = array("text" => "");
            $result = $recordSet;
        }
        $getArray = array(
                'status' => $status,
                'message' => $message,
                "$elementName" => array(
                    "RowCount"=>$nRecords,
                    "Result"=>$result
                )
            );
        if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
            return json_encode(
                $getArray,
                JSON_NUMERIC_CHECK, JSON_PRETTY_PRINT
            );
        }
            else{
                return json_encode(
                    $getArray
                );
            }
    }

}
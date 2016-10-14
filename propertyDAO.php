<?php
class DAO_Property
{
    public $PROPSUBURB;
    public $PROPTYPE;
    public $PRICE;
    private $_conn;

    function __construct($conn)
    {
        $this->_conn =$conn;
    }

    public function find_customer_by_id($cust_no)
    {
        $sql = 'SELECT * FROM customer WHERE cust_no =' . $cust_no;
        $parse = oci_parse($this->_conn, $sql);
        oci_execute($parse);

        $result = oci_fetch_assoc($parse);

        if($result)
        {
            $this->CUST_NO = $result['CUST_NO'];
            $this->FIRSTNAME = $result['FIRSTNAME'];
            $this->SURNAME = $result['SURNAME'];
            $this->ADDRESS = $result['ADDRESS'];
            $this->CONTACT = $result['CONTACT'];
            return true;
        }
        else
        {
            return false;
        }

    }


    public function find($where)
    {
        $sql = "SELECT * FROM Property";

        // This array will hold the where clause
        $whereClause = array();

        foreach($where as $key => $value)
        {
            $whereClause[] = $key . "='" . $value . "'";
        }

       if(count($whereClause) > 0)
       {
           $sql .= " WHERE " . implode(' AND ', $whereClause);
       }

        $parse = oci_parse($this->_conn, $sql);
        oci_execute($parse);

        $numrows = oci_fetch_all($parse, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        if($numrows >0) {
            include_once('ReadOnlyResultSet.php');
            return new ReadOnlyResultSet($results);
        }
        else
        {
            return false;
        }
    }

}

?>
<?php

class Getdata extends CI_Model
{
    function check_Age()
    {
        $query = $this->db->query("SELECT count(age) age FROM data_latih
        WHERE autism = 'no'
        AND age = 0");
        return $query->row_array();
    }
    function avg_Age()
    {
        $query = $this->db->query("SELECT AVG(age) rerata_no FROM data_latih
        WHERE autism = 'no'");
        return $query->row_array();
    }

    function getClass()
    {
        $query = $this->db->query(
            "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'data_latih' AND column_name = 'CLASS' GROUP BY column_name"
        );
        return $query->row_array();
    }

    var $column_order = array(null, 'id_latih', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism'); //set column field database for datatable orderable
    var $column_search = array('A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = ['id_latih' => 'desc']; // default

    private function _get_datatables()
    {

        $this->db->select('id_latih,
        A1_Score,
        A2_Score,
        A3_Score,
        A4_Score,
        A5_Score,
        A6_Score,
        A7_Score,
        A8_Score,
        A9_Score,
        A10_Score,
        age,
        gender,
        jundice,
        autism
        ');
        $this->db->from('data_latih');

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->_get_datatables());

        return $this->db->count_all_results();
    }

    public function countrow()
    {
        $this->db->select('COUNT(*) jml_data_latih');
        $this->db->from('data_latih');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function countatrib()
    {
        $this->db->select('COUNT(*)-1 jml_atrib');
        $this->db->from('information_schema.columns');
        $this->db->where('table_name', 'data_latih');
        $query = $this->db->get();
        return $query->row_array();
    }


    //================= DATA UJI
    var $coluji_order = array(null, 'id_uji', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score'); //set column field database for datatable orderable
    var $coluji_search = array('id_uji', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $orderuji = ['id_uji' => 'asc']; // default

    private function _get_datatables_uji()
    {

        $this->db->select('*');
        $this->db->from('data_uji');

        $i = 0;

        foreach ($this->coluji_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->coluji_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->coluji_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $orderuji = $this->orderuji;
            $this->db->order_by(key($orderuji), $orderuji[key($orderuji)]);
        }
    }

    function get_datatables_uji()
    {
        $this->_get_datatables_uji();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_uji()
    {
        $this->_get_datatables_uji();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_uji()
    {
        $this->db->from($this->_get_datatables_uji());

        return $this->db->count_all_results();
    }
    public function countatrib_uji()
    {
        $this->db->select('COUNT(*)-8 jml_atrib');
        $this->db->from('information_schema.columns');
        $this->db->where('table_name', 'data_latih');
        $query = $this->db->get();
        return $query->row_array();
    }


    //=======================================

    function getA_score()
    {
        $query = $this->db->query("
            SELECT (SELECT COUNT(A1_Score) FROM data_latih WHERE A1_Score = 1 AND CLASS = 'no') A1_YES_NORMAL, 
            (SELECT COUNT(A1_Score) FROM data_latih WHERE A1_Score = 0 AND CLASS = 'no' ) A1_NO_NORMAL, 
            (SELECT COUNT(A1_Score) FROM data_latih WHERE A1_Score = 1 AND CLASS = 'yes') A1_YES_AUTIS, 
            (SELECT COUNT(A1_Score) FROM data_latih WHERE A1_Score = 0 AND CLASS = 'yes' ) A1_NO_AUTIS, 

            (SELECT COUNT(A2_Score) FROM data_latih WHERE A2_Score = 1 AND CLASS = 'no' ) A2_YES_NORMAL, 
            (SELECT COUNT(A2_Score) FROM data_latih WHERE A2_Score =0 AND CLASS = 'no') A2_NO_NORMAL,
            (SELECT COUNT(A2_Score) FROM data_latih WHERE A2_Score = 1 AND CLASS = 'yes' ) A2_YES_AUTIS, 
            (SELECT COUNT(A2_Score) FROM data_latih WHERE A2_Score =0 AND CLASS = 'yes') A2_NO_AUTIS,

            (SELECT COUNT(A3_Score) FROM data_latih WHERE A3_Score = 1 AND CLASS = 'no' ) A3_YES_NORMAL, 
            (SELECT COUNT(A3_Score) FROM data_latih WHERE A3_Score =0 AND CLASS = 'no' ) A3_NO_NORMAL,
            (SELECT COUNT(A3_Score) FROM data_latih WHERE A3_Score = 1 AND CLASS = 'yes') A3_YES_AUTIS, 
            (SELECT COUNT(A3_Score) FROM data_latih WHERE A3_Score =0 AND CLASS = 'yes') A3_NO_AUTIS,

            (SELECT COUNT(A4_Score) FROM data_latih WHERE A4_Score = 1 AND CLASS = 'no' ) A4_YES_NORMAL, 
            (SELECT COUNT(A4_Score) FROM data_latih WHERE A4_Score =0 AND CLASS = 'no' ) A4_NO_NORMAL,
            (SELECT COUNT(A4_Score) FROM data_latih WHERE A4_Score = 1 AND CLASS = 'yes') A4_YES_AUTIS, 
            (SELECT COUNT(A4_Score) FROM data_latih WHERE A4_Score =0 AND CLASS = 'yes') A4_NO_AUTIS,


            (SELECT COUNT(A5_Score) FROM data_latih WHERE A5_Score = 1 AND CLASS = 'no') A5_YES_NORMAL,
            (SELECT COUNT(A5_Score) FROM data_latih WHERE A5_Score =0  AND CLASS = 'no') A5_NO_NORMAL,
            (SELECT COUNT(A5_Score) FROM data_latih WHERE A5_Score = 1 AND CLASS = 'yes') A5_YES_AUTIS,
            (SELECT COUNT(A5_Score) FROM data_latih WHERE A5_Score =0 AND CLASS = 'yes') A5_NO_AUTIS,

            (SELECT COUNT(A6_Score) FROM data_latih WHERE A6_Score = 1 AND CLASS = 'no' ) A6_YES_NORMAL, 
            (SELECT COUNT(A6_Score) FROM data_latih WHERE A6_Score =0 AND CLASS = 'no') A6_NO_NORMAL,
            (SELECT COUNT(A6_Score) FROM data_latih WHERE A6_Score = 1 AND CLASS = 'yes') A6_YES_AUTIS, 
            (SELECT COUNT(A6_Score) FROM data_latih WHERE A6_Score =0 AND CLASS = 'yes') A6_NO_AUTIS,


            (SELECT COUNT(A7_Score) FROM data_latih WHERE A7_Score = 1 AND CLASS = 'no') A7_YES_NORMAL, 
            (SELECT COUNT(A7_Score) FROM data_latih WHERE A7_Score =0 AND CLASS = 'no') A7_NO_NORMAL,
            (SELECT COUNT(A7_Score) FROM data_latih WHERE A7_Score = 1 AND CLASS = 'yes') A7_YES_AUTIS, 
            (SELECT COUNT(A7_Score) FROM data_latih WHERE A7_Score =0 AND CLASS = 'yes') A7_NO_AUTIS,

            (SELECT COUNT(A8_Score) FROM data_latih WHERE A8_Score = 1 AND CLASS = 'no' ) A8_YES_NORMAL, 
            (SELECT COUNT(A8_Score) FROM data_latih WHERE A8_Score =0 AND CLASS = 'no') A8_NO_NORMAL,
            (SELECT COUNT(A8_Score) FROM data_latih WHERE A8_Score = 1 AND CLASS = 'yes') A8_YES_AUTIS, 
            (SELECT COUNT(A8_Score) FROM data_latih WHERE A8_Score =0 AND CLASS = 'yes') A8_NO_AUTIS,

            (SELECT COUNT(A9_Score) FROM data_latih WHERE A9_Score = 1 AND CLASS = 'no') A9_YES_NORMAL, 
            (SELECT COUNT(A9_Score) FROM data_latih WHERE A9_Score =0 AND CLASS = 'no') A9_NO_NORMAL,
            (SELECT COUNT(A9_Score) FROM data_latih WHERE A9_Score = 1 AND CLASS = 'yes' ) A9_YES_AUTIS, 
            (SELECT COUNT(A9_Score) FROM data_latih WHERE A9_Score =0 AND CLASS = 'yes') A9_NO_AUTIS,

            (SELECT COUNT(A10_Score) FROM data_latih WHERE A10_Score = 1 AND CLASS = 'no') A10_YES_NORMAL, 
            (SELECT COUNT(A10_Score) FROM data_latih WHERE A10_Score =0 AND CLASS = 'no') A10_NO_NORMAL,
            (SELECT COUNT(A10_Score) FROM data_latih WHERE A10_Score = 1 AND CLASS = 'yes') A10_YES_AUTIS, 
            (SELECT COUNT(A10_Score) FROM data_latih WHERE A10_Score =0 AND CLASS = 'yes') A10_NO_AUTIS
        ");
        return $query->result_array();
    }

    function getAutism()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(CLASS) FROM data_latih WHERE CLASS = 'yes') Autism, (SELECT COUNT(CLASS) FROM data_latih WHERE CLASS = 'no') Normal");
        return $query->row_array();
    }

    function getGender()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(gender) FROM data_latih WHERE gender = 'm' AND CLASS = 'yes') M_AUTIS,
        (SELECT COUNT(gender) FROM data_latih WHERE gender = 'f' AND CLASS = 'yes') F_AUTIS,
        (SELECT COUNT(gender) FROM data_latih WHERE gender = 'm' AND CLASS = 'no') M_NORMAL,
        (SELECT COUNT(gender) FROM data_latih WHERE gender = 'f' AND CLASS = 'no') F_NORMAL");
        return $query->result_array();
    }

    function getAge()
    {
        $query = $this->db->query("SELECT p.age age, normal, autis
        FROM   (SELECT COUNT(age) AS normal, age
            FROM data_latih
                WHERE age NOT IN (0)
                AND CLASS = 'no'
                GROUP BY age) p
        JOIN   (SELECT COUNT(age) AS autis, age
                FROM data_latih
                WHERE age NOT IN (0)
                AND CLASS = 'yes'
                 GROUP BY age) s ON p.age = s.age");
        return $query->result_array();
    }
    function getJundice()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(jundice) FROM data_latih WHERE jundice = 'yes' AND CLASS = 'no')  Y_normal,
        (SELECT COUNT(jundice) FROM data_latih WHERE jundice = 'yes' AND CLASS = 'yes') Y_autism,
        
        (SELECT COUNT(jundice) FROM data_latih WHERE jundice = 'no' AND CLASS = 'no') N_normal,
        (SELECT COUNT(jundice) FROM data_latih WHERE jundice = 'no' AND CLASS = 'yes') N_autism");
        return $query->result_array();
    }
    function getAutisTree()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(autism) FROM data_latih WHERE autism = 'yes' AND CLASS = 'no')  Y_normal,
        (SELECT COUNT(autism) FROM data_latih WHERE autism = 'yes' AND CLASS = 'yes') Y_autism,
        
        (SELECT COUNT(autism) FROM data_latih WHERE autism = 'no' AND CLASS = 'no') N_normal,
        (SELECT COUNT(autism) FROM data_latih WHERE autism = 'no' AND CLASS = 'yes') N_autism");
        return $query->result_array();
    }
}

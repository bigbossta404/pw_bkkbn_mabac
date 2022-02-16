<?php

class Getdata extends CI_Model
{
    var $column_order = array('id_kriteria', 'nama', 'menyusui', 'hamil', 'penyakit', 'bb', null); //set column field database for datatable orderable
    var $column_search = array('id_kriteria', 'nama', 'menyusui', 'hamil', 'penyakit', 'bb'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = ['id_kriteria' => 'ASC']; // default

    private function _get_datatables()
    {

        $this->db->select('*');
        $this->db->from('kriteria');

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
    // =================================================================================
    function getHasil()
    {
        $query = $this->db->query('SELECT id_hitung,
        nama,
        nilai,
        @curRank := @curRank + 1 AS rank
        FROM save_hitung, (SELECT @curRank := 0) r
        WHERE id_loghitung = (SELECT MAX(id_loghitung) FROM save_hitung)
        ORDER BY  nilai DESC');
        return $query->result_array();
    }

    public function countrow()
    {
        $this->db->select('COUNT(*) jml_data');
        $this->db->from('kriteria');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function countatrib()
    {
        $this->db->select('COUNT(COLUMN_NAME) jml_atrib');
        $this->db->from('information_schema.columns');
        $this->db->where('table_name', 'kriteria');
        $this->db->where_not_in('COLUMN_NAME', 'id_kriteria');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function columnKriteria()
    {
        $this->db->select('COLUMN_NAME');
        $this->db->from('information_schema.columns');
        $this->db->where('table_name', 'kriteria');
        $this->db->where_not_in('COLUMN_NAME', 'id_kriteria');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function primaryKriteria()
    {
        $ignore = array('id_kriteria', 'nama');
        $this->db->select('COLUMN_NAME');
        $this->db->from('information_schema.columns');
        $this->db->where('table_name', 'kriteria');
        $this->db->where_not_in('COLUMN_NAME', $ignore);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNama()
    {
        $this->db->select('*');
        $this->db->from('kriteria');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getMax()
    {
        $this->db->select('MAX(menyusui) maxnyusu, MAX(hamil) maxhamil, MAX(ku) maxku, MAX(penyakit) maxpenyakit, MAX(bb) maxbb');
        $this->db->from('kriteria');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getMin()
    {
        $this->db->select('IF(MIN(menyusui) = MAX(menyusui),0,MIN(menyusui)) minnyusu, 
        IF(MIN(hamil) = MAX(hamil),0,MIN(hamil)) minhamil, 
        IF(MIN(ku) = MAX(ku),0,MIN(ku)) minku, 
        IF(MIN(penyakit) =  MAX(penyakit),0,MIN(penyakit)) minpenyakit, 
        IF(MIN(bb) = MAX(bb),0,MIN(bb)) minbb');
        $this->db->from('kriteria');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getDataBobot()
    {
        $this->db->select('*');
        $this->db->from('bobot_kriteria');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBobot()
    {
        $bobot = array(
            'menyusui' => array(
                'ya' => 1,
                'tidak' => 3
            ),
            'hamil' => array(
                'ya' => 1,
                'tidak' => 3
            ),
            'keadaan_umum' => array(
                'baik' => 3,
                'sedang' => 2,
                'kurang' => 1
            ),
            'penyakit' => array(
                'radang' => 1,
                'keputihan' => 2,
                'sakit kuning' => 3,
                'tumor' => 4,
                'tidak' => 5,
            ),
            'bb' => array(
                '40-50' => 1,
                '50-60' => 3,
                '61-70' => 2
            ),
        );

        return $bobot;
    }

    public function getSaveHitung()
    {
        $this->db->select('nama, nilai');
        $this->db->from('save_hitung');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function saveTambah($data)
    {
        $this->db->insert('kriteria', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
    }
    public function deleteData($data)
    {
        $this->db->delete('kriteria', array('id_kriteria' => $data));
        if ($this->db->affected_rows() > 0) {
            return true;
        }
    }

    public function getIdLog()
    {
        $query = $this->db->query(
            'SELECT id_loghitung FROM log_hitung
            WHERE DATE = (SELECT MAX(DATE) FROM log_hitung)'
        );
        return $query->row_array();
    }
}

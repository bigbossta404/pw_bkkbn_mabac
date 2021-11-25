<?php

class Getdata extends CI_Model
{
    var $column_order = array('id_kriteria', 'nama', 'jangka_waktu', 'melahirkan', 'menstruasi', 'usia', 'penyakit'); //set column field database for datatable orderable
    var $column_search = array('id_kriteria', 'nama', 'jangka_waktu', 'melahirkan', 'menstruasi', 'usia', 'penyakit'); //set column field database for datatable searchable just firstname , lastname , address are searchable
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
        FROM      save_hitung, (SELECT @curRank := 0) r
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
        $this->db->select('MAX(jangka_waktu) maxwaktu, MAX(melahirkan) maxlahir,MAX(menstruasi) maxmens,MAX(usia)maxusia, MAX(penyakit)maxsakit');
        $this->db->from('kriteria');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getMin()
    {
        $this->db->select('MIN(jangka_waktu) minwaktu, MIN(melahirkan) minlahir,MIN(menstruasi) minmens,MIN(usia)minusia, MIN(penyakit)minsakit');
        $this->db->from('kriteria');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getBobot()
    {
        $bobot = array(
            'jangka_waktu' => array(
                'panjang' => 5,
                'pendek' => 2
            ),
            'melahirkan' => array(
                'sudah' => 3,
                'belum' => 1
            ),
            'menstruasi' => array(
                'ya' => 3,
                'tidak' => 5
            ),
            'usia' => array(
                '18-25' => 2,
                '26-35' => 4,
                '36-60' => 5
            ),
            'penyakit' => array(
                'kanker_payudara' => 1,
                'diabetes' => 2,
                'radang' => 4,
                'kuning' => 3,
                'tidak_ada' => 5
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
}

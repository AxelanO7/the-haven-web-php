<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Appraisal_model extends CI_Model
{

    public function get_karyawan()
    {
        $query = $this->db->query("SELECT * FROM karyawan");
        return $query->result();
    }

    public function untuk_tombol($id_karyawan)
    {
        $query = $this->db->query("SELECT * FROM appraisal WHERE id_karyawan='$id_karyawan'");
        return $query->num_rows();
    }

    public function get_karyawan2()
    {
        $query = $this->db->query("select appraisal.id_karyawan, karyawan.id_karyawan, karyawan.nama_karyawan FROM karyawan inner join appraisal on appraisal.id_karyawan = karyawan.id_karyawan");
        return $query->result();
    }

    public function tampil()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan");
        return $query->result();
    }

    public function tampilhodag()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=1");
        return $query->result();
    }

    public function tampilhodeng()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=2");
        return $query->result();
    }

    public function tampilhodfbk()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=3");
        return $query->result();
    }

    public function tampilhodfbs()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=4");
        return $query->result();
    }

    public function tampilhodfo()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=5");
        return $query->result();
    }

    public function tampilhodhk()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=6");
        return $query->result();
    }

    public function tampilhodhc()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=7");
        return $query->result();
    }

    public function tampilhodsm()
    {
        $query = $this->db->query("select karyawan.nama_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where id_departemen=8");
        return $query->result();
    }

    public function tampilstaff()
    {
        // $query = $this->db->query("select karyawan.nama_karyawan, karyawan.kode_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal from karyawan inner join appraisal on karyawan.id_karyawan = appraisal.id_karyawan inner join user on karyawan.kode_karyawan = user.username where karyawan.kode_karyawan = user.username");
        $this->db->select('karyawan.nama_karyawan, karyawan.kode_karyawan, appraisal.tgl_pengisian, appraisal.id_appraisal');
        $this->db->from('karyawan');
        $this->db->join('appraisal', 'karyawan.id_karyawan = appraisal.id_karyawan');
        $this->db->join('user', 'karyawan.kode_karyawan = user.username');
        $this->db->where('karyawan.kode_karyawan = user.username');
        // $this->db->where('karyawan.kode_karyawan', 'user.username');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('appraisal', $data);
        return $result;
    }

    public function lihat($id_karyawan, $data = [])
    {
        $query = $this->db->query("select karyawan.nama_karyawan, karyawan.id_karyawan, appraisal.tgl_pengisian, appraisal.progress, appraisal.development, appraisal.strongest_perform, appraisal.giving_feedback, appraisal.assistance, appraisal.main_strength, appraisal.tobe_improved, appraisal.training_course, appraisal.comment from appraisal inner join karyawan on karyawan.id_karyawan = appraisal.id_karyawan where karyawan.id_karyawan='$id_karyawan'");
        $id_appraisal = $this->db->query("SELECT id_appraisal FROM appraisal WHERE id_karyawan='$id_karyawan'");
        $query_rowed = $query->row();
        $id_appraisal_rowed = $id_appraisal->row();
        $query_rowed->id_appraisal = $id_appraisal_rowed->id_appraisal;
        return $query_rowed;
    }

    public function show($id_appraisal)
    {
        $this->db->where('id_appraisal', $id_appraisal);
        $query = $this->db->get('appraisal');
        return $query->row();
    }

    public function update($id_appraisal, $data = [])
    {
        $ubah = array(
            'tgl_pengisian' => $data['tgl_pengisian'],
            'progress' => $data['progress'],
            'development' => $data['development'],
            'strongest_perform' => $data['strongest_perform'],
            'giving_feedback' => $data['giving_feedback'],
            'assistance' => $data['assistance'],
            'main_strength' => $data['main_strength'],
            'tobe_improved' => $data['tobe_improved'],
            'training_course' => $data['training_course'],
            'comment' => $data['comment'],
        );

        $this->db->where('id_appraisal', $id_appraisal);
        $this->db->update('appraisal', $ubah);
    }

    public function delete($id_appraisal)
    {
        $this->db->where('id_appraisal', $id_appraisal);
        $this->db->delete('appraisal');
    }

    public function get_id_appraisal($id_karyawan)
    {
        $query = $this->db->query("SELECT id_appraisal FROM appraisal WHERE id_karyawan='$id_karyawan'");
        return $query->row();
    }
}

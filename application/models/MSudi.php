<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MSudi extends CI_Model
{
    // function AddData($tabel, $data = array())
    // {
    //     $this->db->insert($tabel, $data);
    // }
    // function update_data_jenis($where, $data, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->update($table, $data);
    // }
    // function DeleteData($tabel, $fieldid, $fieldvalue)
    // {
    //     $this->db->where($fieldid, $fieldvalue)->delete($tabel);
    // }




    function GetDataRelation2bjrange($range1, $range2)
    {
        $this->db->select('tbl_barang.kd_barang,tbl_jnsbarang.nama as jenis,tbl_barang.nama,tbl_barang.harga,tbl_barang.jumlah,tbl_barang.tgl_masuk');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_jnsbarang', 'tbl_barang.kd_jns = tbl_jnsbarang.kd_jns');
        $this->db->where('tbl_barang.tgl_masuk >=', $range1);
        $this->db->where('tbl_barang.tgl_masuk <=', $range2);
        $query = $this->db->get();
        return $query->result();
    }



    function GetDataRelation2pbrange($range1, $range2)
    {
        $this->db->select('tbl_pembelian.kd_pembelian,tbl_pembelian.struk,tbl_barang.nama,tbl_pembelian.jml_beli,tbl_pembelian.tgl_beli');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_pembelian', 'tbl_barang.kd_barang = tbl_pembelian.kd_barang');
        $this->db->where('tbl_pembelian.tgl_beli >=', $range1);
        $this->db->where('tbl_pembelian.tgl_beli <=', $range2);
        $query = $this->db->get();
        return $query->result();
    }

    function GetDataRelation2pb()
    {

        $this->db->select('tbl_pembelian.kd_pembelian,tbl_pembelian.struk,tbl_barang.nama,tbl_pembelian.jml_beli,tbl_pembelian.tgl_beli');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_pembelian', 'tbl_barang.kd_barang = tbl_pembelian.kd_barang');
        $query = $this->db->get();
        return $query->result();
    }

    function GetDataWhere($tabel, $id, $nilai)
    {
        $this->db->where($id, $nilai);
        $query = $this->db->get($tabel);
        return $query;
    }

    //Data jenis barang
    //Untuk Menampilkan Data yang Tidak di hapus(0) Aliyas 
    //Menampilkan yang sudah di softdelete
    public function tampil_data_jenis()
    {
        $range1 = '0';
        $this->db->select('kd_jns , nama');
        $this->db->from('tbl_jnsbarang');
        $this->db->where('deleted_at =', $range1);
        $query = $this->db->get();
        return $query->result();
    }
    function edit_data_jenis($table, $where)
    {
        return $this->db->get_where($table, $where)->result_array();
    }
    // public function hps_jenisbarang($where, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }



    //Data barang
    //Menampilkan Data barang yang deleted nya 0 aliyas yang tidak di hapus
    function GetDataRelation2bj()
    {
        $range1 = '0';
        $this->db->select('tbl_barang.kd_barang,tbl_jnsbarang.nama as jenis,tbl_barang.nama,tbl_barang.harga,tbl_barang.jumlah,tbl_barang.tgl_masuk');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_jnsbarang', 'tbl_barang.kd_jns = tbl_jnsbarang.kd_jns');
        $this->db->where('tbl_barang.deleted_at =', $range1);
        $query = $this->db->get();
        return $query->result();
    }
    // function GetDataJenis($tabel)
    // {
    //     //untuk menampilkan nama jenis barang di form input barang
    //     $query = $this->db->get($tabel);
    //     return $query->result();
    // }
    function edit_data_barang($table, $where)
    {
        return $this->db->get_where($table, $where)->result_array();
    }
    function update_data_barang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // public function hapus_databarang($where, $table)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }


    //Data pembelian
    // function Getdatabarang($tabel)
    // {
    //     //untuk menampilkan nama jenis barang di form input barang
    //     $query = $this->db->get($tabel);
    //     return $query->result();
    // }
    function Editpembelian($table, $where)
    {
        return $this->db->get_where($table, $where)->result_array();
    }
    function update_data_pembelian($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_datapembelian($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

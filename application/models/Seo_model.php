<?php
class Seo_model extends CI_Model
{
    public function get_active_cities()
    {
        return $this->db
            ->where('status', 1)
            ->order_by('city_name', 'ASC')
            ->get('cities')
            ->result();
    }
    public function get_pages_by_city($city)
    {
        return $this->db
            ->where('city_name', $city)
            ->where('status', 1)
            ->get('seo_pages')
            ->result();
    }

    public function get_page_by_slug($slug)
    {
        return $this->db
            ->where('url_slug', $slug)
            ->where('status', 1)
            ->get('seo_pages')
            ->row();
    }
    public function get_active_cities_with_pages()
    {
        return $this->db
            ->select('DISTINCT(c.city_name)', false)
            ->from('cities c')
            ->join('seo_pages s', 's.city_name = c.city_name')
            ->where('c.status', 1)
            ->where('s.status', 'true')
            ->order_by('c.city_name', 'ASC')
            ->get()
            ->result();
    }

    public function insert_page($data)
    {
        return $this->db->insert('seo_pages', $data);
    }

    public function get_all_pages()
    {
        return $this->db->get('seo_pages')->result();
    }
    public function getStates()
    {
        return $this->db
            ->select('state_name')
            ->group_by('state_name')
            ->order_by('id', 'ASC')
            ->get('seo_pages')
            ->result();
    }

    // State ke hisaab se cities
    public function getCitiesByState($state_name)
    {
        return $this->db
            ->select('city_name')
            ->from('seo_pages')
            ->where('state_name', $state_name)
            ->group_by('city_name')
            ->order_by('city_name', 'ASC')
            ->get()
            ->result();
    }
    public function getServices()
    {
        return $this->db
            ->distinct()
            ->select('course_name as service_name')
            ->where('course_name !=', '')
            ->order_by('course_name', 'ASC')
            ->get('seo_pages')
            ->result();
    }
}
?>
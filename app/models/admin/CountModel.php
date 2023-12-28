<?php
class CountModel extends Model {
    public function tableFill()
    {
        return '';
    }

    public function fieldFill()
    {
        return '';
    }

    public function primaryKey()
    {
        return '';
    }

    public function handleGetListExpert() {
        $queryGet = $this->db->table('expert_team')
            ->select('id')
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleCountListExpert() {
        return count($this->handleGetListExpert());
    }

    //
    public function handleGetListUser() {
        $queryGet = $this->db->table('users')
            ->select('id')
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleCountListUser() {
        return count($this->handleGetListUser());
    }

    //
    public function handleGetListProduct() {
        $queryGet = $this->db->table('product')
            ->select('productid')
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleCountListProduct() {
        return count($this->handleGetListProduct());
    }

    //

    public function handleGetListService() {
        $queryGet = $this->db->table('services')
            ->select('id')
            ->get();

        $response = [];

        if (!empty($queryGet)):
            $response = $queryGet;
        endif;

        return $response;
    }

    public function handleCountListService() {
        return count($this->handleGetListService());
    }
    
}
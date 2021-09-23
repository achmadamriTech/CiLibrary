<?php

    class Role_Model extends CI_Model{
         // Url Buku
         private $svcUrl = "http://localhost:8888/users/";

        public function getAllRole(){
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $this->svcUrl . 'role/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($svcGet));
            curl_close($svcGet);
            // var_dump($response);
            if (!is_null($response)) {
                return $response;
            } else {
                show_404();
            }
        }

        public function getById($roleId){
            $svcGet = curl_init();

            curl_setopt_array($svcGet, array(
                CURLOPT_URL => $this->svcUrl . 'role/' .  $roleId,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($svcGet));
            curl_close($svcGet);

            if (!is_null($response)) {
                return $response;
            } else {
                show_404();
            }
        }

        public function createRole() {
            //Mengakses Web Service menggunakan HTTP Request
            // $api_url = "http://localhost:8081/buku/$idBuku";

            $data = array(
                'role' => $this->input->post('role', true),
                'keterangan' => $this->input->post('keterangan', true)
            );

            $svcPost = curl_init();

            curl_setopt_array($svcPost, array(
                CURLOPT_URL => $this->svcUrl . 'role/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcPost));

            curl_close($svcPost);

            // var_dump($response);
            if (!is_null($response))            
                return $response;
            else
                show_404();

    }

        public function editRole($roleId) {
            //Mengakses Web Service menggunakan HTTP Request
            // $api_url = "http://localhost:8081/buku/$idBuku";

            $data = array(
                'id' => $this->input->post('id', true),
                'role' => $this->input->post('role', true),
                'keterangan' => $this->input->post('keterangan', true)
            );

            $svcPut = curl_init();

            curl_setopt_array($svcPut, array(
                CURLOPT_URL => $this->svcUrl . 'role/' . $roleId,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json')
            ));

            $response = json_decode(curl_exec($svcPut));

            curl_close($svcPut);

            // var_dump($response);
            if (!is_null($response))            
                return $response;
            else
                show_404();

    }

    public function hapusRole($roleId) {
        //Mengakses Web Service menggunakan HTTP Request
        // $api_url = "http://localhost:8081/buku/$idBuku";

        $svcDelete = curl_init();

        curl_setopt_array($svcDelete, array(
            CURLOPT_URL => $this->svcUrl . 'role/' . $roleId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
        ));

        $response = json_decode(curl_exec($svcDelete));

        curl_close($svcDelete);

        // var_dump($response);
        if (!is_null($response))            
            return $response;
        else
            show_404();

        }
}

?>
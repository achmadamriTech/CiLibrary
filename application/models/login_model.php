<?php

    class Login_Model extends CI_Model{
        //  // Url Buku
         private $svcUrl = "http://localhost:8888/users/";

        public function request_login(){
            $emailUsers = $this->input->post('emailUsers', true);
            $passwordUsers = md5( $this->input->post('passwordUsers', true));

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->svcUrl . 'getByEmail/' . $emailUsers,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET'
            ));

            $response = json_decode(curl_exec($curl));
            curl_close($curl);

            // Cek Web Service Return Value
            if (!isset($response)) {
                $this->session->set_flashdata('error', "Service Cannot Be Reached!");
                throw new Exception();
            }

            // Check User Ada
            if (isset($response->status)) {
                $this->session->set_flashdata(
                    'error',
                    "<strong>Response Status: </strong> $response->status <br/>
                    <strong>Message: </strong> $response->message"
                );
                throw new Exception($response->message);
            }

            // cek password correct
            if (strtoupper($passwordUsers) == strtoupper($response->password)) {
                $this->session->set_userdata('id', $response->id);
                $this->session->set_userdata('name', $response->name);
                $this->session->set_userdata('zipcode', $response->zipcode);
                $this->session->set_userdata('email', $response->email);
                $this->session->set_userdata('username', $response->username);
                $this->session->set_userdata('password', $response->password);
                $this->session->set_userdata('roleid', $response->roleid);
                $this->session->set_userdata('role', $response->role);
                $this->session->set_userdata('aktif', $response->aktif);

                if (!$response->aktif) {
                    $this->session->set_flashdata('error',"<strong>User is Not Active</strong>");
                    throw new Exception("User is Not Active");
                }
                    return true;
            }
            else {
                    $this->session-> set_flashdata('error',"<strong>Wrong Password!</strong>");
                    throw new Exception("Wrong Password");               
            }
        }
}

?>
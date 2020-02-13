<?php class Operations_model extends MY_model{

// ================ INBOX NOTIF NAVBAR =====================
    function new_message($limit){
      return $this->db->query("SELECT * FROM it_inbox ORDER BY id_inbox DESC LIMIT $limit");
    }
// ================ PROBLEM NOTIF NAVBAR =====================
    function new_problem($limit){
      return $this->db->query("SELECT * FROM it_problems a JOIN it_users b ON a.id_users=b.id_users ORDER BY id_problem DESC LIMIT $limit");
    }    

// ================ USERS ==============================
    function load_users(){
      return $this->db->query("SELECT * FROM it_users a
                                JOIN it_rooms b ON a.id_room=b.id_room
                                JOIN it_locations c ON a.id_locations=c.id_locations
                                JOIN it_fieldwork d ON a.id_fieldwork=d.id_fieldwork
                                ORDER BY id_users DESC");
    }
    function insert_users(){
        $config['upload_path']    = 'arians/photos/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size']       = '2028'; // kb
        $config['encrypt_name']   = true;
        $this->load->library('upload', $config);
        $this->upload->do_upload('f');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array('first_name'      =>$this->db->escape_str($this->input->post('a')),
                                    'last_name'       =>$this->db->escape_str($this->input->post('b')),
                                    'email'           =>$this->db->escape_str($this->input->post('c')),
                                    'phone'           =>$this->db->escape_str($this->input->post('d')),
                                    'gender'          =>$this->db->escape_str($this->input->post('e')),
                                  // 'avatar'         =>$hasil['file_name'] is none if null file_name
                                    'position'        =>$this->db->escape_str($this->input->post('g')),
                                    'id_fieldwork'    =>$this->db->escape_str($this->input->post('h')),
                                    'id_locations'     =>$this->db->escape_str($this->input->post('i')),
                                    'id_room'         =>$this->db->escape_str($this->input->post('j')),
                                    'is_active'       =>$this->db->escape_str($this->input->post('k')),
                                    'info'            =>$this->db->escape_str($this->input->post('l')),
                                    'unique_user'     =>$this->db->escape_str($this->input->post('m'))
                                    );
            }else{
                    $datadb = array('first_name'      =>$this->db->escape_str($this->input->post('a')),
                                    'last_name'       =>$this->db->escape_str($this->input->post('b')),
                                    'email'           =>$this->db->escape_str($this->input->post('c')),
                                    'phone'           =>$this->db->escape_str($this->input->post('d')),
                                    'gender'          =>$this->db->escape_str($this->input->post('e')),
                                    'avatar'          =>$hasil['file_name'],
                                    'position'        =>$this->db->escape_str($this->input->post('g')),
                                    'id_fieldwork'    =>$this->db->escape_str($this->input->post('h')),
                                    'id_locations'    =>$this->db->escape_str($this->input->post('i')),
                                    'id_room'         =>$this->db->escape_str($this->input->post('j')),
                                    'is_active'       =>$this->db->escape_str($this->input->post('k')),
                                    'info'            =>$this->db->escape_str($this->input->post('l')),
                                    'unique_user'     =>$this->db->escape_str($this->input->post('m'))
                                  );
            }
        $this->db->insert('it_users', $datadb);
    }
    function change_users($id){
        return $this->db->query("SELECT * FROM it_users where id_users='$id'");
    }

    function update_users(){
        $config['upload_path']    = 'arians/photos/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size']       = '2028'; // kb
        $config['encrypt_name']   = true;
        $this->load->library('upload', $config);
        $this->upload->do_upload('f');
        $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $datadb = array('first_name'      =>$this->db->escape_str($this->input->post('a')),
                                    'last_name'       =>$this->db->escape_str($this->input->post('b')),
                                    'email'           =>$this->db->escape_str($this->input->post('c')),
                                    'phone'           =>$this->db->escape_str($this->input->post('d')),
                                    'gender'          =>$this->db->escape_str($this->input->post('e')),
                                  // 'avatar'         =>$hasil['file_name'] is none if null file_name
                                    'position'        =>$this->db->escape_str($this->input->post('g')),
                                    'id_fieldwork'    =>$this->db->escape_str($this->input->post('h')),
                                    'id_locations'     =>$this->db->escape_str($this->input->post('i')),
                                    'id_room'         =>$this->db->escape_str($this->input->post('j')),
                                    'is_active'       =>$this->db->escape_str($this->input->post('k')),
                                    'info'            =>$this->db->escape_str($this->input->post('l')),
                                    'unique_user'     =>$this->db->escape_str($this->input->post('m')),
                                    'username'        =>$this->db->escape_str($this->input->post('n')),
                                    'password'        =>password_hash($this->input->post('o'), PASSWORD_DEFAULT),
                                    'role_id'         =>2,
                                    'last_update'     =>date('Y-m-d H:i:s')
                                    );
            }else{
                    $datadb = array('first_name'      =>$this->db->escape_str($this->input->post('a')),
                                    'last_name'       =>$this->db->escape_str($this->input->post('b')),
                                    'email'           =>$this->db->escape_str($this->input->post('c')),
                                    'phone'           =>$this->db->escape_str($this->input->post('d')),
                                    'gender'          =>$this->db->escape_str($this->input->post('e')),
                                    'avatar'          =>$hasil['file_name'],
                                    'position'        =>$this->db->escape_str($this->input->post('g')),
                                    'id_fieldwork'    =>$this->db->escape_str($this->input->post('h')),
                                    'id_locations'    =>$this->db->escape_str($this->input->post('i')),
                                    'id_room'         =>$this->db->escape_str($this->input->post('j')),
                                    'is_active'       =>$this->db->escape_str($this->input->post('k')),
                                    'info'            =>$this->db->escape_str($this->input->post('l')),
                                    'unique_user'     =>$this->db->escape_str($this->input->post('m')),
                                    'username'        =>$this->db->escape_str($this->input->post('n')),
                                    'password'        =>password_hash($this->input->post('o'), PASSWORD_DEFAULT),
                                    'role_id'         =>2,
                                    'last_update'     =>date('Y-m-d H:i:s')
                                  );
            }
        $this->db->where('id_users',$this->input->post('id'));
        $this->db->update('it_users', $datadb);
    }

    function delete_users($id){
        $this->db->where('id_users',$id);
        $query = $this->db->get('it_users');
        $ar = $query->row();
        $this->db->delete('it_users', array('id_users' => $id));
        unlink("./arians/photos/$ar->avatar");
    }

// ========================= FIELDWORK =========================================

    function load_fieldwork(){
        return $this->db->query("SELECT * FROM it_fieldwork ORDER BY id_fieldwork DESC");
    }
    function insert_fieldwork() {
      $datadb = array('fieldwork_name'    => $this->db->escape_str($this->input->post('a')),
                      'last_update'       => date('Y-m-d h:i:s')
                      );

      $this->db->insert('it_fieldwork',$datadb);
    }
    function change_fieldwork($id){
        return $this->db->query("SELECT * FROM it_fieldwork where id_fieldwork='$id'");
    }

    function update_fieldwork() {
        $datadb = array('fieldwork_name'  => $this->db->escape_str($this->input->post('a')),
                        'last_update'     => date('Y-m-d h:i:s')
                        );

        $this->db->where('id_fieldwork',$this->input->post('id'));
        $this->db->update('it_fieldwork',$datadb);
    }
    function delete_fieldwork($id){
        $this->db->where('id_fieldwork',$id);
        $this->db->delete('it_fieldwork', array('id_fieldwork' => $id));
    }

// ========================= ROOMS =========================================

    function load_rooms(){
      return $this->db->query("SELECT * FROM it_rooms ORDER BY id_room DESC");
    }
    function insert_rooms() {
      $datadb = array('room_name'    => $this->db->escape_str($this->input->post('a')),
                      'last_update'  => date('Y-m-d h:i:s')
                      );

      $this->db->insert('it_rooms',$datadb);
    }
    function change_rooms($id){
        return $this->db->query("SELECT * FROM it_rooms where id_room='$id'");
    }
    function update_rooms() {
        $datadb = array('room_name'   => $this->db->escape_str($this->input->post('a')),
                        'last_update' => date('Y-m-d h:i:s')
                        );

        $this->db->where('id_room',$this->input->post('id'));
        $this->db->update('it_rooms',$datadb);
    }
    function delete_rooms($id){
        $this->db->where('id_room',$id);
        $this->db->delete('it_rooms', array('id_room' => $id));
    }

// ========================= LOCATIONS =========================================
    function load_locations(){
      return $this->db->query("SELECT * FROM it_locations ORDER BY id_locations DESC");
    }
    function insert_locations() {
      $datadb = array('locations_name'  => $this->db->escape_str($this->input->post('a')),
                      'last_update'     => date('Y-m-d h:i:s')
                      );

      $this->db->insert('it_locations',$datadb);
    }
    function change_locations($id){
        return $this->db->query("SELECT * FROM it_locations where id_locations='$id'");
    }
    function update_locations() {
        $datadb = array('locations_name' => $this->db->escape_str($this->input->post('a')),
                        'last_update'    => date('Y-m-d h:i:s')
                        );

        $this->db->where('id_locations',$this->input->post('id'));
        $this->db->update('it_locations',$datadb);
    }
    function delete_locations($id){
        $this->db->where('id_locations',$id);
        $this->db->delete('it_locations', array('id_locations' => $id));
    }

// ========================= YEARS =========================================
    function load_years(){
      return $this->db->query("SELECT * FROM it_years ORDER BY id_years DESC");
    }
    function insert_years() {
      $datadb = array('years_name'  => $this->db->escape_str($this->input->post('a')),
                      'last_update' => date('Y-m-d h:i:s')
                      );

      $this->db->insert('it_years',$datadb);
    }
    function change_years($id){
        return $this->db->query("SELECT * FROM it_years where id_years='$id'");
    }
    function update_years() {
        $datadb = array('years_name'  => $this->db->escape_str($this->input->post('a')),
                        'last_update' => date('Y-m-d h:i:s')
                        );

        $this->db->where('id_years',$this->input->post('id'));
        $this->db->update('it_years',$datadb);
    }
    function delete_years($id){
        $this->db->where('id_years',$id);
        $this->db->delete('it_years', array('id_years' => $id));
    }

// ============================= COMPUTERS =====================================
    function load_computers(){
      return $this->db->query("SELECT * FROM it_computers a JOIN it_users b ON a.id_users=b.id_users ORDER BY id_computers DESC");
    }
    function insert_computers() {
      $datadb = array('id_users'        => $this->db->escape_str($this->input->post('a')),
                      'pcname'          => $this->db->escape_str($this->input->post('pcname')),
                      'casing'          => $this->db->escape_str($this->input->post('b')),
                      'monitor'         => $this->db->escape_str($this->input->post('c')),
                      'keyboard'        => $this->db->escape_str($this->input->post('d')),
                      'mouse'           => $this->db->escape_str($this->input->post('e')),
                      'mainboard'       => $this->db->escape_str($this->input->post('f')),
                      'processor'       => $this->db->escape_str($this->input->post('g')),
                      'harddrive'       => $this->db->escape_str($this->input->post('h')),
                      'ram'             => $this->db->escape_str($this->input->post('i')),
                      'vga'             => $this->db->escape_str($this->input->post('j')),
                      'cdroom'          => $this->db->escape_str($this->input->post('k')),
                      'lancard'         => $this->db->escape_str($this->input->post('l')),
                      'fan'             => $this->db->escape_str($this->input->post('m')),
                      'powersupply'     => $this->db->escape_str($this->input->post('n')),
                      // 'printer'         => $this->db->escape_str($this->input->post('o')),
                      // 'scanner'         => $this->db->escape_str($this->input->post('p')),
                      // 'ups'             => $this->db->escape_str($this->input->post('ups')),
                      'ipaddress'       => $this->db->escape_str($this->input->post('q')),
                      'netmask'         => $this->db->escape_str($this->input->post('r')),
                      'gateway'         => $this->db->escape_str($this->input->post('s')),
                      'dnsserver'       => $this->db->escape_str($this->input->post('t')),
                      'macaddress'      => $this->db->escape_str($this->input->post('u')),
                      'platform'        => $this->db->escape_str($this->input->post('v')),
                      'osname'          => $this->db->escape_str($this->input->post('w')),
                      'software'        => $this->db->escape_str($this->input->post('x')),
                      'acquisition'     => $this->db->escape_str($this->input->post('y')),
                      'codefication'    => $this->db->escape_str($this->input->post('z')),
                      'computer_type'   => $this->db->escape_str($this->input->post('ct')),
                      'pc_active'       => $this->db->escape_str($this->input->post('act')),
                      'description'     => $this->db->escape_str($this->input->post('desc')),
                      'last_update'     => date('Y-m-d h:i:s')
                      );
      $this->db->insert('it_computers',$datadb);
    }
    function change_computers($id){
        return $this->db->query("SELECT * FROM it_computers a JOIN it_users b ON a.id_users=b.id_users WHERE id_computers='$id'");
    }
    function update_computers() {
      $datadb = array('id_users'        => $this->db->escape_str($this->input->post('a')),
                      'pcname'          => $this->db->escape_str($this->input->post('pcname')),
                      'casing'          => $this->db->escape_str($this->input->post('b')),
                      'monitor'         => $this->db->escape_str($this->input->post('c')),
                      'keyboard'        => $this->db->escape_str($this->input->post('d')),
                      'mouse'           => $this->db->escape_str($this->input->post('e')),
                      'mainboard'       => $this->db->escape_str($this->input->post('f')),
                      'processor'       => $this->db->escape_str($this->input->post('g')),
                      'harddrive'       => $this->db->escape_str($this->input->post('h')),
                      'ram'             => $this->db->escape_str($this->input->post('i')),
                      'vga'             => $this->db->escape_str($this->input->post('j')),
                      'cdroom'          => $this->db->escape_str($this->input->post('k')),
                      'lancard'         => $this->db->escape_str($this->input->post('l')),
                      'fan'             => $this->db->escape_str($this->input->post('m')),
                      'powersupply'     => $this->db->escape_str($this->input->post('n')),
                      // 'printer'         => $this->db->escape_str($this->input->post('o')),
                      // 'scanner'         => $this->db->escape_str($this->input->post('p')),
                      // 'ups'             => $this->db->escape_str($this->input->post('ups')),
                      'ipaddress'       => $this->db->escape_str($this->input->post('q')),
                      'netmask'         => $this->db->escape_str($this->input->post('r')),
                      'gateway'         => $this->db->escape_str($this->input->post('s')),
                      'dnsserver'       => $this->db->escape_str($this->input->post('t')),
                      'macaddress'      => $this->db->escape_str($this->input->post('u')),
                      'platform'        => $this->db->escape_str($this->input->post('v')),
                      'osname'          => $this->db->escape_str($this->input->post('w')),
                      'software'        => $this->db->escape_str($this->input->post('x')),
                      'acquisition'     => $this->db->escape_str($this->input->post('y')),
                      'codefication'    => $this->db->escape_str($this->input->post('z')),
                      'computer_type'   => $this->db->escape_str($this->input->post('ct')),
                      'pc_active'       => $this->db->escape_str($this->input->post('act')),
                      'description'     => $this->db->escape_str($this->input->post('desc')),
                      'last_update'     => date('Y-m-d h:i:s')
                      );
        $this->db->where('id_computers',$this->input->post('id'));
        $this->db->update('it_computers',$datadb);
    }
    function delete_computers($id){
      $this->db->where('id_computers',$id);
      $this->db->delete('it_computers', array('id_computers' => $id));
    }

// ================================ LAPTOP =====================================
    function load_laptops(){
      return $this->db->query("SELECT * FROM it_laptops a LEFT JOIN it_fieldwork b ON a.id_fieldwork=b.id_fieldwork ORDER BY id_laptop DESC");
    }
    function insert_laptops() {
      $datadb = array('id_fieldwork'    => $this->db->escape_str($this->input->post('a')),
                      'brand'           => $this->db->escape_str($this->input->post('b')),
                      'type'            => $this->db->escape_str($this->input->post('c')),
                      'color'           => $this->db->escape_str($this->input->post('d')),
                      'serialnumber'    => $this->db->escape_str($this->input->post('e')),
                      'platform'        => $this->db->escape_str($this->input->post('f')),
                      'osname'          => $this->db->escape_str($this->input->post('g')),
                      'cpu'             => $this->db->escape_str($this->input->post('h')),
                      'memory'          => $this->db->escape_str($this->input->post('i')),
                      'hdd'             => $this->db->escape_str($this->input->post('j')),
                      'vga'             => $this->db->escape_str($this->input->post('k')),
                      'acquisition'     => $this->db->escape_str($this->input->post('l')),
                      'completeness'    => $this->db->escape_str($this->input->post('m')),
                      'codefication'    => $this->db->escape_str($this->input->post('n')),
                      'laptop_active'   => $this->db->escape_str($this->input->post('o'))
                      );

      $this->db->insert('it_laptops',$datadb);
    }
    function change_laptops($id){
        return $this->db->query("SELECT * FROM it_laptops a LEFT JOIN it_fieldwork b ON a.id_fieldwork=b.id_fieldwork WHERE id_laptop='$id'");
    }
    function update_laptops() {
      $datadb = array('id_fieldwork'    => $this->db->escape_str($this->input->post('a')),
                      'brand'           => $this->db->escape_str($this->input->post('b')),
                      'type'            => $this->db->escape_str($this->input->post('c')),
                      'color'           => $this->db->escape_str($this->input->post('d')),
                      'serialnumber'    => $this->db->escape_str($this->input->post('e')),
                      'platform'        => $this->db->escape_str($this->input->post('f')),
                      'osname'          => $this->db->escape_str($this->input->post('g')),
                      'cpu'             => $this->db->escape_str($this->input->post('h')),
                      'memory'          => $this->db->escape_str($this->input->post('i')),
                      'hdd'             => $this->db->escape_str($this->input->post('j')),
                      'vga'             => $this->db->escape_str($this->input->post('k')),
                      'acquisition'     => $this->db->escape_str($this->input->post('l')),
                      'completeness'    => $this->db->escape_str($this->input->post('m')),
                      'codefication'    => $this->db->escape_str($this->input->post('n')),
                      'laptop_active'   => $this->db->escape_str($this->input->post('o'))
                      );
      $this->db->where('id_laptop',$this->input->post('id'));
      $this->db->update('it_laptops',$datadb);
    }
    function delete_laptops($id){
      $this->db->where('id_laptop',$id);
      $this->db->delete('it_laptops', array('id_laptop' => $id));
    }

// ================================ DEVICES ====================================
    function load_devices(){
      return $this->db->query("SELECT * FROM it_devices a
        LEFT JOIN it_users b ON a.id_users=b.id_users
        LEFT JOIN it_asset_category c ON a.id_asset_category=c.id_asset_category
        LEFT JOIN it_rooms d ON a.id_room=d.id_room
        ORDER BY id_device DESC");
    }
    function insert_devices() {
      $datadb = array('id_asset_category' => $this->db->escape_str($this->input->post('a')),
                      'd_name'            => $this->db->escape_str($this->input->post('b')),
                      'd_brand'           => $this->db->escape_str($this->input->post('c')),
                      'd_type'            => $this->db->escape_str($this->input->post('d')),
                      'd_codefication'    => $this->db->escape_str($this->input->post('e')),
                      'd_serialnumber'    => $this->db->escape_str($this->input->post('f')),
                      'd_acquisition'     => $this->db->escape_str($this->input->post('g')),
                      'id_room'           => $this->db->escape_str($this->input->post('h')),
                      'd_active'          => $this->db->escape_str($this->input->post('i')),
                      'id_users'          => $this->db->escape_str($this->input->post('j'))
                      );
      $this->db->insert('it_devices',$datadb);
    }
    function change_devices($id){
        return $this->db->query("SELECT * FROM it_devices a LEFT JOIN it_asset_category b ON a.id_asset_category=b.id_asset_category WHERE id_device='$id'");
    }
    function update_devices() {
      $datadb = array('id_asset_category' => $this->db->escape_str($this->input->post('a')),
                      'd_name'            => $this->db->escape_str($this->input->post('b')),
                      'd_brand'           => $this->db->escape_str($this->input->post('c')),
                      'd_type'            => $this->db->escape_str($this->input->post('d')),
                      'd_codefication'    => $this->db->escape_str($this->input->post('e')),
                      'd_serialnumber'    => $this->db->escape_str($this->input->post('f')),
                      'd_acquisition'     => $this->db->escape_str($this->input->post('g')),
                      'id_room'           => $this->db->escape_str($this->input->post('h')),
                      'd_active'          => $this->db->escape_str($this->input->post('i')),
                      'id_users'          => $this->db->escape_str($this->input->post('j'))
                      );
      $this->db->where('id_device',$this->input->post('id'));
      $this->db->update('it_devices',$datadb);
    }
    function delete_devices($id){
      $this->db->where('id_device',$id);
      $this->db->delete('it_devices', array('id_device' => $id));
    }

// ================================ USERS PROBLEM ====================================
    function load_problem(){
      return $this->db->query("SELECT * FROM it_problems a JOIN it_users b ON a.id_users=b.id_users ORDER BY id_problem desc");
    }
    function insert_problem(){
      $datadb = array('date'          => $this->db->escape_str($this->input->post('a')),
                      'id_users'      => $this->db->escape_str($this->input->post('b')),
                      'other_user'    => $this->db->escape_str($this->input->post('c')),
                      'title_problem' => $this->db->escape_str($this->input->post('d')),
                      'followup'      => $this->db->escape_str($this->input->post('e')),
                      'result'        => $this->db->escape_str($this->input->post('f')),
                      'result_date'   => $this->db->escape_str($this->input->post('g')),
                      'information'   => $this->db->escape_str($this->input->post('h')),
                      'author'        => $this->db->escape_str($this->input->post('author')),
                      'period'        => $this->db->escape_str($this->input->post('period')),
                      'time_update'   => date('Y-m-d H:i:s')

                      );
      $this->db->insert('it_problems',$datadb);
    }
    function change_problem($id){
      return $this->db->query("SELECT * FROM it_problems a JOIN it_users b ON a.id_users=b.id_users WHERE id_problem='$id'");
      // return $this->db->query("SELECT * FROM it_problems a LEFT JOIN it_asset_category b ON a.id_asset_category=b.id_asset_category WHERE id_device='$id'");
    }
    function update_problem(){
      $datadb = array('date'          => $this->db->escape_str($this->input->post('a')),
                      'id_users'      => $this->db->escape_str($this->input->post('b')),
                      'other_user'    => $this->db->escape_str($this->input->post('c')),
                      'title_problem' => $this->db->escape_str($this->input->post('d')),
                      'followup'      => $this->db->escape_str($this->input->post('e')),
                      'result'        => $this->db->escape_str($this->input->post('f')),
                      'result_date'   => $this->db->escape_str($this->input->post('g')),
                      'information'   => $this->db->escape_str($this->input->post('h')),
                      'author'        => $this->db->escape_str($this->input->post('author')),
                      'period'        => $this->db->escape_str($this->input->post('period')),
                      'time_update'   => date('Y-m-d H:i:s')
                      );
      $this->db->where('id_problem',$this->input->post('id'));
      $this->db->update('it_problems',$datadb);
    }
    function delete_problem($id){
      $this->db->where('id_problem',$id);
      $this->db->delete('it_problems', array('id_problem' => $id));
    }


// ================= SCHEDULE MAINTENANCE ===============

  function load_schedule(){
    return $this->db->query("SELECT * FROM it_schedule a JOIN it_rooms b ON a.id_room=b.id_room ORDER BY id_schedule DESC");
  }

  function insert_schedule(){

    $datadb1 = array();
      foreach ($_POST['b'] as $month) {
      array_push($datadb1, $month);
    }
    $month = serialize($datadb1);
    $datadb = [
                'id_room'      => $this->db->escape_str($this->input->post('a')),
                'month_name'   => $month,
                'last_update'  => date('Y-m-d H:i:s')
              ];
    $this->db->insert('it_schedule',$datadb);
  }

  function change_schedule($id){
    return $this->db->query("SELECT * FROM it_schedule a JOIN it_rooms b ON a.id_room=b.id_room WHERE id_schedule='$id'");
  }

  function update_schedule(){
    $datadb1 = array();
      foreach ($_POST['b'] as $month) {
      array_push($datadb1, $month);
    }
    $month = serialize($datadb1);
    $datadb = [
                'id_room'     => $this->db->escape_str($this->input->post('a')),
                'month_name'  => $month,
                'last_update' => date('Y-m-d h:i:s')
              ];
    $this->db->where('id_schedule',$this->input->post('id'));
    $this->db->update('it_schedule',$datadb);
  }

  function delete_schedule($id){
    $this->db->where('id_schedule',$id);
    $this->db->delete('it_schedule', array('id_schedule' => $id));
  }


// ================= LIST MAINTENANCE ===============

  function load_listmaintenance(){
    return $this->db->query("SELECT * FROM it_listmaintenance a JOIN it_users b ON a.id_users=b.id_users JOIN it_month c ON a.id_month=c.id_month JOIN it_years d ON a.id_years=d.id_years ORDER BY id_listmaintenance DESC");
  }
  function insert_listmaintenance(){
    $datadb = array('id_users'       => $this->db->escape_str($this->input->post('a')),
                    'l_pcname'       => $this->db->escape_str($this->input->post('b')),
                    'id_month'       => $this->db->escape_str($this->input->post('c')),
                    'id_years'       => $this->db->escape_str($this->input->post('d')),
                    'l_casing'       => $this->db->escape_str($this->input->post('e')),
                    'l_monitor'      => $this->db->escape_str($this->input->post('f')),
                    'l_keyboard'     => $this->db->escape_str($this->input->post('g')),
                    'l_mouse'        => $this->db->escape_str($this->input->post('h')),
                    'l_mainboard'    => $this->db->escape_str($this->input->post('i')),
                    'l_processor'    => $this->db->escape_str($this->input->post('j')),
                    'l_harddrive'    => $this->db->escape_str($this->input->post('k')),
                    'l_ram'          => $this->db->escape_str($this->input->post('l')),
                    'l_vga'          => $this->db->escape_str($this->input->post('m')),
                    'l_cdroom'       => $this->db->escape_str($this->input->post('n')),
                    'l_lancard'      => $this->db->escape_str($this->input->post('o')),
                    'l_pan'          => $this->db->escape_str($this->input->post('p')),
                    'l_powersupply'  => $this->db->escape_str($this->input->post('q')),
                    'l_printer'      => $this->db->escape_str($this->input->post('r')),
                    'l_scanner'      => $this->db->escape_str($this->input->post('s')),
                    'l_software'     => $this->db->escape_str($this->input->post('t')),
                    'l_os'           => $this->db->escape_str($this->input->post('u')),
                    'status'         => $this->db->escape_str($this->input->post('v')),
                    'note'           => $this->db->escape_str($this->input->post('note')),
                    // 'author'      => $this->db->escape_str($this->input->post('author')),
                    'author'         => $this->session->userdata('first_name'),
                    'last_update'    => date('Y-m-d H:i:s')

                    );
    $this->db->insert('it_listmaintenance',$datadb);
  }

  function change_listmaintenance($id){
    return $this->db->query("SELECT * FROM it_listmaintenance a JOIN it_users b ON a.id_users=b.id_users JOIN it_month c ON a.id_month=c.id_month JOIN it_years d ON a.id_years=d.id_years WHERE id_listmaintenance='$id'");
  }
  function update_listmaintenance(){
    $datadb = array('id_users'       => $this->db->escape_str($this->input->post('a')),
                    'l_pcname'       => $this->db->escape_str($this->input->post('b')),
                    'id_month'       => $this->db->escape_str($this->input->post('c')),
                    'id_years'       => $this->db->escape_str($this->input->post('d')),
                    'l_casing'       => $this->db->escape_str($this->input->post('e')),
                    'l_monitor'      => $this->db->escape_str($this->input->post('f')),
                    'l_keyboard'     => $this->db->escape_str($this->input->post('g')),
                    'l_mouse'        => $this->db->escape_str($this->input->post('h')),
                    'l_mainboard'    => $this->db->escape_str($this->input->post('i')),
                    'l_processor'    => $this->db->escape_str($this->input->post('j')),
                    'l_harddrive'    => $this->db->escape_str($this->input->post('k')),
                    'l_ram'          => $this->db->escape_str($this->input->post('l')),
                    'l_vga'          => $this->db->escape_str($this->input->post('m')),
                    'l_cdroom'       => $this->db->escape_str($this->input->post('n')),
                    'l_lancard'      => $this->db->escape_str($this->input->post('o')),
                    'l_pan'          => $this->db->escape_str($this->input->post('p')),
                    'l_powersupply'  => $this->db->escape_str($this->input->post('q')),
                    'l_printer'      => $this->db->escape_str($this->input->post('r')),
                    'l_scanner'      => $this->db->escape_str($this->input->post('s')),
                    'l_software'     => $this->db->escape_str($this->input->post('t')),
                    'l_os'           => $this->db->escape_str($this->input->post('u')),
                    'status'         => $this->db->escape_str($this->input->post('v')),
                    'note'           => $this->db->escape_str($this->input->post('note')),
                    // 'author'      => $this->db->escape_str($this->input->post('author')),
                    'author'         => $this->session->userdata('first_name'),
                    'last_update'    => date('Y-m-d H:i:s')

                    );
      $this->db->where('id_listmaintenance',$this->input->post('id'));
      $this->db->update('it_listmaintenance',$datadb);
  }

  function delete_listmaintenance($id){
    $this->db->where('id_listmaintenance',$id);
    $this->db->delete('it_listmaintenance', array('id_listmaintenance' => $id));
  }

  function getRowsListMaintenance($params = array()){

          $this->db->select('*');
          $this->db->from('it_listmaintenance');

          //fetch data by conditions
          if(array_key_exists("where",$params)){
              foreach ($params['where'] as $key => $value){
                  $this->db->where($key,$value);
              }
          }

          if(array_key_exists("order_by",$params)){
              $this->db->order_by($params['order_by']);
          }

          if(array_key_exists("id_listmaintenance",$params)){
              $this->db->where('id_listmaintenance',$params['id_listmaintenance']);
              $query = $this->db->get();
              $result = $query->row_array();
          }else{
              //set start and limit
              if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                  $this->db->limit($params['limit'],$params['start']);
              }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                  $this->db->limit($params['limit']);
              }

              if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                  $result = $this->db->count_all_results();
              }else{
                  $query = $this->db->get();
                  $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
              }
          }
          //return fetched data
          return $result;
      }

      function delete_selected_listmaintenance($id){
          if(is_array($id)){
              $this->db->where_in('id_listmaintenance', $id);
          }else{
              $this->db->where('id_listmaintenance', $id);
          }
          $delete = $this->db->delete('it_listmaintenance');
          return $delete?true:false;
      }

// ================= CONTROL CARD ===============

  function load_controlcard(){
    return $this->db->query("SELECT * FROM it_users a JOIN it_computers b ON a.id_users=b.id_users JOIN it_rooms c ON c.id_room=a.id_room JOIN it_locations d ON d.id_locations=a.id_locations ORDER BY b.id_computers DESC");
  }
  function show_controlcard($id){
    return $this->db->query("SELECT * FROM it_users a JOIN it_computers b ON a.id_users=b.id_users JOIN it_rooms c ON a.id_room=c.id_room JOIN it_locations d ON a.id_locations=d.id_locations JOIN it_schedule e ON a.id_room=e.id_room WHERE id_computers='$id'");
  }











/*
* Start Create : 25 Nov 2019 AM
* Here we go, this function for menu settings in admin menu
*/


  function load_page(){
    return $this->db->query("SELECT * FROM it_pages ORDER BY id_page DESC");
  }

  function insert_page(){
    $datadb = array('page_title'    => $this->db->escape_str($this->input->post('a')),
                    'page_slug'     => slug($this->input->post('a')),
                    'page_content'  => $this->input->post('b'),
                    // 'id_user'       => $this->db->escape_str($this->input->post('c')),
                    'page_active'   => $this->db->escape_str($this->input->post('c')),
                    'page_hits'     => $this->db->escape_str($this->input->post('d')),
                    'id_tag'        => $this->db->escape_str($this->input->post('e')),
                    'page_created'  => time()
                    );
    $this->db->insert('it_pages',$datadb);
  }
  function change_page($id){
    return $this->db->query("SELECT * FROM it_pages WHERE id_page='$id'");
  }
  function update_page(){
    $datadb = array('page_title'    => $this->db->escape_str($this->input->post('a')),
                    'page_slug'     => slug($this->input->post('a')),
                    'page_content'  => $this->input->post('b'),
                    // 'id_user'       => $this->db->escape_str($this->input->post('c')),
                    'page_active'   => $this->db->escape_str($this->input->post('c')),
                    'page_hits'     => $this->db->escape_str($this->input->post('d')),
                    'id_tag'        => $this->db->escape_str($this->input->post('e')),
                    'page_created'  => time()
                    );
    $this->db->where('id_page',$this->input->post('id'));
    $this->db->update('it_pages',$datadb);
  }

  function delete_page($id){
    $this->db->where('id_page',$id);
    $this->db->delete('it_pages', array('id_page' => $id));
  }

// ========== CUSTOMIZE LANDING PAGE =================

  function customize_landing(){
      return $this->db->query("SELECT * FROM it_landingpage ORDER BY id_landingpage DESC LIMIT 1");
  }


// ========== NAVIGATION MENU =================

  function load_navmenu(){
    return $this->db->query("SELECT * FROM it_navmenu ORDER BY id_menu DESC");
  }
  function insert_navmenu() {
      $datadb = array('menu_name'     => $this->db->escape_str($this->input->post('a')),
                      'id_parent'     => $this->db->escape_str($this->input->post('b')),
                      'menu_icon'     => $this->db->escape_str($this->input->post('c')),
                      'menu_link'     => $this->db->escape_str($this->input->post('d')),
                      'menu_order'    => $this->db->escape_str($this->input->post('e')),
                      'menu_active'   => $this->db->escape_str($this->input->post('f'))
                      );
      $this->db->insert('it_navmenu',$datadb);
    }

  function change_navmenu($id){
    return $this->db->query("SELECT * FROM it_navmenu where id_menu='$id'");
  }
  function update_navmenu() {
    $datadb = array('menu_name'     => $this->db->escape_str($this->input->post('a')),
                    'id_parent'     => $this->db->escape_str($this->input->post('b')),
                    'menu_icon'     => $this->db->escape_str($this->input->post('c')),
                    'menu_link'     => $this->db->escape_str($this->input->post('d')),
                    'menu_order'    => $this->db->escape_str($this->input->post('e')),
                    'menu_active'   => $this->db->escape_str($this->input->post('f'))
                    );
    $this->db->where('id_menu',$this->input->post('id'));
    $this->db->update('it_navmenu',$datadb);
  }

  function delete_navmenu($id){
    $this->db->where('id_menu',$id);
    $this->db->delete('it_navmenu', array('id_menu' => $id));
  }
  //this method for home navigation
  function dropdown_menu($id){
      return $this->db->query("SELECT * FROM it_navmenu WHERE id_parent='$id' AND menu_active='1' ORDER BY menu_order ASC");
  }


// ========== DOWNLOADS =============

  //this method used to load download function in admin panel & download controller
  function load_download(){
    return $this->db->query("SELECT * FROM it_downloads ORDER BY id_download DESC");
  }
  function insert_download(){
      $config['upload_path'] = 'arians/media/downloads/';
      $config['allowed_types'] = 'gif|jpg|jpeg|png|raw|bmp|GIF|JPG|JPEG|PNG|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt|psd|cdr|ai|svg|eps';
      $config['max_size'] = '500000'; // kb = 5gb
      $this->load->library('upload', $config);
      $this->upload->do_upload('b');
      $hasil=$this->upload->data();
        if ($hasil['file_name']==''){
            $datadb = array('down_title'     => $this->db->escape_str($this->input->post('a')),
                            // 'down_type'      => $hasil['file_type'],
                            // 'down_size'      => $hasil['file_size'],
                            'down_desc'      => $this->input->post('d'),
                            'down_date'      => date('Y-m-d'),
                            'down_active'    => $this->db->escape_str($this->input->post('c')),
                            'down_hits'      => 1
                            );
        }else{
            $datadb = array('down_title'     => $this->db->escape_str($this->input->post('a')),
                            'down_filename'  => $hasil['file_name'],
                            'down_type'      => $hasil['file_type'],
                            'down_size'      => $hasil['file_size'],
                            'down_desc'      => $this->input->post('d'),
                            'down_date'      => date('Y-m-d'),
                            'down_active'    => $this->db->escape_str($this->input->post('c')),
                            'down_hits'      => 1
                            );
        }
      $this->db->insert('it_downloads',$datadb);
  }
  function change_downloads($id){
      return $this->db->query("SELECT * FROM it_downloads WHERE id_download='$id'");
  }

  function update_downloads(){
      $config['upload_path'] = 'arians/media/downloads/';
      $config['allowed_types'] = 'gif|jpg|jpeg|png|raw|bmp|GIF|JPG|JPEG|PNG|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt|psd|cdr|ai|svg|eps';
      $config['max_size'] = '500000'; // kb = 5gb
      $this->load->library('upload', $config);
      $this->upload->do_upload('b');

      $hasil=$this->upload->data();
          if ($hasil['file_name']==''){
                  $datadb = array('down_title'     => $this->db->escape_str($this->input->post('a')),
                                  // 'down_type'      => $hasil['file_type'],
                                  // 'down_size'      => $hasil['file_size'],
                                  'down_desc'      => $this->input->post('d'),
                                  'down_date'      => date('Y-m-d'),
                                  'down_active'    => $this->db->escape_str($this->input->post('c'))
                                  );
          }elseif ($hasil['file_name']!=''){
                  $datadb = array('down_title'     => $this->db->escape_str($this->input->post('a')),
                                  'down_filename'  => $hasil['file_name'],
                                  'down_type'      => $hasil['file_type'],
                                  'down_size'      => $hasil['file_size'],
                                  'down_desc'      => $this->input->post('d'),
                                  'down_date'      => date('Y-m-d'),
                                  'down_active'    => $this->db->escape_str($this->input->post('c'))
                                  );
          }
          $this->db->where('id_download',$this->input->post('id'));
          $this->db->update('it_downloads',$datadb);
    }

    function delete_downloads($id){
        $this->db->where('id_download',$id);
        $query = $this->db->get('it_downloads');
        $ar = $query->row();
        $this->db->delete('it_downloads', array('id_download' => $id));
        unlink("./arians/media/downloads/$ar->down_filename");
    }

// ========== INBOX MESSAGE =============

  // function load_inbox(){
  //   return $this->db->query("SELECT * FROM it_inbox ORDER BY id_inbox DESC");
  // }
  function view_inbox($id){
    return $this->db->query("SELECT * FROM it_inbox WHERE id_inbox='$id'");
  }
  function reply_message(){
      $inbox_name            = $this->input->post('a');
      $inbox_email           = $this->input->post('b');
      $inbox_subject         = $this->input->post('c');
      $inbox_message         = $this->input->post('d')." <br><hr><br> ".$this->input->post('e');
      $config = [
               'mailtype'     => 'html',
               'charset'      => 'utf-8',
               'protocol'     => 'smtp',
               'smtp_host'    => 'ssl://smtp.googlemail.com',
               'smtp_user'    => 'ict.ffup@univpancasila.ac.id',
               'smtp_pass'    => 'pancasila',
               'smtp_port'    => 465,
               'smtp_timeout' => '7',
               'newline'      => "\r\n",
               'crlf'         => "\r\n"
              ];
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);

        $this->email->from('ict.ffup@univpancasila.ac.id', 'IT FFUP');
        $this->email->to($inbox_email);
        $this->email->subject($inbox_subject);
        $this->email->message($inbox_message);
        if($this->email->send()){
          $this->session->set_flashdata('info','<i class="fas fa-check-circle"></i> Your Reply has been sent successfully to <strong>'.$_POST['b'].'</strong>"');
        }else {
          $this->session->set_flashdata('danger','<i class="fas fa-exclamation"></i> Uppss..Your Reply is not sent to  <strong>'.$_POST['b'].'</strong> Please try again later.');
       }
    }

    function delete_inbox($id){
      $this->db->where('id_inbox',$id);
      $this->db->delete('it_inbox', array('id_inbox' => $id));
    }


}

<?php class Home_model extends MY_model{
  // PAGE HITS
  function hits_update($id){
      return $this->db->query("UPDATE it_pages SET page_hits=page_hits+1 WHERE page_slug='".$this->db->escape_str($id)."' OR id_page='".$this->db->escape_str($id)."'");
  }
  // DOWNLOAD HITS
  function update_hits_download($file){
    return $this->db->query("UPDATE it_downloads SET down_hits=down_hits+1 WHERE down_filename='".$this->db->escape_str($file)."'");
  }
  // LOAD DOWNLOAD
  function list_download(){
    return $this->db->query("SELECT * FROM it_downloads ORDER BY id_download DESC")->result();
  }
  // GET SOP ON POST PAGE
  function load_sop(){
    return $this->db->query("SELECT * FROM it_pages a JOIN it_categories b ON a.id_categories=b.id_categories JOIN it_users c ON a.id_users=c.id_users WHERE b.id_categories=1 AND page_active=1 ORDER BY id_page DESC")->result();
  }
  // GET JI ON POST PAGE
  function load_jobinstruction(){
    return $this->db->query("SELECT * FROM it_pages a JOIN it_categories b ON a.id_categories=b.id_categories JOIN it_users c ON a.id_users=c.id_users WHERE b.id_categories=2 AND page_active=1 ORDER BY id_page DESC")->result();
  }
  // GET JOBDESC ON POST PAGE
  function load_jobdescription(){
    return $this->db->query("SELECT * FROM it_pages a JOIN it_categories b ON a.id_categories=b.id_categories JOIN it_users c ON a.id_users=c.id_users WHERE b.id_categories=3 AND page_active=1 ORDER BY id_page DESC")->result();
  }
  // GET JOB PROGRAM ON POST PAGE
  function load_jobprogram(){
    return $this->db->query("SELECT * FROM it_pages a JOIN it_categories b ON a.id_categories=b.id_categories JOIN it_users c ON a.id_users=c.id_users WHERE b.id_categories=4 AND page_active=1 ORDER BY id_page DESC")->result();
  }

}

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
}

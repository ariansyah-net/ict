<?php

// Get list of option for dropdown.
function getDropdownList($table, $columns)
{
    $CI =& get_instance();
    $query = $CI->db->select($columns)->from($table)->get(); //->ORDER_BY('DESC')

    if ($query->num_rows() >= 1) {
        $options1 = ['' => '- Options -'];
        $options2 = array_column($query->result_array(), $columns[1], $columns[0]);
        $options  = $options1 + $options2;
        return $options;
    }
    return $options = ['' => '- Options -'];
}

// Get list of option for dropdown 3
function getDrop($table, $columns)
{
    $CI =& get_instance();
    $query = $CI->db->select($columns)->from($table)->get();

    if ($query->num_rows() >= 1) {
        $options1 = ['' => '- Options -'];
        $options2 = array_column($query->result_array(), $columns[1], $columns[0]);
        $options  = $options1 + $options2;
        return $options;
    }
    return $options = ['' => '- Options -'];
}


// Show form error validation message for "file" input.
function fileFormError($field, $prefix = '', $suffix = '')
{
    $CI =& get_instance();
    $error_field = $CI->form_validation->error_array();

    if (!empty($error_field[$field])) {
        return $prefix . $error_field[$field] . $suffix;
    }
    return '';
}



// ================= ADDITIONAL ==========================

    function tgl_indo($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;
    }

    function tanggal($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;
    }

    function getBulan($bln){
        switch ($bln){
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Agu";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
            }
    }

function check_time($datetime, $full = false) {
        $today = time();
                 $createdday= strtotime($datetime);
                 $datediff = abs($today - $createdday);
                 $difftext="";
                 $years = floor($datediff / (365*60*60*24));
                 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
                 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                 $hours= floor($datediff/3600);
                 $minutes= floor($datediff/60);
                 $seconds= floor($datediff);
                 //year checker
                 if($difftext=="")
                 {
                   if($years>1)
                    $difftext=$years." Years";
                   elseif($years==1)
                    $difftext=$years." Years";
                 }
                 //month checker
                 if($difftext=="")
                 {
                    if($months>1)
                    $difftext=$months." Month";
                    elseif($months==1)
                    $difftext=$months." Month";
                 }
                 //month checker
                 if($difftext=="")
                 {
                    if($days>1)
                    $difftext=$days." Days";
                    elseif($days==1)
                    $difftext=$days." Days";
                 }
                 //hour checker
                 if($difftext=="")
                 {
                    if($hours>1)
                    $difftext=$hours." Hours";
                    elseif($hours==1)
                    $difftext=$hours." Hours";
                 }
                 //minutes checker
                 if($difftext=="")
                 {
                    if($minutes>1)
                    $difftext=$minutes." Minutes";
                    elseif($minutes==1)
                    $difftext=$minutes." Minutes";
                 }
                 //seconds checker
                 if($difftext=="")
                 {
                    if($seconds>1)
                    $difftext=$seconds." Seconds";
                    elseif($seconds==1)
                    $difftext=$seconds." Seconds";
                 }
                 return $difftext;
    }

    function slug($s) {
            $c = array (' ');
            $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
            $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
            $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
            return $s;
        }


    function cek_terakhir($datetime, $full = false) {
    		$today = time();
                     $createdday= strtotime($datetime);
                     $datediff = abs($today - $createdday);
                     $difftext="";
                     $years = floor($datediff / (365*60*60*24));
                     $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
                     $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                     $hours= floor($datediff/3600);
                     $minutes= floor($datediff/60);
                     $seconds= floor($datediff);
                     //year checker
                     if($difftext=="")
                     {
                       if($years>1)
                        $difftext=$years." Years";
                       elseif($years==1)
                        $difftext=$years." Years";
                     }
                     //month checker
                     if($difftext=="")
                     {
                        if($months>1)
                        $difftext=$months." Month";
                        elseif($months==1)
                        $difftext=$months." Month";
                     }
                     //month checker
                     if($difftext=="")
                     {
                        if($days>1)
                        $difftext=$days." Days";
                        elseif($days==1)
                        $difftext=$days." Days";
                     }
                     //hour checker
                     if($difftext=="")
                     {
                        if($hours>1)
                        $difftext=$hours." Hours";
                        elseif($hours==1)
                        $difftext=$hours." Hours";
                     }
                     //minutes checker
                     if($difftext=="")
                     {
                        if($minutes>1)
                        $difftext=$minutes." Minutes";
                        elseif($minutes==1)
                        $difftext=$minutes." Minutes";
                     }
                     //seconds checker
                     if($difftext=="")
                     {
                        if($seconds>1)
                        $difftext=$seconds." Seconds";
                        elseif($seconds==1)
                        $difftext=$seconds." Seconds";
                     }
                     return $difftext;
    	}

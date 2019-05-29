<?php
class Prescription_model extends CI_Model {

    public function getPatientPrescription($id) {
        $query = $this->db->join("opd_details", "prescription.opd_id = opd_details.id")->where("opd_details.patient_id", $id)->get("prescription");
        return $query->result_array();
    }

    public function get($id) {
        $query = $this->db->select("opd_details.*,patients.*,staff.name,staff.local_address,prescription.opd_id")->join("opd_details", "prescription.opd_id = opd_details.id")->join("patients", "patients.id = opd_details.patient_id")->join("staff", "staff.id = opd_details.cons_doctor")->where("prescription.opd_id", $id)->get("prescription");
        return $query->row_array();
    }

    public function getPrescriptionByOPD($id) {
        $query = $this->db->select('prescription.*,staff.id as staff_id')->join("opd_details", "prescription.opd_id = opd_details.id")->join("patients", "patients.id = opd_details.patient_id")->join("staff", "staff.id = opd_details.cons_doctor")->where("prescription.opd_id", $id)->get("prescription");
        $result = $query->result_array();
            $i = 0;
            foreach ($result as $key => $value) {
                $opd_id = $value["id"];
                $check = $this->db->where("opd_id", $id)->get('prescription');
                if ($check->num_rows() > 0) {
                    $result[$i]['prescription'] = 'yes';
                } else {
                    $result[$i]['prescription'] = 'no';
                  $userdata = $this->customlib->getUserData();
                  $doctor_restriction = $this->session->userdata['admin']['doctor_restriction'];
                  if($doctor_restriction == 'enabled'){
                    if($userdata["role_id"] == 3){
                      if($userdata["id"] == $value["staff_id"]){
                  }else{
                   $result[$i]['prescription'] = 'not_applicable'; 
                  }  
                    }
                  }    
                }
                $i++;
            }
            return $result;

       // return $query->result_array();
    }

    public function update_prescription($data) {
        $this->db->where('id', $data['id'])->update("prescription", $data);
    }

    public function delete_prescription($delete_arr) {
        foreach ($delete_arr as $key => $value) {
            $id = $value["id"];
            $this->db->where("id", $id)->delete("prescription");
        }
    }

    public function deletePrescription($opdid) {
        $this->db->where("opd_id", $opdid)->delete("prescription");
    }

}
?>
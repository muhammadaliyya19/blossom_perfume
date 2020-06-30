<?php 
	class Prediksi_model extends CI_Model
	{
		
		public function getAllPrediksi()
		{
			return $query = $this->db->get('prediksi')->result_array();
		}

		public function tambahDataBibit()
		{
			$data = array(
			"name" 			=> $this->input->post('nama', true),
			"startDate" 	=> $this->input->post('startdate', true),
			"endDate" 		=> $this->input->post('enddate', true),
			"deskripsi"		=> $this->input->post('description', true),
			"status" 		=> $this->input->post('status', true),
			"projId" 		=> $this->input->post('projId', true),
			"empId" 		=> $this->input->post('assignee', true)
			);
			$thisproj = $this->db->get_where('project',['id' => $data['projId']])->row_array();
			$this->db->insert('task', $data);
			$data = array(
			"id" 			=> '',
			"name" 			=> $this->input->post('nama', true),
			"startDate" 	=> $this->input->post('startdate', true),
			"endDate" 		=> $this->input->post('enddate', true),
			"deskripsi"		=> $this->input->post('description', true),
			"status" 		=> $this->input->post('status', true),
			"projName" 		=> $thisproj['projName'],
			"empId" 		=> $this->input->post('assignee', true),
			"pmdata" 		=> $this->db->get_where('user',['id' => $thisproj['pm']])->row_array(),
			"empdata" 		=> $this->db->get_where('user',['id' => $data['empId']])->row_array()
			);
			_sendEmail($data, 'assigneeTask');
		}

		public function hapusDataBibit($id)
		{
			//$this->db->where('nis', $id);
			$this->db->delete('bibit', ['id' => $id]);
			return 1;
		}

		public function getBibitById($id)
		{
			//$this->db->where('nis', $id);
			return $this->db->get_where('bibit' , ['id' => $id])->row_array();
		}

		public function updateDataBibit()
		{
			$data = array(
			"name" 			=> $this->input->post('nama', true),
			"startDate" 	=> $this->input->post('startdate', true),
			"endDate" 		=> $this->input->post('enddate', true),
			"deskripsi"		=> $this->input->post('description', true),
			"status" 		=> $this->input->post('status', true),
			"projId" 		=> $this->input->post('projId', true),
			"empId" 		=> $this->input->post('assignee', true)
			);
			$thisproj = $this->db->get_where('project',['id' => $data['projId']])->row_array();
			$this->db->where('id', $this->input->post('taskId'));
			$this->db->update('task', $data);
			$data = array(
			"id" 				=> '',
			"name" 			=> $this->input->post('nama', true),
			"startDate" 	=> $this->input->post('startdate', true),
			"endDate" 		=> $this->input->post('enddate', true),
			"deskripsi"		=> $this->input->post('description', true),
			"status" 		=> $this->input->post('status', true),
			"projName" 		=> $thisproj['projName'],
			"empId" 		=> $this->input->post('assignee', true),
			"pmdata" 		=> $this->db->get_where('user',['id' => $thisproj['pm']])->row_array(),
			"empdata" 		=> $this->db->get_where('user',['id' => $data['empId']])->row_array()
			);
			// _sendEmail($data, 'assigneeTask');
		}
	}
?>
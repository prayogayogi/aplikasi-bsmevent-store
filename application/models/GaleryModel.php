<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleryModel extends CI_Model
{

	// Get data tb_layanan
	public function index()
	{
		return $this->db->get('tb_galery');
	}

	//Store date Galery
	public function store()
	{
		$file = $_FILES['foto'];
		if ($file) {
			$config['allowed_types']  = 'jpg|png|';
			$config['max_size']       = '2048';
			$config['upload_path']    = './public/image/galery/';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$files = $this->upload->data('file_name', TRUE);
			} else {
				$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data Foto Galery</strong> Gagal Di Upoload.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
				redirect('Admin/Galery');
			}
		}

		// Untuk bikin slug
		$title = trim(strtolower($this->input->post('jenis', TRUE)));
		$out = explode(" ", $title);
		$slug = implode("-", $out);

		$data = [
			'jenis_id' => $this->input->post('jenis', TRUE),
			'foto' => $files,
			'slug' => $slug,
		];

		$this->db->set($data);
		$this->db->insert('tb_galery');
	}

	// Edit untuk data galery
	public function edit($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tb_galery')->row_array();
	}

	// Update data galery
	public function update($id)
	{
		$file = $_FILES['foto'];
		if ($file) {
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = '2048';
			$config['upload_path']    = './public/image/galery/';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$files = $this->upload->data('file_name', TRUE);

				$this->db->set(['foto' => $files]);
				$this->db->select('foto');
				$foto = $this->db->get_where('tb_galery', ['id' => $id])->row_array();
				unlink(FCPATH . './public/image/galery/' . $foto['foto']);
			} else {
				echo "error";
			}
		}
		// Untuk bikin slug
		$title = trim(strtolower($this->input->post('jenis', TRUE)));
		$out = explode(" ", $title);
		$slug = implode("-", $out);

		$data = [
			'jenis_id' => $this->input->post('jenis'),
			'slug' => $slug,
		];

		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_galery');
	}

	// Destroy data galery
	public function destroy($id)
	{
		$foto = $this->db->get_where('tb_galery', ['id' => $id])->row_array();
		unlink(FCPATH . './public/image/galery/' . $foto['foto']);
		$this->db->where('id', $id);
		$this->db->delete('tb_galery');
	}

	// Get Detail getDetailGalery
	public function getDetail($foto)
	{
		$this->db->where('foto', $foto);
		return $this->db->get('tb_galery');
	}

	public function ggetDetail($foto)
	{
		$this->db->select('*');
		$this->db->from('tb_layanan');
		$this->db->join('tb_galery', 'tb_galery.slug = tb_layanan.slug');
		$this->db->where('tb_layanan.foto', $foto);
		return $this->db->get();
	}
}

<?php

namespace App\Controllers;

use App\Models\Modelmurid;

class Home extends BaseController
{
	protected $Modelmurid;
	public function __construct()
	{
		$this->Modelmurid = new Modelmurid();
	}

	public function index()
	{
		return view('index');
	}

	public function addajax()
	{
		$data = [
			'nama' => $this->request->getVar('nama'),
			'nisn' => $this->request->getVar('nisn'),
			'alamat' => $this->request->getVar('alamat'),
			'nohp' => $this->request->getVar('nohp')
		];
		$this->Modelmurid->save($data);
		$data = ['status' => 'data berhasil di tambahkan'];
		return $this->response->setJSON($data);
	}

	public function fetch()
	{
		$data['students'] = $this->Modelmurid->getmurid();
		return $this->response->setJSON($data);
	}

	public function viewmurid()
	{
		$id = $this->request->getVar('id');
		$data['students'] = $this->Modelmurid->find($id);
		return $this->response->setJSON($data);
	}
	public function viewedit()
	{
		$id = $this->request->getVar('id');
		$data['students'] = $this->Modelmurid->find($id);
		return $this->response->setJSON($data);
	}

	public function edit()
	{
		$id = $this->request->getVar('id');
		$data = [
			'nama' => $this->request->getVar('nama'),
			'nisn' => $this->request->getVar('nisn'),
			'alamat' => $this->request->getVar('alamat'),
			'nohp' => $this->request->getvar('nohp'),
		];
		$this->Modelmurid->update($id, $data);
		return $this->response->setJSON($data);
	}

	public function delete()
	{
		$id = $this->request->getVar('id');
		return $this->Modelmurid->delete($id);
	}

	public function beranda()
	{
		$data = [
			'title' => 'bernda'
		];
		return view('beranda');
	}

	public function search()
	{
		$keyword = $this->request->getGet('keyword');
		$data = $this->Modelmurid->find($keyword);
		return $this->response->setJSON($data);
	}
}

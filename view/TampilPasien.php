<?php


include_once("kontrak/KontrakView.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView

{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
				<td>" . $no . "</td>
				<td>" . $this->prosespasien->getNik($i) . "</td>
				<td>" . $this->prosespasien->getNama($i) . "</td>
				<td>" . $this->prosespasien->getTempat($i) . "</td>
				<td>" . $this->prosespasien->getTl($i) . "</td>
				<td>" . $this->prosespasien->getGender($i) . "</td>
				<td>" . $this->prosespasien->getEmail($i) . "</td>
				<td>" . $this->prosespasien->getTelpon($i) . "</td>
				<td>
					<a class='btn btn-warning' href='add.php?update=" . $i . "' role='button'>Edit</a>
					<a class='btn btn-danger' href='index.php?delete=" . $this->prosespasien->getId($i) . "' role='button'>Delete</a>
				</td>
			</tr>";
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function delete($id)
	{
		$this->prosespasien->delete($id);
	}
}

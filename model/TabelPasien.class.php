<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}


	function createPasien($data)
	{
		$nik = $data['NIK'];
		$nama = $data['nama'];
		$tempat_lahir = $data['tempat'];
		$tanggal_lahir = $data['tanggal_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql insert data pasien
		$query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) 
              VALUES ('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$gender', '$email', '$telp')";

		// Mengeksekusi query
		return $this->execute($query);
	}


	function updatePasien($data)
	{
		$id = $data['id'];
		$nik = $data['NIK'];
		$nama = $data['nama'];
		$tempat_lahir = $data['tempat'];
		$tanggal_lahir = $data['tanggal_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql update data pasien
		$query = "UPDATE pasien 
				  SET nik = '$nik', nama = '$nama', tempat = '$tempat_lahir', 
				  tl = '$tanggal_lahir', gender = '$gender' ,email = '$email' , telp = '$telp' 
				  WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql delete data pasien
		$query = "DELETE FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}
}

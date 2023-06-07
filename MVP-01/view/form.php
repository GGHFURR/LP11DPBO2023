<?php


include_once("kontrak/kontrakview.php");
include_once("presenter/ProsesPasien.php");

class TampilPasienForm implements KontrakPasienView
{
    private $pasienform; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->pasienform = new ProsesPasien();
    }

    function tampil()
    {
        $choice = '<option value="Perempuan">Perempuan</option>
		<option value="Laki-laki">Laki-laki</option>';
        $type = '<button type="submit" class="btn btn-success" name="submit" form="data">Add Data</button>';
        $title = 'Add';

        // Membaca template skin.html
        $this->tpl = new Template("templates/form.html");

        // Mengganti kode-kode dengan data yang sudah diproses.
        $this->tpl->replace("BUTTON_TYPE", $type);
        $this->tpl->replace("TITLE", $title);
        $this->tpl->replace("DROPDOWN", $choice);
        $this->tpl->replace("NAMA", '');
        $this->tpl->replace("TEMPAT", '');
        $this->tpl->replace("TL", '');
        $this->tpl->replace("EMAIL", '');

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function tampilEdit($i)
    {
        $this->pasienform->prosesDataPasien();

        $id = $this->pasienform->getId($i);
        $nik = $this->pasienform->getNik($i);
        $nama = $this->pasienform->getNama($i);
        $tempat = $this->pasienform->getTempat($i);
        $tl = $this->pasienform->getTl($i);
        $gender = $this->pasienform->getGender($i);
        $email = $this->pasienform->getEmail($i);
        $telp = $this->pasienform->getTelpon($i);

        if ($gender == 'Perempuan') {
            $choice = '<option value="Perempuan" selected>Perempuan</option>
			<option value="Laki-laki">Laki-laki</option>';
        } else if ($gender == 'Laki-laki') {
            $choice = '<option value="Perempuan">Perempuan</option>
			<option value="Laki-laki" selected>Laki-laki</option>';
        }

        $type = '<button type="submit" class="btn btn-warning" name="edit" form="data">Edit Data</button>';
        $title = 'Edit';

        // Membaca template skin.html
        $this->tpl = new Template("templates/form.html");

        // Mengganti kode-kode dengan data yang sudah diproses.
        $this->tpl->replace("BUTTON_TYPE", $type);
        $this->tpl->replace("TITLE", $title);
        $this->tpl->replace("ID", $id);
        $this->tpl->replace("nik", $nik);
        $this->tpl->replace("NAMA", $nama);
        $this->tpl->replace("TEMPAT", $tempat);
        $this->tpl->replace("TL", $tl);
        $this->tpl->replace("DROPDOWN", $choice);
        $this->tpl->replace("EMAIL", $email);
        $this->tpl->replace("TELP", $telp);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function add($data)
    {
        $this->pasienform->add($data);
    }

    function edit($data)
    {
        $this->pasienform->edit($data);
    }
}

<?php




class person

{
    public $voornaam;
    public $achternaam;
    public $geboortedatum;
    public $email;

    public $id;

    public $status;

    public function getFullName(): string
    {

        // add some code to ad date to database that this record is shown

        return $this->voornaam . ' ' . $this->achternaam;

    }


    public function set_firstname(string $voornaam) {
        $this->voornaam = $voornaam;
    }

    public function delete() {
        $this->backup();
       // sql function to delete this person
    }

    private function backup()
    {
        // sql function to get this person
    }

    public function update($data) {

    }

    public function create() {

    }

}
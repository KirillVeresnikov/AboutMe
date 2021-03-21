<?php
namespace App\Module;

class Notes implements NotesData
{
    private array $notesName = [];

    public function __construct()
    {
        $this -> getNotesName();
    }

    private function getNotesName()
    {
        $dir = scandir('../data/notes/', SCANDIR_SORT_NONE);
        foreach ($dir as $value)
        {
            if (strpos($value, '.json'))
            {
                array_push($this -> notesName, $value);
            }
        }
    }

    public function readNotes(): array
    {
        $result = [];
        foreach ($this -> notesName as $value)
        {
            $file = file_get_contents('../data/notes/'.$value);
            $note = json_decode($file, true);
            array_push($result, $note);
        }
        return $result;
    }

}
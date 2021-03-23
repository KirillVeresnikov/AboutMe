<?php
namespace App\Module;

class Notes implements NotesData
{
    private array $notesName = [];
    private string $Path = '../data/notes/';
    public function __construct()
    {
        $this -> getNotesName();
    }

    private function getNotesName()
    {
        $dir = scandir($this -> Path, SCANDIR_SORT_NONE);
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
            $file = file_get_contents($this -> Path.$value);
            $note = json_decode($file, true);
            array_push($result, $note);
        }
        return $result;
    }
}
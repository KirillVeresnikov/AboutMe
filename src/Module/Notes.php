<?php
namespace App\Module;

class Notes implements NotesInterface
{
    private array $notesName;
    private string $path = '../data/notes/';
    
    public function __construct()
    {
        $this->getNotesName();
    }

    private function getNotesName()
    {
        $dir = scandir($this->path, SCANDIR_SORT_NONE);
        foreach ($dir as $value)
        {
            if (strpos($value, '.json'))
            {
                $this->notesName[] = $value;
            }
        }
    }

    public function getNotes(): array
    {
        $result = [];
        foreach ($this->notesName as $value)
        {
            $file = file_get_contents($this->path.$value);
            $note = json_decode($file, true);
            $result[] = $note;
        }
        return $result;
    }
}
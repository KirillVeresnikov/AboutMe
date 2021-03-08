<?php
    function getNotesName()
    {
        $dir = scandir('../data/notes/', SCANDIR_SORT_NONE);
        $notes = [];
        foreach ($dir as $value)
        {
            if (strpos($value, '.json'))
            {
                array_push($notes, $value);
            }
        }
        return $notes;
    }

    function readNote(string $noteName)
    {
        $result = file_get_contents('../data/notes/'.$noteName);
        return json_decode($result, true);
    }

    function readNotes(array $notesName)
    {
        $result = [];
        foreach ($notesName as $value)
        {
            array_push($result, readNote($value));
        }
        return $result;
    }
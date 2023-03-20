<?php

namespace App\Traits;

use DB;

trait deleteFile
{
    public function deleteFile($path)
    {
        if ($path !== null) {
            if (file_exists(public_path($path))) {
                return unlink(public_path($path));
            }
        }

        return false;
    }
}

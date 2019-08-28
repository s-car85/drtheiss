<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Medias
{

	/**
	 * Get the media url for redactor
	 *
	 * @return string
	 */
	public static function getUrl()
	{
		$url = config('medias.url');

			$name = self::getName();
			$url .= '?exclusiveFolder=' . $name;

		return $url;
	}

    /**
     * Create and return directory name for redactor.
     *
     * @return string
     */
    public static function getName()
    {

        $name = strtolower(strtr(utf8_decode(Auth::user()->username),
            utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'),
            'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'
        ));

        // $directory = base_path() . config('medias.url-files') . $name;

        // if (!File::isDirectory($directory))
        // {
        //     File::makeDirectory($directory);
        // }

        return $name;
    }

}
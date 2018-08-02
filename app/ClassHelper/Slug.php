<?php

namespace App\ClassHelper;


/**
 *
 */

 Class Slug
{
  function __construct()
	{
		# code...
	}
  public function createSlug($slug){
       $slugFile=preg_replace('/\s+/', '-', $slug);
       return $slugFile;
  }
}

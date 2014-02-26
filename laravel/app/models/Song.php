<?php

class Song extends Eloquent {

  public static function validate($input)
  {
    return Validator::make($input, [
      'title' => 'required|min:4',
      'price' => 'required|numeric'
    ]);
  }

	public function artist()
	{
		return $this->belongsTo('Artist');
	}


	public function genre()
	{
		return $this->belongsTo('Genre');
	}

	// this is for date formatting. feel free to explore this
  public function getDates()
  {
    return ['created_at', 'updated_at', 'added'];
  }

} 
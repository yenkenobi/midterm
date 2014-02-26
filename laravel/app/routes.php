<?php

Route::get('itunes', function()
{
  $itunes = new \Itp\Api\ItunesSearch();
  $json = $itunes->getResults();

//  dd($json);

  return View::make('itunes', [
    'songs' => $json->results
  ]);

});


Route::get('songs/create', function()
{
  $genres = Genre::all();
  $artists = Artist::all();
  return View::make('songs/create', [
    'artists' => $artists,
    'genres' => $genres
  ]);
});


Route::post('songs', function()
{
//  dd(Input::all());
  $validation = Song::validate(Input::all());

  if ($validation->passes()) {
    $song = new Song();
    $song->title = Input::get('title');
    $song->artist_id = Input::get('artist');
    $song->genre_id = Input::get('genre');
    $song->price = Input::get('price');
    $song->save();

    return Redirect::to('songs/create')
      ->with('success', 'Yay!');
  }

  return Redirect::to('songs/create')
    ->withInput()
//    ->withErrors($validation);
    ->with('errors', $validation->messages());



});


Event::listen('illuminate.query', function($sql)
{
  echo "<div style='color: red;'>$sql</div>";
});

/**
 * Lazy Loading 
 * N + 1 problem
 */
Route::get('songs', function()
{
  $songs = Song::take(5)->get();

  foreach ($songs as $song)
  {
    var_dump($song->artist->toArray());
  }

  // dd($songs->toArray());
});

/**
 * Eager Loading, hydration
 */
Route::get('songs2', function()
{
  $songs = Song::with('artist', 'genre')
    ->take(5)
    ->get();

  dd($songs);

  foreach ($songs as $song)
  {
    // var_dump($songs);
  }

});


Route::get('artists/{id}', function($id)
{
  $artist = Artist::find($id);

  dd($artist->songs->toArray());
});



















<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function getPG($movies):array
    {
        $sortedMovies = array_filter($movies, function ($movie){
            if ($movie->rating === "PG")
            {
                return true;
            }
            return false;
        });

        return $sortedMovies;
    }
}

$movies = [
    new Movie("Casino Royale","Eon Productions","PG13"),
    new Movie("Glass","Buena Vista International","PG13"),
    new Movie("Spider-Man: Into the Spider-Verse","Columbia Pictures","PG")
];

$PGMovies = Movie::getPG($movies);

var_dump($PGMovies);
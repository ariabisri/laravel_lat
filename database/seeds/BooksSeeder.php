<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $author1 = Author::create(['name'=>'Aam Amiruddin']);
        $author2 = Author::create(['name'=>'Aam Amiruddin2']);
        $author3 = Author::create(['name'=>'Aam Amiruddin3']);

        $book1 = Book::create(['title'=>'Kupinang Engkau dengan Hamdalah', 'amount'=>3, 'author_id'=>$author1->id]);
        $book2 = Book::create(['title'=>'Kupinang Engkau dengan Hamdalah2', 'amount'=>3, 'author_id'=>$author2->id]);
        $book3 = Book::create(['title'=>'Kupinang Engkau dengan Hamdalah3', 'amount'=>3, 'author_id'=>$author3->id]);
        $book4 = Book::create(['title'=>'Kupinang Engkau dengan Hamdalah4', 'amount'=>3, 'author_id'=>$author1->id]);

    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Book;
use App\BorrowLog;
use App\Exceptions\BookException;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function borrowLogs()
    {
        return $this->hasMany('App\BorrowLog');
    }

    public function borrow(Book $book)
    {
        if($book->stock < 1){
            throw new BookException("buku $book->title sedang tidak tersedia");
        }
        if ($this->borrowLogs()->where('book_id', $book->id)->where('is_returned', 0)->count()>0){
        throw new BookException("Buku $book->title sedang anda pinjam");
    }
    $borrowLog=BorrowLog::create(['user_id'=>$this->id, 'book_id'=>$book->id]);
    return $borrowLog;
    }
    
}

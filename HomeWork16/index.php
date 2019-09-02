<?php

    require_once 'vendor/autoload.php';
    require_once 'db.config.php';

    class User extends \Illuminate\Database\Eloquent\Model {

        public function posts(){
            return $this->hasMany(Post::class);
        }

    }

    class Post extends \Illuminate\Database\Eloquent\Model{

        public function user() {
            return $this->belongsTo(User::class);
        }

        public function category(){
            return $this->belongsTo(Category::class);
        }

        public function tags(){
            return $this->belongsToMany(Tag::class);
        }

    }

    class Category extends \Illuminate\Database\Eloquent\Model{
        public function posts(){
            return $this->hasMany(Post::class);
        }

    }

    class Tag extends \Illuminate\Database\Eloquent\Model{
        public function posts(){
            return $this->belongsToMany(Post::class);

        }
    }
    $tags = Tag::find(1);
       foreach ($tags->posts as $post) {
       var_dump($post->title);
       echo('<p>');
        }

    $posts = Post::find(1);
    foreach ($posts->tags as $tag) {
        var_dump($tag->title);
        echo('<p>');
    }



//    $user = User::find(3);
//    foreach ($user->posts as $post) {
//        var_dump($user->last_name);
//        var_dump($post->title);
//        var_dump($post->description);
//        echo ('<br>');
//    }
//
//    $posts = Post::find(4);
//
//    foreach (Post::all() as $post) {
//        var_dump($post->title);
//        var_dump($post->user->first_name);
//        var_dump($post->user->last_name);
//        echo('<p>');
//
//    }

//    $categories = Category::find(27);
//
//    foreach ($categories->posts as $post) {
//        var_dump($post->title);
//        var_dump($post->user->first_name);
//        var_dump($post->user->last_name);
//        echo('<p>');
//    }


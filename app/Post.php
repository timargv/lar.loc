<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use Sluggable;

    /*-----------------------*/

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    /*-----------------------*/

    /* Данные для добавления поста
    ---------------------------------------------*/
    protected $fillable = ['title', 'content'];



    /* У поста может быть только ОДНА КАТЕГОРИЯ
    ---------------------------------------------*/
    public function category() {

        return $this->hasOne(Category::class);

    }


    /* У поста может быть один АВТОР
    ---------------------------------------------*/
    public function author() {

        return $this->hasOne(User::class);

    }



    /* У поста может быть много ТЕГОВ
    ---------------------------------------------*/
    public function tags() {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }



    /* Seo url
    ---------------------------------------------*/
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    /* Добавление ПОСТА в Админке
    ---------------------------------------------*/
    public static function add($fillable) {

        $post = new static();
        $post->fill($fillable);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    /* Редактирование ПОСТА в Админке
    ---------------------------------------------*/
    public function edit($fillable) {

        $this->fill($fillable);
        $this->save();

    }

    /* Удаление поста c картинкой из Админки
    ---------------------------------------------*/
    public function delete() {

        Storage::delete('upload/' . $this->image);
        $this->delete();

    }

    /* Метод загрузки картинки
    ---------------------------------------------*/
    public function uploadImage($image){

        if($image == null) { return; }

        Storage::delete('upload/' . $this->image);

        $filename = str_random(10) . '.' . $image->extension();
        $image->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();

    }

    /* Метод Получения картинки и ответ при отсутствии
    ---------------------------------------------*/
    public function getImage() {

        if ( $this->image == null ) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;
    }


    /* Метод сохранения и привязки к КАТЕГОРИИ
    ---------------------------------------------*/
    public function setCategory($id) {

        if ($id == null) { return; }

        $this->category_id = $id;
        $this->save();

    }


    /* Метод сохранения и привязки к ТЕГАМ
    ---------------------------------------------*/
    public function setTags($ids) {

        if($ids == null) { return; }

        $this->tags()->sync($ids);

    }


    /*-------- СТАТУС СОСТОЯНИЯ RECOMMEND -------*/

    /* Метод установки статуса
    ---------------------------------------------*/
    public function setDraft() {

        $this->status = Post::IS_DRAFT;
        $this->save();

    }

    /* Метод установки статуса
    ---------------------------------------------*/
    public function setPublic() {

        $this->status = Post::IS_PUBLIC;
        $this->save();

    }

    /* Переключатель статуса
    ---------------------------------------------*/
    public function toggleStatus($value) {

        if($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();

    }


    /*-------------- СТАТУС ОТНОШЕНИЯ ------------*/

    /* Отноститься ли статья к чему либо
    ---------------------------------------------*/
    public function setFeatured() {

        $this->is_featured = 1;
        $this->save();

    }

    /* Отноститься ли статья к чему либо
    ---------------------------------------------*/
    public function setStandard() {

        $this->is_featured = 0;
        $this->save();

    }

    /* Переключатель отношения
    ---------------------------------------------*/
    public function toggleFeatured($value) {

        if( $value == null ) {
            return $this->setStandard();
        }

        return $this->setFeatured();
    }

    //-end



}

<?php
/**
 * Created by PhpStorm.
 * User: MahmoudMohamed
 * Date: 25/02/2017
 * Time: 02:45 م
 */
Route::get('/hi', function(){
    return "Hi";
});
Route::group(['middleware' => ['web']], function (){

});
?>
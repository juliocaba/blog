<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/* para crear este form request uso: php artisan make:request StorePostRequest
esta clase se usa para definir los metodos autorizar y reglas
*/
class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* para darle mas seguridad a la creacion de post
        if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        }
         */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /* reglas de validacion para los formularios donde use esta clase */
    public function rules()
    {
       $post = $this->route()->parameter('post');

        $rules = [
            'name'=> 'required',
            'slug'=> 'required|unique:posts', 
            'status'=> 'required|in: 1,2',
            'file' => 'image'
       ];

       if ($post) {
           $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
       }
       if ($this->status == 2) {
           $rules = array_merge($rules, [
               'category_id'=>'required',
               'tags' => 'required',
               'extract' => 'required',
               'body' => 'required'
           ]);
       }      
       /* retorna las reglas de validacion creadas */
       return $rules;         
    }
 }

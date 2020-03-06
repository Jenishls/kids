<?php

namespace App\Traits\Blogs;
use App\Model\File;

trait BlogFile{

    /** purpose: To create new file
     * @param imageName, blogInstance
     * @return null
     */
    protected function createImage($image, $id)
    {
        File::create([
            'type' => 'blog',
            'table_name' => 'blogs',
            'table_id' => $id,
            'file_name' => $image,
        ]);
    }
    /** purpose: To update existing file column
     * @param imageName, blogInstance
     * @return null
     */
    protected function updateImage($image, $blog){
        $blog->file->update([
            'file_name' => $image,
            'updated_at' => now()->toDateTimeString()
        ]);
    }
    /** purpose: check if blog has file
     * @param imageName, blogInstance
     * @return null
     */
    protected function updateOrCreateFile($image, $blog)
    {
        $blog->hasFile? $this->updateImage($image, $blog) : $this->createImage($image, $blog->id);  
    }

}
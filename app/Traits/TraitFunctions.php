<?php
namespace App\Traits;
 trait TraitFunctions {

    public function save_file($file,$path){
        if($file){
            // Get filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext

            $extension = $file->getClientOriginalExtension();
            // Filename to store

            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image

            $file->move(
                base_path() . $path, $fileNameToStore
            );
            /*
              $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($file->getRealPath());
            $thumb->resize(80, 80);
            $thumb->save('storage/app/public'.$thumbStore);
		
         */

        } else {
            $fileNameToStore = 'Logo_.png';
        }
        return $fileNameToStore;
    }
}
?>

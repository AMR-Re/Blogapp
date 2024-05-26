<?php


/** Handle file upload */

function handleUpload($inputName, $model=null){
    try{
        if(request()->hasFile($inputName)){
            if($model && \File::exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($model->{$inputName}));
            }

            $file = request()->file($inputName);
            $fileName = rand().$file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);

            $filePath = "/uploads/".$fileName;

            return $filePath;
        }
    }catch(\Exception $e){
        throw $e;
    }

}


/** Delete file */

function deleteFileIfExist($filePath){
    try{
        if(\File::exists(public_path($filePath))){
            \File::delete(public_path($filePath));
        }
    }catch(\Exception $e){
        throw $e;
    }
}

/** get dynamic colors  */

// function getColor($index){
//     $colors = ['#558bff', '#fecc90', '#ff885e', '#282828', '#190844', '#9dd3ff'];

//     return $colors[$index % count($colors)];
// }

function getColor() {
    // Generate random HSL color values (excluding white)
    do {
      $hue = rand(0, 359);
      $saturation = rand(50, 100) . '%';
      $lightness = rand(1, 90) . '%'; // Ensure lightness is not 100 (white)
      $color = "hsl($hue, $saturation, $lightness)";
    } while ($lightness === '100%'); // Repeat until lightness is not white
  
    return $color;
  }
/** Set Sidebar Active  */

function setSidebarActive($route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}

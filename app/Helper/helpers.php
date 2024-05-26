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
    // Generate random HSL color values
    $hue = rand(0, 359);
    $saturation = rand(50, 100) . '%';
    $lightness = rand(50, 100) . '%';
  
    // Create the HSL color string
    $color = "hsl($hue, $saturation, $lightness)";
  
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

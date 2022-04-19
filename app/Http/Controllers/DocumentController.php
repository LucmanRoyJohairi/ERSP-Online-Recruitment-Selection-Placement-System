<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Document;
use App\Models\Directory;
class DocumentController extends Controller
{
    public function saveDocuments(Request $request, $id){
        
        $files = [];
        for ($i = 1; $i <= 13; $i++) {
            array_push($files, $request->file('req' . $i));
        }
       
       
        $user = User::find($id);
        $dirs = Directory::all();
        
        

        if(count($dirs) == 0){
            $folder = Storage::disk('google')->makeDirectory($user->lastname);
            $url = Storage::disk('google')->url($user->lastname);
            
            Directory::create([
                'name' => $user->lastname,
                'path' => $url,
                
            ]);
            for($i = 0; $i <= 13; $i++){
                if(!empty($files[$i])){
                    $extension = $files[$i]->extension();
                    $filename = "requirement-" . ($i+1) . '.' . $extension;
                    // $filename = "requirement-" . ($i+1) ;
                    // $filename = "requirement-" . ($i+1) . '.' . $extension;


                    $folderId = Storage::disk('google')->url($user->lastname);
                    $f = Storage::disk("google")->putFileAs($url, $files[$i], $filename);
                    $filepath = Storage::disk('google')->url($f);
                    // dd($filepath);

                    Document::create([
                        'doctype_id' => 1,
                        'user_id' => $id,
                        'filename' => $filename,
                        'file_path' => $filepath,
                    ]);
                }//for
                

            }
            return redirect()->back()->with('success','documents added!');
        }
        $currentDirPath = Directory::where('name','=', $user->lastname)->first();
        // dd($currentDirPath->path);

        foreach($dirs as $d){
            
            // $fi = Storage::disk('google')->files('https://drive.google.com/drive/folders/1J9UEJFBN0W4TxVje10P87qFEZHCVKToa');
            // dd(Storage::disk('google')->url($fi[0]));
            // // Storage::disk('google')->delete($fi[0]);
            // dd('file deleted');
            if($d->name != $user->lastname){
                $folder = Storage::disk('google')->makeDirectory($user->lastname);
                $url = Storage::disk('google')->url($user->lastname);
                Directory::create([
                    'name' => $user->lastname,
                    'path' => $url,
                    
                ]);

                for($i = 0; $i <= 13; $i++){
                    if(!empty($files[$i])){
                        $extension = $files[$i]->extension();
                        $filename = "requirement-" . ($i+1) . '.' . $extension;
                        // $filename = "requirement-" . ($i+1) ;
                        // $filename = "requirement-" . ($i+1) . '.' . $extension;


                        $folderId = Storage::disk('google')->url($user->lastname);
                        $f = Storage::disk("google")->putFileAs($url, $files[$i], $filename);
                        $filepath = Storage::disk('google')->url($f);
                        // dd($filepath);

                        Document::create([
                            'doctype_id' => 1,
                            'user_id' => $id,
                            'filename' => $filename,
                            'file_path' => $filepath,
                        ]);
                    }//for
                    

                }
                return redirect()->back()->with('success','documents added!');
            }else{
                for($i = 0; $i <= 13; $i++){
                    if(!empty($files[$i])){
                        $extension = $files[$i]->extension();
                        $filename = "requirement-" . ($i+1) . '.' . $extension;
                        // dd($extension);
                        // $filename = "requirement-" . ($i+1) ;
                        $currFile = Document::where([['filename', $filename], ['user_id', $id]])->first();
                        $dir = Directory::where('name', $user->lastname)->first();

                        if($currFile){
                            // $folderId = Storage::disk('google')->url($user->lastname);
                            // dd($dir->path);

                            $folderContent = Storage::disk('google')->files($dir->path);
                            // dd($folderContent[0]);

                            for($j = 0; $j <= count($folderContent); $j++){
                                $c = Storage::disk('google')->url($folderContent[$j]);
                                // echo $i . '</br>';
                                // echo $currFile->file_path. '</br>';
                                // echo $c;


                                if($c == $currFile->file_path){
                                    // dd('here');

                                    Storage::disk('google')->delete($folderContent[$j]);//delete file from drive
                                    $f = Storage::disk("google")->putFileAs($dir->path, $files[$i], $filename);
                                    $filepath = Storage::disk('google')->url($f);
                                    // dd($filepath);
                                    
                                    $document = Document::find($currFile->id);
                                    $document->file_path = $filepath;
                                    $document->save();
                                    // dd('file updated');
                                    return redirect()->back()->with('success','File updated successfully!');

                                }
                            }
                            
                        }else{
                            $folderId = Storage::disk('google')->url($user->lastname);
                            $f = Storage::disk("google")->putFileAs($currentDirPath->path, $files[$i], $filename);
                            $filepath = Storage::disk('google')->url($f);
                            // dd($filepath);
                        // dd($filename);

    
                            Document::create([
                                'doctype_id' => 1,
                                'user_id' => $id,
                                'filename' => $filename,
                                'file_path' => $filepath,
                            ]);
                        }

                        
                    }
                    

                }//for
                return redirect()->back()->with('success','documents added!');
            }
        }//foreach
        // dd('hey');

        
        
        
    }

    // pre-emp
    public function savePreEmploymentDocs(Request $request, $id){
        $files = [];
        for ($i = 1; $i <= 24; $i++) {
            array_push($files, $request->file('pre-emp' . $i));
        }


        if($request->skip){
            foreach($request->skip as $s){
                // dd($s);
                $filename = "pre-employment-" . $s . '.' . 'docx';
                Document::create([
                    'doctype_id' => 2,
                    'user_id' => $id,
                    'filename' => $filename,
                    'file_path' => 'to follow up',
                ]);
            }
        }
        
       
       
        $user = User::find($id);
        $dirs = Directory::all();
        // dd($currentDirPath->path);
        

        if(count($dirs) == 0){
            // dd('here');
            $folder = Storage::disk('google')->makeDirectory($user->lastname);
            $url = Storage::disk('google')->url($user->lastname);
            
            Directory::create([
                'name' => $user->lastname,
                'path' => $url,
                
            ]);
            // dd(Storage::disk('google')->url($user->lastname));
            for($i = 0; $i <= 24; $i++){
                if(!empty($files[$i])){
                    $extension = $files[$i]->extension();
                    $filename = "pre-employment-" . ($i+1) . '.' . $extension;
                        
                    // $filename = "requirement-" . ($i+1) . '.' . $extension;


                    $folderId = Storage::disk('google')->url($user->lastname);
                    $f = Storage::disk("google")->putFileAs($url, $files[$i], $filename);
                    $filepath = Storage::disk('google')->url($f);
                    // dd($filepath);

                    Document::create([
                        'doctype_id' => 2,
                        'user_id' => $id,
                        'filename' => $filename,
                        'file_path' => $filepath,
                    ]);
                }//for
                

            }
            return redirect()->back()->with('success','documents added!');
        }
        $currentDirPath = Directory::where('name','=', $user->lastname)->first();


        foreach($dirs as $d){
            // $fi = Storage::disk('google')->files('https://drive.google.com/drive/folders/1J9UEJFBN0W4TxVje10P87qFEZHCVKToa');
            // dd(Storage::disk('google')->url($fi[0]));
            // // Storage::disk('google')->delete($fi[0]);
            // dd('file deleted');
            if($d->name != $user->lastname){
                $folder = Storage::disk('google')->makeDirectory($user->lastname);
                $url = Storage::disk('google')->url($user->lastname);
                Directory::create([
                    'name' => $user->lastname,
                    'path' => $url,
                    
                ]);

                for($i = 0; $i <= 24; $i++){
                    if(!empty($files[$i])){
                        $extension = $files[$i]->extension();
                        $filename = "pre-employment-" . ($i+1) . '.' . $extension;
                        
                        // $filename = "requirement-" . ($i+1) . '.' . $extension;


                        $folderId = Storage::disk('google')->url($user->lastname);
                        $f = Storage::disk("google")->putFileAs($url, $files[$i], $filename);
                        $filepath = Storage::disk('google')->url($f);
                        // dd($filepath);

                        Document::create([
                            'doctype_id' => 2,
                            'user_id' => $id,
                            'filename' => $filename,
                            'file_path' => $filepath,
                        ]);
                    }//for
                    

                }
                return redirect()->back()->with('success','documents added!');
            }else{
                $count = 0;

                for($i = 0; $i <= 24; $i++){
                    if(!empty($files[$i])){
                        // $extension = $files[$i]->extension();
                        // $filename = "requirement-" . ($i+1) . '.' . $extension;
                        $extension = $files[$i]->extension();
                        $filename = "pre-employment-" . ($i+1) . '.' . $extension;
                        $name = "pre-employment-" . ($i+1);

                        $currFile = Document::where([['filename', 'like', '%' . $name . '.' .  '%'], ['user_id', $id]])->first();
                        $pendingFiles = Document::where([['doctype_id',2], ['user_id', $id],['file_path', 'to follow up']])->get();
                        $dir = Directory::where('name', $user->lastname)->first();
                        // return count($pendingFiles);
                        // dd(count($pendingFiles));
                        if($currFile){
                            // $folderId = Storage::disk('google')->url($user->lastname);
                            // dd($dir->path);
                            // dd($currFile);

                            $folderContent = Storage::disk('google')->files($dir->path);
                            for($j = 0; $j < count($folderContent) - count($pendingFiles); $j++){
                                
                                $c = Storage::disk('google')->url($folderContent[$j]);

                                if($currFile->file_path == 'to follow up'){
                                    $f = Storage::disk("google")->putFileAs($dir->path, $files[$i], $filename);
                                    $filepath = Storage::disk('google')->url($f);
                                    // dd($filepath);
                                    
                                    $document = Document::find($currFile->id)->update(['filename' => $filename, 'file_path' => $filepath]);
                                    // $document->filename = $filename;
                                    // $document->file_path = $filepath;
                                    // $document->save();
                                    // dd('file updated');
                                
                                }

                                // echo $i . '</br>';
                                // echo $currFile->file_path. '</br>';
                                // echo $c;


                                if($c == $currFile->file_path){
                                    // dd('here');

                                    Storage::disk('google')->delete($folderContent[$j]);//delete file from drive
                                    $f = Storage::disk("google")->putFileAs($dir->path, $files[$i], $filename);
                                    $filepath = Storage::disk('google')->url($f);
                                    // dd($filepath);
                                    
                                    $document = Document::find($currFile->id);
                                    $document->filename = $filename;
                                    $document->file_path = $filepath;
                                    $document->save();
                                    // dd('file updated');
                                    // return redirect()->back()->with('success','File updated successfully!');

                                }
                                $count += 1;


                            }//foreach

                            // return redirect()->back()->with('success','File updated successfully!');
                            // dd(count($pendingFiles) - count($folderContent));

                            
                        }else{
                            $folderId = Storage::disk('google')->url($user->lastname);
                            $f = Storage::disk("google")->putFileAs($currentDirPath->path, $files[$i], $filename);
                            $filepath = Storage::disk('google')->url($f);
                            // dd($filepath);
    
                            Document::create([
                                'doctype_id' => 2,
                                'user_id' => $id,
                                'filename' => $filename,
                                'file_path' => $filepath,
                            ]);
                        }
                $count += 1;

                        
                    }

                }//for
                // dd($count);
                return redirect()->back()->with('success','documents added!');
            }
        }//foreach
    }
}

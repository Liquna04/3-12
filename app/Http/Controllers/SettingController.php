<?php

namespace App\Http\Controllers;
use App\Models\setting;
use Illuminate\Http\Request;
use App\Models\banner;

class SettingController extends Controller

    
    {
        public function index(){
        
            $settings = setting::all();
            return view('settings.index',[
                'settings' => $settings,
        
            ]);
        }
        public function create()
        {
            
            return view('settings.create');
        }
        public function edit($settingID){
            
            $setting = setting::find($settingID);
    
            return view('settings.edit')->with('setting', $setting);
        }
        public function update(Request $request, $settingID){
            $setting = setting::where('settingID',$settingID)
            ->update([
                'linkFB' => $request->input('linkFB'),
                'shop' => $request->input('Shopname'),
                'LinkIG' => $request->input('LinkIG'),


        
            ]);
            if($request->hasFile('banner')) {
                $imagePath =$request->file('banner')->store('products','public');
                $setting->image_url = $imagePath;
                $setting->save();
            }
            return redirect('/settings');
        }
        
        public function store(Request $request){
            // dd('This is store function');
            if($request->hasFile('banner')) {
                $file=$request->file('banner');
                $imageName=$file->getClientOriginalName();
                // $request['banner']=$imageName;
                $file->move(\public_path('/banner'), $imageName);
                $setting = new setting(
                    [
                        'linkFB' => $request->linkFB,
                        'shop' => $request->Shopname,
                        'LinkIG' => $request->LinkIG,
                        'banner' => $imageName,
                    ]
                );
                
                $setting->save();
            }
             if ($request->hasFile('banners')) {
                $files = $request->file('banners');
                
                foreach ($files as $file) {

                        $imageName=$file->getClientOriginalName();
                    
                    
                    $request['banners']=$imageName;
                    $file->move(\public_path('/banners'), $imageName);
                    banner::create([
                        'banners' => $imageName,
                    ]);
                    
                }
            }

            
                
                $setting->save();
            


            
    

        
            return redirect('/settings');
    
    
        }
    
        public function destroy($settingID){
            $setting= setting::find($settingID);
            $setting->delete();
            return redirect('/settings');
        }
    
    
    }
    

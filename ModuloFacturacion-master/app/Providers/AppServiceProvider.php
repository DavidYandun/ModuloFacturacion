<?php

namespace App\Providers;

use Validator;
use Auth;
use Hash;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()  {
      $this->validateCedula();
      $this->validateCurrent_Password();
      $this->validateNacimiento();
      $this->
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    private function validateNacimiento(){


    Validator::extend('NACIMIENTO', function($attribute, $value, $parameters, $validator) {

            // Inicio código validación after
            $this->requireParameterCount(1, $parameters, 'after');

            if ($format = $this->getDateFormat($attribute)) {
                return $this->validateAfterWithFormat($format, $value, $parameters);
            }

            if (! ($date = strtotime($parameters[0]))) {
                return strtotime($value) > strtotime($this->getValue($parameters[0]));
            }

            return strtotime($value) > $date;
            // Fin código validación after

        });
     }

    private function validateCurrent_Password(){
        Validator::extend('current_password',function($attribute,$value,$parametes){
          return Hash::check($value, Auth::user()->password);
        });
    }

    private function validateCedula(){
      Validator::extend('CEDULA',function($attribute,$value,$parametes){
          if(preg_match('/[0-2][0-9]{9}/',$value)){
            $c1=0;
            $c2=0;
            $f=0;
            $cedula=$value;
            for($i=0;$i<9;$i++){
                $a=$cedula[$i];
                  if($i%2==0){
                      $d=$a*2;
                      if($d<9){
                          $c1+=$d;
                      }else{
                          $c1+=$d-9;
                      }
                  }else{
                      $c2+=$a;
                  }
              }
              $e=$c1+$c2;
              for($j=10;$j<=60;$j=$j+10){
                  if($e<=$j){
                      $f=$j-$e;
                      break;
                  }
              }
              return $cedula[9]==$f;
          }else{
            return false;
          }
      });
    }
}

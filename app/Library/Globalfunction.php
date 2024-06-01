<?php

namespace App\Library;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Globalfunction {

        public static function convertSelectedRowInArray($arrRecordSet){
			$arrRecordSet = collect($arrRecordSet)->map(function($x){ return (array) $x; })->toArray();
            return $arrRecordSet;
		}

        public static function GetMailMessageBody($msg, $paraKeyArr, $paraValArr){
                $mailData=str_replace($paraKeyArr,$paraValArr,$msg);
                $find=array("{{%msgBody%}}");
                $replace=array($mailData);
                return $mailData=str_replace($find,$replace,$mailData);
            }

            public static function MD5ToHash($password, $email)
            {
                $existing_password = DB::table('users')
                    ->where('email', '=', $email)
                    ->value('password');
                $md5_password = md5($password);
                if ($existing_password == $md5_password){
                    DB::table('users')
                        ->where('email', '=', $email)
                        ->update(['password' => Hash::make($password)]);
                    return true;
                }else{
                    return false;
                }
            }
	}
?>

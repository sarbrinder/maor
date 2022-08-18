<?php

namespace App\Http\Controllers;
use Helper;
use DB;
use Session;
use App\Models\Fb;
use Illuminate\Http\Request;


class BayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * Show the Facebook Connection Button
     */
    public function createContact()
    {
        
 $dt = file_get_contents('php://input');
      $dt1 = json_decode($dt,true);
       $file = fopen("payhit1.txt","w");
echo fwrite($file,$dt);
        // echo fwrite($file,$dt1);die;
        echo json_encode('data submitted successfully');exit;
        ?>
        <script type="text/javascript" >
var EhAPI = EhAPI || {}; EhAPI.after_load = function(){
EhAPI.set_account('h3vrjkpsc7btrgqujervvd22fs', 'aliroimmigration');
EhAPI.execute('rules');};(function(d,s,f) {
var sc=document.createElement(s);sc.type='text/javascript';
sc.async=true;sc.src=f;var m=document.getElementsByTagName(s)[0];
m.parentNode.insertBefore(sc,m);   
})(document, 'script', '//d2p078bqz5urf7.cloudfront.net/jsapi/ehform.js');
</script> 
        <?php
        $user = '{
            "Education": [
                {
                    "completed": "Yes",
                    "country": "Slovenia",
                    "duration": 4,
                    "region": "Ljubljana",
                    "type": "High school"
                },
                {
                    "completed": "Yes",
                    "country": "Canada",
                    "duration": 4,
                    "region": "Quebec",
                    "type": "Phd"
                }
            ],
            "Language": [
                {
                    "language": "French",
                    "listening": 8,
                    "reading": 9,
                    "speaking": 8,
                    "writing": 8
                },
                {
                    "language": "English",
                    "listening": 9,
                    "reading": 9,
                    "speaking": 9,
                    "writing": 9
                }
            ],
            "PersonalInfo": {
                "age": 41,
                "birthday": "Wed, 11 Feb 2022 09:06:00 GMT",
                "country_of_residence": "Israel",
                "firstname": "Jake",
                "gender": "Other",
                "lastname": "Roberts",
                "marital_status": "Married",
                "middlename": "Angondorav",
                "nationality": "Grozonian",
                "status_in_country_of_residence": "Citizen",
                "funds": 60000,
                "family_members": 3
            },
            "WorkExperience": [
                {
                    "begin": "Wed, 11 Feb 2022 09:06:00 GMT",
                    "country": "Canada",
                    "duty1": "1",
                    "duty2": "2",
                    "duty3": "3",
                    "duty4": "4",
                    "duty5": "5",
                    "end": "Wed, 11 Feb 2022 09:06:00 GMT",
                    "industry": "industry3",
                    "profession": "legislators",
                    "region": "Northwest Territories",
                    "skill_level": "A",
                    "work_permit": "Yes",
                    "years": 2
                }
            ],
            "JobOffer": {
                "country": "Canada",
                "region": "Quebec",
                "profession": "legislators",
                "skill_level": "A",
                "years_of_experience": 4
            },
            "Investment": {
                "country": "Canada",
                "region": "Quebec",
                "city": "Ottawa",
                "amount": 180000
            },
            "RelativeAbroad": [
                {
                    "country": "Canada",
                    "region": "Quebec",
                    "of_spouse_or_user": "spouse",
                    "relative": "son",
                    "status": "permanent resident",
                    "age": 21
                }
            ],
            "Spouse": {
                "age": 17
            },
            "SpouseEducation": [
                {
                    "country": "Canada",
                    "region": "Quebec",
                    "duration": "3",
                    "completed": "Yes"
                }
            ],
            "SpouseWorkExperience": [
                {
                    "country": "Canada",
                    "region": "Quebec",
                    "years": 3,
                    "work_permit": "Yes"
                }
            ],
            "SpouseLanguage": [
                {
                    "language": "French",
                    "listening": 6,
                    "reading": 6,
                    "speaking": 6,
                    "writing": 8
                },
                {
                    "language": "English",
                    "listening": 9,
                    "reading": 9,
                    "speaking": 9,
                    "writing": 9
                }
            ]
        }';
        $user = json_decode($user,true);
        
        //echo  '<pre>';print_r($user);die;
        $edu = 1;
        $education = '';
        foreach($user['Education'] as $details){
             if($edu > 1){
                $education .= ',<br/>';
            }
            $education .=  'Education Level '.$edu.' => completed : '.$details['completed'].', country : '.$details['country'].', duration : '.$details['duration'].', region : '.$details['region'].' ,type : '.$details['type'];
           
            $edu++;
        }
        
        $lang = 1;
        $language = '';
        foreach($user['Language'] as $details){
             if($lang > 1){
                $language .= ',<br/>';
            }
            $language .=  'Language '.$lang.' => language : '.$details['language'].', listening : '.$details['listening'].', reading : '.$details['reading'].', speaking : '.$details['speaking'].' ,writing : '.$details['writing'];
           
            $edu++;
        }
        
        $work = 1;
        $workExp = '';
        foreach($user['WorkExperience'] as $details){
             if($work > 1){
                $workExp .= ',<br/>';
            }
            $workExp .=  'Work Experience '.$work.' => begin : '.$details['begin'].', country : '.$details['country'].', end : '.$details['end'].', industry : '.$details['industry'].' ,profession : '.$details['profession'].' ,region : '.$details['region'].' ,skill_level : '.$details['skill_level'].' ,work_permit : '.$details['work_permit'].' ,years : '.$details['years'];
           
            $work++;
        }
        
       
        $jobOffer =  'Job Offer'.' => country : '.$user['JobOffer']['country'].', region : '.$user['JobOffer']['region'].', profession : '.$user['JobOffer']['profession'].', skill_level : '.$user['JobOffer']['skill_level'].' ,years_of_experience : '.$user['JobOffer']['years_of_experience'];
        
        
        
            $investment =  'Investment'.' => country : '.$user['Investment']['country'].', region : '.$user['Investment']['region'].', city : '.$user['Investment']['city'].', amount : '.$user['Investment']['amount'];
           
        
        $relative = 1;
        $relativeAbroad = '';
        foreach($user['RelativeAbroad'] as $details){
             if($relative > 1){
                $relativeAbroad .= ',<br/>';
            }
            $relativeAbroad .=  'Relative Aboard '.$relative.' => country : '.$details['country'].', region : '.$details['region'].', of_spouse_or_user : '.$details['of_spouse_or_user'].', relative : '.$details['relative'].', status : '.$details['status'].', age : '.$details['age'];
           
            $relative++;
        }
        
       
      
            $spouse =  'Sponse Age '.' => age : '.$user['Spouse']['age'];
          
        $spnsEdu = 1;
        $spouseEducation = '';
        foreach($user['SpouseEducation'] as $details){
             if($spnsEdu > 1){
                $spouseEducation .= ',<br/>';
            }
            $spouseEducation .=  'Sponse Education '.$spnsEdu.' => country : '.$details['country'].', region : '.$details['region'].', duration : '.$details['duration'].' , completed : '.$details['completed'];
           
            $spnsEdu++;
        }
        
        $spnsWorkExp = 1;
        $spouseWordExp = '';
        foreach($user['SpouseWorkExperience'] as $details){
             if($spnsWorkExp > 1){
                $spouseWordExp .= ',<br/>';
            }
            $spouseWordExp .=  'Spouse Work Experience '.$spnsWorkExp.' => country : '.$details['country'].', region : '.$details['region'].', years : '.$details['years'].' , work_permit : '.$details['work_permit'];
           
            $spnsWorkExp++;
        } 
        
        $spnsLang = 1;
        $spouseLanguage = '';
        foreach($user['SpouseLanguage'] as $details){
             if($spnsLang > 1){
                $spouseLanguage .= ',<br/>';
            }
            $spouseLanguage .=  'Spouse Language '.$spnsLang.' => language : '.$details['language'].', listening : '.$details['listening'].', reading : '.$details['reading'].' , speaking : '.$details['speaking'].' , writing : '.$details['writing'];
           
            $spnsLang++;
        }
        
        $contactArr['properties'] =  array(
               
                array(
                    "name" => "name",
            		"value"=> $user['PersonalInfo']['firstname'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "SYSTEM"
                    ),
                    array(
                    "name" => "last_name",
            		"value"=> $user['PersonalInfo']['lastname'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "SYSTEM"
                    ),
                    array(
                    "name" => "Contact Gender",
            		"value"=> $user['PersonalInfo']['gender'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                    "name" => "Marital Status",
            		"value"=> $user['PersonalInfo']['marital_status'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                    "name" => "Middle Name",
            		"value"=> $user['PersonalInfo']['middlename'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                    "name" => "Nationality",
            		"value"=> $user['PersonalInfo']['nationality'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                    "name" => "Country of residence",
            		"value"=> $user['PersonalInfo']['country_of_residence'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                    "name" => "Status in Country of Residence",
            		"value"=> $user['PersonalInfo']['status_in_country_of_residence'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                    "name" => "Contact Funds",
            		"value"=> $user['PersonalInfo']['funds'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                    "name" => "Family Members",
            		"value"=> $user['PersonalInfo']['family_members'],
            		"field_type"=> "TEXT",
            		"is_searchable"=>false,
            		"type"=> "CUSTOM"
                    ),
                    array(
                        'name' => 'Education Details',
                        "value"=> $education,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Contact Age',
                        "value"=> $user['PersonalInfo']['age'],
                		"field_type"=> "TEXT",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Language Details',
                        "value"=> $language,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Work Experience',
                        "value"=> $workExp,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Job Offer',
                        "value"=> $jobOffer,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Investment',
                        "value"=> $investment,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Relative Abroad',
                        "value"=> $relativeAbroad,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Spouse Age',
                        "value"=> $spouse,
                		"field_type"=> "TEXT",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Spouse Education',
                        "value"=> $spouseEducation,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Spouse Work Experience',
                        "value"=> $spouseWordExp,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        ),
                        array(
                        'name' => 'Spouse Language',
                        "value"=> $spouseLanguage,
                		"field_type"=> "TEXTAREA",
                		"is_searchable"=>false,
                		"type"=> "CUSTOM"
                        )
            );
            //echo '<pre>';print_r(json_encode($contactArr));die;
        $this->callApi('https://app.engagebay.com/dev/api/panel/subscribers/subscriber',$contactArr);
    //echo '<pre>';print_r(json_decode($user,true));die;
      
    }
    
    public function callApi($url,$details){
        $headr = array();
        $headr[] = 'Accept: application/json';
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: 19ld4diiv61k49pqe1b5h3l6dm';
        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($details) );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        echo '<pre>here';print_r($result);die;
        return $result;
    }
    
    public function createEvents(){
        $data = '{"timestamp": "2022-08-15 17:47:34", "event_name": "Assessment completed", "value": "Yes", "event_time": "2022-09-09 21:33:00+02:00"}';
        $eventData = json_decode($data);
        $event = array(
            'name' => $eventData->event_name,
            'start_time' => strtotime($eventData->timestamp),
            'end_time' => strtotime($eventData->event_time),
            'source_type' =>"API",
            'owner_id' => '5676618345349120'
            );
            $eventCreate = json_encode($event);
            //echo '<pre>';print_r($eventCreate);die;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://app.engagebay.com/dev/api/panel/calendar/event/normal');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $eventCreate);

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: 19ld4diiv61k49pqe1b5h3l6dm';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        echo '<pre>here';print_r(json_decode($result));die;

    }
    
}
    
    ?>
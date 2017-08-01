<?php
$action = $_POST['action'];
$session = $_POST['session'];
$id = $_POST['id'];
$data = $_POST['data'];

static $teste;
function callAPI($url,$method,$data = false)
        {
            $curl = curl_init();
            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");;

                    if ($data){                      
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-Type: application/json","Content-Length: ".strlen($data)));
                    }
                    break;
                case "DELETE":
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", $url, http_build_query($data));
            }
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($curl);

            curl_close($curl);

            return $result;
        }

if ($action == "list"){
   $reportList =  json_decode(callAPI("https://api.georanker.com/v1/report/list.json?email=skullplayz%40gmail.com&session=".$session,"GET", false), true);
   $reportSize = $reportList['total'];
   $reportItems = $reportList['items'];
  
   $displayedList = "";
   for ($i = 0; $i < $reportSize; $i++){
        $keywords = "";
        $countries = "";
        $searchengines = "";
        $urls = "";

        $displayedList .= "<tr>";
        $displayedList .= "<td>".$reportItems[$i]['type']."</td>";
        foreach($reportItems[$i]['keywords'] as $result) {
            $keywords .= "[".$result."] ";
        }
        
        foreach($reportItems[$i]['countries'] as $result) {
            $countries .= "[".$result."] ";
        }

        foreach($reportItems[$i]['searchengines'] as $result) {
            $searchengines .= "[".$result."] ";
        }

        foreach($reportItems[$i]['urls'] as $result) {
            $urls .= "[".$result['url']."] ";
        }
        $displayedList .= "<td>".$keywords."</td>";
        $displayedList .= "<td>".$countries."</td>";
        $displayedList .= "<td>".$searchengines."</td>";
        $displayedList .= "<td>".$urls."</td>";
        $displayedList .= "<td>";
        $displayedList .= "<button class='btn btn-primary' type='button' onclick='callDelete(".$reportItems[$i]['id'].")' style='margin-right: 10px;'>DELETE</button>";
        $displayedList .= "<button class='btn btn-primary' type='button' onclick='callDetails(".$reportItems[$i]['id'].")'>DETAILS</button>";
        $displayedList .= "</td>";
        $displayedList .= "</tr>";
    }
  echo $displayedList;//$reportItems[0]['keywords'][0];
  
}

if ($action == "login"){
    $login = json_decode(callAPI("https://api.georanker.com/v1/api/login.json?email=skullplayz%40gmail.com&apikey=0204e5a435b4a060b6db476ba65e8731","GET", false),true);
    echo (string)$login['session'];
}

if ($action == "delete"){
   echo json_encode(callAPI("https://api.georanker.com/v1/report/".$id.".json?email=skullplayz%40gmail.com&session=".$session,"DELETE", false));
}

if ($action == "details"){
   echo json_encode(callAPI("https://api.georanker.com/v1/report/".$id.".json?email=skullplayz%40gmail.com&session=".$session,"GET", false));
}

if ($action == "new"){
   echo json_encode(callAPI("https://api.georanker.com/v1/report/new.json?email=skullplayz%40gmail.com&session=".$session,"POST", $data));
}
?>

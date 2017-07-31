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

                    if ($data)
                       // $data_string = json_encode($data);
                        
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-Type: application/json","Content-Length: ".strlen($data)));
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
   $reportList =  json_decode(callAPI("https://api.georanker.com/v1/report/list.json?email=hygor.c.luz%40gmail.com&session=".$session,"GET", false), true);
   $reportSize = $reportList['total'];
   $reportItems = $reportList['items'];
  
   $displayedList = "";
   for ($i = 0; $i < $reportSize; $i++){
        $keywords = "";
        $countries = "";
        $searchengines = "";

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
        $displayedList .= "<td>".$keywords."</td>";
        $displayedList .= "<td>".$countries."</td>";
        $displayedList .= "<td>".$searchengines."</td>";
        $displayedList .= "<td>";
        $displayedList .= "<button class='btn btn-primary' type='button' onclick='callDelete(".$reportItems[$i]['id'].")' style='margin-right: 10px;'>DELETE</button>";
        $displayedList .= "<button class='btn btn-primary' type='button' onclick='callDetails(".$reportItems[$i]['id'].")'>DETAILS</button>";
        $displayedList .= "</td>";
        $displayedList .= "</tr>";
    }
  echo $displayedList;//$reportItems[0]['keywords'][0];
  
}

if ($action == "login"){
    $login = json_decode(callAPI("https://api.georanker.com/v1/api/login.json?email=hygor.c.luz%40gmail.com&apikey=17899634ef4a5a19b97374bc79d7a1af","GET", false),true);
    echo (string)$login['session'];
}

if ($action == "delete"){
   echo json_encode(callAPI("https://api.georanker.com/v1/report/".$id.".json?email=hygor.c.luz%40gmail.com&session=".$session,"DELETE", false));
}

if ($action == "details"){
   echo json_encode(callAPI("https://api.georanker.com/v1/report/".$id.".json?email=hygor.c.luz%40gmail.com&session=".$session,"GET", false));
}

if ($action == "new"){
   echo json_encode(callAPI("https://api.georanker.com/v1/report/new.json?email=hygor.c.luz%40gmail.com&session=".$session,"POST", $data));
}
?>

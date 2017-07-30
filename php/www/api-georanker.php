<?php
$action = $_POST['action'];
$session = $_POST['session'];

static $teste;
function callAPI($url,$method,$data = false)
        {
            $curl = curl_init();
            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);

                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_PUT, 1);
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
            //5ce1d2d034312f734b0a7e1f6483d28a
            //'https://api.georanker.com/v1/api/login.json?email=hygor.c.luz%40gmail.com&apikey=17899634ef4a5a19b97374bc79d7a1af' SESSION
            //'https://api.georanker.com/v1/report/new.json?email=hygor.c.luz%40gmail.com&session=5ce1d2d034312f734b0a7e1f6483d28a' NEW REPORT
            //'{"searchengines":["google"],"countries":["BR"],"keywords":["teste"],"type":"heatmap"}' NEW REPORT DATA
            //https://api.georanker.com/v1/report/list.json?email=hygor.c.luz%40gmail.com&session=5ce1d2d034312f734b0a7e1f6483d28a LIST ALL
            //https://api.georanker.com/v1/report/1762945.json?email=hygor.c.luz%40gmail.com&session=5ce1d2d034312f734b0a7e1f6483d28a DELETE or GET
            return $result;
        }

if ($action == "list"){
    
  echo json_encode(callAPI("https://api.georanker.com/v1/report/list.json?email=hygor.c.luz%40gmail.com&session=".$session,"GET", false));
  
}

if ($action == "login"){
    $login = json_decode(callAPI("https://api.georanker.com/v1/api/login.json?email=hygor.c.luz%40gmail.com&apikey=17899634ef4a5a19b97374bc79d7a1af","GET", false),true);
    echo (string)$login['session'];
}
?>
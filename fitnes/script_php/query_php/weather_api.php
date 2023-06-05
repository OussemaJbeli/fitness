<?php
    $profileAPI = 'https://www.weatherbit.io/account/dashboard';
    $documentation = 'https://www.weatherbit.io/api/weather-current';

    function API_data(){
        /**********api request */
        $latitud='36.799630';
        $longitude='9.012119';
        $key = '77bcfcbabaec4eb9b7bdf8851041c29b';
        $link='https://api.weatherbit.io/v2.0/current?lat='.$latitud.'&lon='.$longitude.'&key='.$key.'&include=minutely';

        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL,$link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        $resp = curl_exec($ch);
        $data = json_decode($resp,true);

        if($data){
            /*********data */
                $app_temp = $data['data'][0]['app_temp'];
                $description = $data['data'][0]['weather']['description'];
                $icon = $data['data'][0]['weather']['icon'];

                /*********path icon*/
                $path='cloudy1.png';
                switch ($icon){
                    /***thunder */
                    case 't04d':case 't05d':$path='tunder.png';break;
                    case 't04n':case 't05n':$path='tunder.png';break;
                    /***sun thunder */
                    case 't01d':case 't02d':case 't03d':$path='Thunderstorm1.png';break;
                    case 't01n':case 't02n':case 't03n':$path='Thunderstorm2.png';break;

                    /***ligth rain */
                    case 'd01d':case 'd02d':case 'd03d':$path='light_rain.png';break;
                    case 'd01n':case 'd02n':case 'd03n':$path='light_rain.png';break;

                    /***rain */
                    case 'r01d':case 'r02d':case 'r03d':case 'f01d':case 'r04d':case 'r06d':case 'u00d':$path='rain.png';break;
                    case 'r01n':case 'r02n':case 'r03n':case 'f01n':case 'r04n':case 'r06n':case 'u00n':$path='rain.png';break;
                    /***sun rain */
                    case 'r05d':$path='sun_rain1';break;
                    case 'r05n':$path='sun_rain2';break;
                    /***snow */
                    case 's02d':case 's03d':case 's05d':case 's06d':$path='snow.png';break;
                    case 's02n':case 's03n':case 's05n':case 's06n':$path='snow.png';break;
                    /***sun snow */
                    case 's01d':case 's04d':$path='snow_sun1.png';break;
                    case 's01n':case 's04n':$path='snow_sun2.png';break;

                    /***whender */
                    case 'a01d':case 'a02d':case 'a03d':case 'a04d':case 'a05d':case 'a06d':$path='smoke1.png';break;
                    case 'a01n':case 'a02n':case 'a03n':case 'a04n':case 'a05n':case 'a06n':$path='smoke2.png';break;

                    /***suny */
                    case 'c01d':$path='sun.png';break;
                    case 'c01n':$path='moon.png';break;
                    /***cloudy */
                    case 'c02d':case 'c03d':$path='cloudy1.png';break;
                    case 'c02n':case 'c03n':$path='cloudy2.png';break;
                    /***verycloudy */
                    case 'c04d':$path='cloud.png';break;
                    case 'c04n':$path='cloud.png';break;
                }
            $today = date("l");
            $array=["temp"=>$app_temp,
                    "desc"=>$description,
                    "path"=>$path,
                    "date"=>$today,
                ];
            return $array;
        }
        else
            return null;
    }
    function time_color(){
        $tab=['#000000','#0a0b18','#13142b','#564545','#765656',
        '#936752','#bc927d','#bbaaa2','#a2b6bb','#7b8db2',
        '#6c87cb','#376aeb','#376aeb','#5a76bd','#5a76bd','#779cac',
        '#779cac','#779cac','#ac955a', '#ac955a','#4c4127','#13142b',
        '#13142b','#0a0b18',];
        $date=date('H');
        return $tab[$date];
    }
?>
<?php

function response($message,$data){
    return json_encode(['message'=>$message,'data'=>$data]);
}
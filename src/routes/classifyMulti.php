<?php

$app->post('/api/MonkeyLearn/classifyMulti', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiToken','classifierId','textList']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    foreach ($post_data['args'] as $key=>$value){
        if($value=="true"){
            $post_data['args'][$key]=true;
        }
        if($value=="false"){
            $post_data['args'][$key]=false;
        }
    }

    $apiToken = $post_data['args']['apiToken'];
    $classifierId = $post_data['args']['classifierId'];

    $textList = \Models\normilizeJson::normalizeJson($post_data['args']['textList']);

    if(is_array($textList))
    {
        foreach ($post_data['args']['textList'] as $item)
        {
            $data['text_list'][] = $item;
        }
    }
    else{
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'REQUIRED_FIELDS';
        $result['contextWrites']['to']['status_msg'] = 'Please, check and fill in required fields.';
        $result['contextWrites']['to']['fields'] = 'textList';
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }

    $optionalParam = ['sandbox'=>'sandbox','debug'=>'debug'];
    $query = [];

    foreach ($post_data['args'] as $key=>$value)
    {
        if(array_key_exists($key, $optionalParam) && !empty($value))
        {
            $query[$optionalParam[$key]] = $value;
        }
    }

    $query_str = $settings['api_url'] . "classifiers/$classifierId/classify/";
    $client = $this->httpClient;

    try {

        $resp = $client->post($query_str, [
            'headers' => [
                'Authorization' => "Token $apiToken",
                'Content-Type' => "application/json"
            ],
            'json' => $data,
            'query' => $query
        ]);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});

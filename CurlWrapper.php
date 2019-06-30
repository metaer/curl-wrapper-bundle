<?php
/**
 * Created by Pavel Popov.
 */

namespace Metaer\CurlWrapperBundle;


class CurlWrapper implements CurlWrapperInterface
{
    private $requestUrl;
    private $requestBody;
    private $responseBody;

    /**
     * @param array $curlOptions
     * @return mixed
     * @throws CurlWrapperException
     */
    public function getQueryResult(array $curlOptions) {
        $ch = curl_init();

        foreach ($curlOptions as $key => $value) {
            curl_setopt($ch, $key, $value);
            if ($key == CURLOPT_URL) {
                $this->requestUrl = $value;
            } elseif ($key == CURLOPT_POSTFIELDS) {
                $this->requestBody = $value;
            }
        }

        $result = curl_exec($ch);
        $curlErrorCode = curl_errno($ch);
        $curlErrorText = curl_error($ch);
        curl_close($ch);

        if ($curlErrorCode) {
            $errorMessage = sprintf('%s. Curl error code: %s', $curlErrorText, $curlErrorCode);
            throw new CurlWrapperException($errorMessage);
        }

        $this->responseBody = $result;
        return $result;
    }

    /**
     * @return mixed
     */
    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    /**
     * @return mixed
     */
    public function getRequestBody()
    {
        return $this->requestBody;
    }

    /**
     * @return mixed
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }
}

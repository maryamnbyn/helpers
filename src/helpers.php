<?php


if (! function_exists('resolve_pagination_links')) {
    /**
     * Resolve pagination links.
     *
     * @param array $response
     * @return array
     */
    function resolve_pagination_links(array $response)
    {
        $response['links']['first'] = str_replace(url_without_query_string($response['links']['first']),
            request()->url(),
            $response['links']['first']);

        $response['links']['last'] = str_replace(url_without_query_string($response['links']['last']),
            request()->url(),
            $response['links']['last']);

        $response['links']['next'] = !empty(str_replace(url_without_query_string($response['links']['next']),
            request()->url(),
            $response['links']['next'])) ? str_replace(url_without_query_string($response['links']['next']),
            request()->url(),
            $response['links']['next']) : null;

        $response['links']['prev'] = !empty(str_replace(url_without_query_string($response['links']['prev']),
            request()->url(),
            $response['links']['prev'])) ? str_replace(url_without_query_string($response['links']['prev']),
            request()->url(),
            $response['links']['prev']) : null;

        $response['meta']['path'] = url_without_query_string($response['links']['first']);

        return $response;
    }

}

if (! function_exists('url_without_query_string')) {
    /**
     * Resolve pagination links.
     *
     * @param $url
     *
     * @return string
     */
    function url_without_query_string($url)
    {
        return strtok($url, '?');
    }
}

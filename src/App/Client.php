<?php


namespace Cblink\Service\Payment\App;


use Cblink\Service\Kennel\AbstractApi;

class Client extends AbstractApi
{
    /**
     * @param $query
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function lists(array $query = [])
    {
        return $this->get('api/app', $query);
    }

    /**
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function create($payload = [])
    {
        return $this->post('api/app', $payload);
    }

    /**
     * @param $id
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function update($id, $payload = [])
    {
        return $this->put(sprintf('api/app/%s', $id), $payload);
    }

}
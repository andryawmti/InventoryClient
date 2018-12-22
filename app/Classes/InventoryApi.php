<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/16/18
 * Time: 12:35 PM
 */

namespace App\Classes;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class InventoryApi
{
    private $apiToken;
    private $baseUrl;
    private $client;

    public function __construct()
    {
        $this->apiToken = env('INVENTORY_API_TOKEN', '');
        $this->baseUrl = env('INVENTORY_BASE_URL', '');
        $this->client = new Client();
    }

    private function makeRequest($url, $method = 'GET', $params = null)
    {
        unset($params['_method']);
        $url = $this->baseUrl . $url . '?api_token=' . $this->apiToken;
        try {
            if ($method == 'POST') {
                $result = $this->client->request($method, $url, [
                    'form_params' => $params
                ]);
            } else {
                $result = $this->client->request($method, $url);
            }
        } catch (GuzzleException $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return json_decode($result->getBody()->getContents());
    }

    /**
     * Customer
     */

    public function getAllCustomer()
    {
        $url = '/customer';
        return $this->makeRequest($url);
    }

    public function getCustomer($id)
    {
        $url = '/customer/'.$id;
        return $this->makeRequest($url);
    }

    public function addCustomer(array $params)
    {
        $url = '/customer';
        return $this->makeRequest($url, 'POST', $params);
    }

    public function updateCustomer($id, array $params)
    {
        $url = '/customer/'.$id;
        return $this->makeRequest($url, 'POST', $params);
    }

    public function deleteCustomer($id)
    {
        $url = '/customer/'.$id.'/delete';
        return $this->makeRequest($url, 'POST');
    }

    /**
     * Distributor
     */
    public function getAllDistributor()
    {
        $url = '/distributor';
        return $this->makeRequest($url);
    }

    public function getDistributor($id)
    {
        $url = '/distributor/'.$id;
        return $this->makeRequest($url);
    }

    public function addDistributor(array $params)
    {
        $url = '/distributor';
        return $this->makeRequest($url, 'POST', $params);
    }

    public function updateDistributor($id, array $params)
    {
        $url = '/distributor/'.$id;
        return $this->makeRequest($url, 'POST', $params);
    }

    public function deleteDistributor($id)
    {
        $url = '/distributor/'.$id.'/delete';
        return $this->makeRequest($url, 'POST');
    }

    /**
     * Unit
     */
    public function getAllUnit()
    {
        $url = '/unit';
        return $this->makeRequest($url);
    }

    public function getUnit($id)
    {
        $url = '/unit/'.$id;
        return $this->makeRequest($url);
    }

    public function addUnit(array $params)
    {
        $url = '/unit';
        return $this->makeRequest($url, 'POST', $params);
    }

    public function updateUnit($id, array $params)
    {
        $url = '/unit/'.$id;
        return $this->makeRequest($url, 'POST', $params);
    }

    public function deleteUnit($id)
    {
        $url = '/unit/'.$id.'/delete';
        return $this->makeRequest($url, 'POST');
    }

    /**
     * Product
     */
    public function getAllProduct()
    {
        $url = '/product';
        return $this->makeRequest($url);
    }

    public function getProduct($id)
    {
        $url = '/product/'.$id;
        return $this->makeRequest($url);
    }

    public function addProduct(array $params)
    {
        $url = '/product';
        return $this->makeRequest($url, 'POST', $params);
    }

    public function updateProduct($id, array $params)
    {
        $url = '/product/'.$id;
        return $this->makeRequest($url, 'POST', $params);
    }

    public function deleteProduct($id)
    {
        $url = '/product/'.$id.'/delete';
        return $this->makeRequest($url, 'POST');
    }

    /**
     * ProductCategory
     */
    public function getAllProductCategory()
    {
        $url = '/product-category';
        return $this->makeRequest($url);
    }

    public function getProductCategory($id)
    {
        $url = '/product-category/'.$id;
        return $this->makeRequest($url);
    }

    public function addProductCategory(array $params)
    {
        $url = '/product-category';
        return $this->makeRequest($url, 'POST', $params);
    }

    public function updateProductCategory($id, array $params)
    {
        $url = '/product-category/'.$id;
        return $this->makeRequest($url, 'POST', $params);
    }

    public function deleteProductCategory($id)
    {
        $url = '/product-category/'.$id.'/delete';
        return $this->makeRequest($url, 'POST');
    }

    /**
     * Transaction
     */
    public function getAllTransaction()
    {
        $url = '/transaction';
        return $this->makeRequest($url);
    }

    public function getTransaction($id)
    {
        $url = '/transaction/'.$id;
        return $this->makeRequest($url);
    }

    public function findAllTransaction(array $params)
    {
        $url = '/transaction/find-all';
        return $this->makeRequest($url, 'POST', $params);
    }

    public function addTransaction(array $params)
    {
        $url = '/transaction';
        return $this->makeRequest($url, 'POST', $params);
    }

    public function updateTransaction($id, array $params)
    {
        $url = '/transaction/'.$id;
        return $this->makeRequest($url, 'POST', $params);
    }

    public function deleteTransaction($id)
    {
        $url = '/transaction/'.$id.'/delete';
        return $this->makeRequest($url, 'POST');
    }
}
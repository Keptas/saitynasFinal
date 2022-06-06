<?php

class Customers extends Controller {
    public function __construct() {
        parent::__construct();
        $this->CustomerModel = $this->model('Customer');
    }

    /**
     * @OA\Get(path="/restful/customers/getCustomers", tags={"Customers"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getCustomers() {
        $data = $this->CustomerModel->getCustomers();

        return $this->response($data);
    }

    /**
     * @OA\Get(path="/restful/customers/getCustomer", tags={"Customers"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Parameter(
     *   name="id",
     *   in="query",
     *   required=true,
     *   description="Id of customer.",
     *   @Oa\Schema(
     *     type="integer"
     *   )
     * ),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getCustomer(int $id) {
        $data = $this->CustomerModel->getCustomer($id);
        return $this->response($data);
    }

}